<?php

namespace App\Http\Controllers;


use App\Events\CommentEvent;
use App\Events\ReachOut;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Blog;
use App\Models\BussinessReview;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Part;
use App\Models\PartReviews;
use App\Models\SoldItems;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ValueAsset;
use App\Models\ValueDocs;
use App\Notifications\NotifyAuctionOwners;
use App\Notifications\ProductApprovalNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;

class ProductController extends Controller
{

    public function index()
    {

        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.product.index', ['brands' => $brands, 'categories' => $categories]);
    }


    public function userLogout()
    {
        Auth::logout();

        return redirect()->route('index');
    }


    public function showProductRecords($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.edit-listing', ['brands' => $brands, 'categories' => $categories, 'product' => $product]);
    }


    public function getSubcategories($categoryId): \Illuminate\Http\JsonResponse
    {
        // Logic to fetch subcategories based on the category ID
        $subcategories = SubCategory::where('category_id', $categoryId)->pluck('name', 'id');
        return response()->json($subcategories);
    }




    public function store(Request $request)
    {
        // Save category
        $product = Product::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'color' => $request->color,
            'address' => $request->address,
            'location' => $request->location,
            'price' => $request->price,
            'deed' => $request->deed ? 1 : 0,
            'car_receipt' => $request->car_receipt ? 1 : 0,
            'car_docs' => $request->car_docs ? 1 : 0,
            'mileage' => $request->mileage,
            'desc' => $request->desc,
            'user_id' => auth()->user()->id,
            'cylinder' => $request->cylinder,
            'car_name' => $request->car_name,
            'is_approved' => auth()->user()->role === 'admin' ? 1 : 0,
            'is_installemt' => $request->is_installemt ? 1 : 0

        ]);

        $imageUrls = $this->uploadImagesAndGetLinks($request);

        foreach ($imageUrls as $imageUrl) {
            $product->images()->create([
                'product_id' => $product->id,
                'image' => $imageUrl,
            ]);
        }


        // Return a success response
//        return redirect()->back()->with(['success' => 'Product created successfully']);
        // Return a success response for AJAX
        return response()->json(['success' => 'Product created successfully']);
    }


    public function uploadImagesAndGetLinks($request): array
    {
        $imageUrls = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name for the image
                $imagePath = $image->storeAs('public/uploads', $imageName);
                $imageUrl = asset('storage/uploads/' . $imageName);
                $imageUrls[] = $imageUrl;
            }
        } else {
            // Handle case where no images were uploaded
        }


        return $imageUrls;
    }


    /**
     * Validate request data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validateRequest(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        // Set custom validation messages
        $messages = [
            'category_id.required' => 'The category field is required.',
            'sub_category_id.required' => 'The sub-category field is required.',
            'brand_id.required' => 'The brand field is required.',
            'model.required' => 'The model field is required.',
            'year.required' => 'The year field is required.',
            'mileage.required' => 'The mileage field is required.',
            'color.required' => 'The color field is required.',
            'location.required' => 'The location field is required.',
            'address.required' => 'The address field is required.',
            'price.required' => 'The price field is required.',
            'car_name.required' => 'The car name input is required',
            'desc.required' => 'The description field is required.',
            'images.required' => 'The images field is required.',
            'images.array' => 'The images must be an array.',
            'images.*.image' => 'Each image must be a valid image file.',
        ];

        // Validate request data with custom messages
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'model' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'color' => 'required',
            'car_name' => 'required',
            'location' => 'required',
            'address' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'receipt' => 'nullable',
            'document' => 'nullable',
            'images' => 'required|array',
            'images.*' => 'image',
        ], $messages);

        return $validator;
    }

// The Product model has a belongsTo relationship defined with the Category model, indicating that a product belongs to a single category.

    public function indexAll(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {


        $products = Product::with('brand', 'images', 'categories')
            ->orderBy('products.id', 'DESC')
            ->get();

        return view('admin.product.listing', ['products' => $products]);
    }


    public function decline_product_request(Request $request): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($request->product_id);
        $product->is_approved = 2;
        $product->save();

        $product_owner = $product->user;
        $reason = $request->input('reason');

        $data = [
            'title' => 'Product Disapproval',
            'message' => 'Dear User, we regret to inform you that your product "' . $product->car_name . '" has been disapproved by our team. The reason for this decision is: ' . $reason . '. If you have any questions or need further assistance, please do not hesitate to contact our support team. Thank you for your understanding.'

        ];

        $product_owner->notify(new ProductApprovalNotification($data));

        return redirect()->back()->with('success', 'Product has been disapproved and the owner has been notified.');
    }


    public function approve_product_request(Request $request): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($request->product_id);
        $product->is_approved = 1;
        $product->save();

        $product_owner = $product->user;
        $reason = $request->input('reason');
        $data = [
            'title' => 'Product Approval',
            'message' => 'Dear User, we are pleased to inform you that your product "' . $product->car_name . '" has been approved by our team. We are excited to have your product listed on our platform. If you have any questions or need further assistance, please do not hesitate to contact our support team. Thank you for your contribution and trust in our platform.'
        ];


        $product_owner->notify(new ProductApprovalNotification($data));

            return redirect()->back()->with('success', 'Product has been approved  and the owner has been notified.');
    }




    public function approve_part_request(Request $request): \Illuminate\Http\RedirectResponse
    {
        $product = Part::findOrFail($request->part_id);
        $product->active = 1;
        $product->save();

        $product_owner = $product->users;
        $data = [
            'title' => 'Product Approval',
            'message' => 'Dear User, we are pleased to inform you that your Part "' . $product->part_name . '" has been approved by our team. We are excited to have your product listed on our platform. If you have any questions or need further assistance, please do not hesitate to contact our support team. Thank you for your contribution and trust in our platform.'
        ];

        $product_owner->notify(new ProductApprovalNotification($data));

        return redirect()->back()->with('success', 'Product has been approved  and the owner has been notified.');
    }

    public function decline_part_request(Request $request): \Illuminate\Http\RedirectResponse
    {
        $product = Part::findOrFail($request->part_id);
        $product->active = 2;
        $product->save();

        $product_owner = $product->users;
        $data = [
            'title' => 'Product Disapproval',
            'message' => 'Dear User, we regret to inform you that your Part "' . $product->part_name . '" has been disapproved by our team. The reason for this decision is: ' . $request->reason . '. If you have any questions or need further assistance, please do not hesitate to contact our support team. Thank you for your understanding.'
        ];

        $product_owner->notify(new ProductApprovalNotification($data));

        return redirect()->back()->with('success', 'Product has been declined  and the owner has been notified.');
    }



    public function deleteProduct($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function deleteAuction($id): \Illuminate\Http\RedirectResponse
    {
        $product = Auction::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function deleteBid($id): \Illuminate\Http\RedirectResponse
    {
        $product = Bid::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }




    public function getProductCategory($id)
    {
        try {
            // Retrieve the category by its ID
            $category = Category::findOrFail($id);

            $categoryName = $category->catname;

            // Retrieve subcategories related to the category
            $subcategories = SubCategory::where('category_id', $id)->pluck('name', 'id');
            // Define a query to fetch products related to the category
            $productsQuery = Product::query()
                ->with('images') // Eager load images relationship if needed
                ->with(['subcategories' => function ($query) {
                    $query->select('id', 'name'); // Select only the 'id' and 'name' attributes from the 'subcategory' table
                }])
                ->with(['user' => function ($query) {
                    $query->select('id', 'name', 'created_at'); // Select only the 'id' and 'name' attributes from the 'users' table
                }])
                ->where('category_id', $id)
                ->where('is_approved', 1);

            $auctions = Auction::where('category_id', $category->id)->limit(5)->get();


            // Execute the query to fetch products
            $products = $productsQuery->get();
            // Return the data to your view or do something else with it
            return view('home.products.index', compact('category', 'auctions', 'subcategories', 'products', 'categoryName'));
        } catch (ModelNotFoundException $e) {
            // Handle the case where the category is not found
            abort(404); // Return a 404 response
        }
    }


    public function getAuctionDates(): \Illuminate\Http\JsonResponse
    {
        // Select the starting_date and ending_date columns from the Auction model
        $auctions = Auction::select('starting_date', 'ending_date', 'id')->get();

        // Return the starting and ending dates as a JSON response
        return response()->json($auctions);
    }


    public function getSubProductCategory($sub_category_name)
    {
        try {
            // Retrieve the subcategory by its name

            $sub_category_name = str_replace('+', ' ', $sub_category_name);

            $subcategory = SubCategory::where('name', $sub_category_name)->firstOrFail();

            // Retrieve the category of the subcategory
            $categoryName = $subcategory->category->catname;
            $categoryImage = $subcategory->category->cat_image;

            // Retrieve all subcategories related to the category
            $subcategories = SubCategory::where('category_id', $subcategory->category_id)->pluck('name', 'id');

            // Eager load products and their images related to the selected subcategory
            $products = Product::with('images', 'brand', 'user')
                ->whereHas('subcategories', function ($query) use ($sub_category_name) {
                    $query->where('name', $sub_category_name);
                })
                ->where('is_approved', 1)
                ->paginate(10); // Adjust the number of products per page as needed


            $auctions = Auction::latest()->take(5)->get();


            // Return the data to your view
            return view('home.products.sub-category-product', compact('subcategories', 'categoryImage', 'auctions', 'sub_category_name', 'categoryName', 'products'));
        } catch (ModelNotFoundException $e) {
            // Handle the case where the subcategory is not found
            abort(404); // Return a 404 response
        }
    }


    public function getProductDetails($productId)
    {
        try {
            // Retrieve the product by its ID along with its images and user
            $products = Product::with('images', 'user')->findOrFail($productId);

            // Retrieve the category of the product and its name
            $category = Category::findOrFail($products->category_id);
            $categoryName = $category->catname;

            // Retrieve the subcategory name directly from the product's subcategory relationship
            $sub_category_name = $products->subcategories->name;

            // Retrieve the subcategories of the product's category using eager loading
            $subcategories = $category->subcategories->pluck('name', 'id');

            // Increment the views count of the product
            $products->views += 1;
            $products->save();

            // Retrieve 5 similar cars excluding the current product
            $similarProducts = Product::where('id', '!=', $productId)
                ->where('category_id', $products->category_id)
                ->get();

            $comments = Comment::with('user')->where('post_id', $products->id)->get();


            // Return the data to your view or do something else with it
            return view('home.products.details', compact('categoryName', 'comments', 'similarProducts', 'products', 'subcategories', 'sub_category_name', 'category'));
        } catch (ModelNotFoundException $e) {
            // Handle the case where the product or subcategory is not found
            abort(404); // Return a 404 response
        }
    }


    public function createAuction(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.auction', ['brands' => $brands, 'categories' => $categories]);
    }


    public function saveAuction(Request $request)
    {
        $validator = $this->validateAuctionRequest($request);


        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]); // Redirect back with input and error message
        }

        // Save category
        $auction = Auction::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'color' => $request->color,
            'address' => $request->address,
            'price' => $request->price,
            'deed' => $request->deed ? 1 : 0,
            'car_receipt' => $request->car_receipt ? 1 : 0,
            'car_docs' => $request->car_docs ? 1 : 0,
            'mileage' => $request->mileage,
            'desc' => $request->desc,
            'user_id' => auth()->user()->id,
            'cylinder' => $request->cylinder,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
            'car_name' => $request->car_name,
            'is_approved' => auth()->user()->role === 'admin' ? 1 : 0,
            'is_installemt' => $request->is_installemt ? 1 : 0

        ]);

        $imageUrls = $this->uploadImagesAndGetLinks($request);

        foreach ($imageUrls as $imageUrl) {
            $auction->images()->create([
                'auction_id' => $auction->id,
                'image' => $imageUrl,
            ]);
        }


        // Return a success response
        return response()->json(['success' => 'Auction created successfully']);

    }


    private function validateAuctionRequest(Request $request): \Illuminate\Validation\Validator
    {
        // Set custom validation messages
        $messages = [
            'category_id.required' => 'The category field is required.',
            'sub_category_id.required' => 'The sub-category field is required.',
            'brand_id.required' => 'The brand field is required.',
            'model.required' => 'The model field is required.',
            'year.required' => 'The year field is required.',
            'mileage.required' => 'The mileage field is required.',
            'color.required' => 'The color field is required.',
            'location.required' => 'The location field is required.',
            'price.required' => 'The price field is required.',
            'car_name.required' => 'The car name input is required',
            'desc.required' => 'The description field is required.',
            'images.required' => 'The images field is required.',
            'images.array' => 'The images must be an array.',
            'images.*.image' => 'Each image must be a valid image file.',
            'starting_date.required' => 'Starting date is required',
            'ending_date.required' => 'Ending date is required'
        ];

        // Validate request data with custom messages
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'model' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'color' => 'required',
            'car_name' => 'required',
            'location' => 'required',
            'address' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required',
            'receipt' => 'nullable',
            'document' => 'nullable',
            'images' => 'required|array',
            'images.*' => 'image',
        ], $messages);

        return $validator;
    }


    public function updateProduct(Request $request)
    {
        $validator = $this->validateRequest($request);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]); // Redirect back with input and error message
        }

        // Fetch the existing product instance
        $product = Product::findOrFail($request->product_id);

        // Update product attributes
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->model = $request->model;
        $product->color = $request->color;
        $product->address = $request->address;
        $product->location = $request->location;
        $product->price = $request->price;
        $product->deed = $request->deed ? 1 : 0;
        $product->car_receipt = $request->car_receipt ? 1 : 0;
        $product->car_docs = $request->car_docs ? 1 : 0;
        $product->mileage = $request->mileage;
        $product->desc = $request->desc;
        $product->cylinder = $request->cylinder;
        $product->car_name = $request->car_name;
        $product->is_approved = auth()->user()->role === 'admin' ? 1 : 0;
        $product->is_installemt = $request->is_installemt ? 1 : 0;

        // Save the updated product
        $product->save();

        // Update or add images
        $imageUrls = $this->uploadImagesAndGetLinks($request);
        foreach ($imageUrls as $imageUrl) {
            $product->images()->create([
                'product_id' => $product->id,
                'image' => $imageUrl,
            ]);
        }

        // Return a success response
        return redirect()->back()->with(['success' => 'Product updated successfully']);
    }


    public function reachOut(Request $request): \Illuminate\Http\RedirectResponse
    {
        # Find the product
        $product = Product::find($request->productid);

        #  Ensure the product exists
        if (!$product) {
            return redirect()->back()->with(['error' => 'Product not found']);
        }

        // Create a new message
        Message::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $product->user->id,
            'message' => $request->message,
            'phone_number' => $request->phone,
        ]);

        $receiverMail = $product->user->email;


        event(new ReachOut($receiverMail));

        return redirect()->back()->with(['success' => 'Message sent successfully']);
    }

//    public function getAuctionCars()
//     {
//
//
//         $today = Carbon::today();
//         // Fetch live auctions (starting today or earlier)
//         $auctions = Auction::with('user', 'images')->get();
//
//         $upcomingAuctions = Auction::with('user', 'images')
//             ->where('starting_date', '>', $today)
//             ->get();
//
//         return view('home.auction.index', ['auctions' => $auctions, 'upcomingAuctions' => $upcomingAuctions]);
//
//     }


    public function getAuctionCars(Request $request)
    {
        $today = Carbon::today();
        $searchTerm = $request->input('search');


        // Base query for live auctions: all auctions except those whose ending date has passed
        $liveAuctionsQuery = Auction::with('user', 'images')
            ->where('ending_date', '>=', $today);

        // Base query for upcoming auctions
        $upcomingAuctionsQuery = Auction::with('user', 'images')
            ->where('starting_date', '>', $today)
            ->limit(5);

        // Apply search filter if a search term is provided
        if ($searchTerm) {
            $liveAuctionsQuery->where(function ($query) use ($searchTerm) {
                $query->where('model', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('address', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('desc', 'LIKE', '%' . $searchTerm . '%');
            });

            $upcomingAuctionsQuery->where(function ($query) use ($searchTerm) {
                $query->where('model', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('address', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('desc', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Execute the queries
        $liveAuctions = $liveAuctionsQuery->get();
        $upcomingAuctions = $upcomingAuctionsQuery->get();

        // Return the view with the fetched auctions
        return view('home.auction.index', [
            'auctions' => $liveAuctions,
            'upcomingAuctions' => $upcomingAuctions,
            'searchTerm' => $searchTerm
        ]);
    }


    public function getAuctionCarsById($id)
    {
        try {
            // Retrieve the session data
            $countdownData = Session::get('countdownData');

            // Check if countdownData is a JSON string and decode it if necessary
            if (is_string($countdownData)) {
                $countdownData = json_decode($countdownData, true);
            }

            // Ensure countdownData is an array
            if (!is_array($countdownData)) {
                // Handle the error accordingly
                return redirect()->route('get.auction.cars');
            }

            // Define the default countdown
            $defaultCountdown = [
                'days' => '3',
                'hours' => '19',
                'minutes' => '20',
                'seconds' => '48'
            ];

            // Check if the provided ID exists in the countdown data and set the countdown accordingly
            $countdown = $countdownData[$id] ?? $defaultCountdown;

            // Find the auction record by the provided ID
            $auction = Auction::with('images', 'user', 'categories', 'bids')->findOrFail($id);

            // Retrieve the bids for the auction
            $bids = $auction->bids;

            // Calculate the total count of bids
            $totalBids = $bids->count();

            // Find the highest bid
            $highestBid = $bids->max('price');

            $MinimumBid = $bids->min('price');

            // Add the views increment
            $auction->increment('views');

            // Get the current date and time
            $currentDateTime = Carbon::now()->format('l, h:ia');

            // Add countdown data to the auction
            $auction->countdown = $countdown;

            // Prepare the data to be returned

            // Return the auction data as a JSON response
            return view('home.auction.view_auction', ['auction' => $auction, 'currentDateTime' => $currentDateTime,
                'totalBids' => $totalBids, 'highestBid' => $highestBid, 'MinimumBid' => $MinimumBid]);

        } catch (\Exception $e) {
            // Log the error
            Log::error('Error retrieving auction data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('get.auction.cars')->with('error', 'An error occurred while retrieving the auction data. Please try again.');
        }
    }



    public function comment(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255', // Adjust validation rules as needed
            'post_id' => 'required'
        ]);

        try {
            // Create a new comment using mass assignment
            $comment = Comment::create([
                'user_id' => auth()->user()->id,
                'comment' => $validatedData['comment'],
                'post_id' => $validatedData['post_id']
            ]);

            $post = Product::find($validatedData['post_id']);

            $ownermail = $comment->user->email;
            $title = "Your product named '$post->car_name' has received a comment.";


            event(new CommentEvent($ownermail, $title));

            // Return success response
            return redirect()->back()->with(['success' => 'Comment posted successfully']);
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            // For now, we'll redirect back with an error message
            return redirect()->back()->with(['error' => 'Failed to post comment. Please try again later.' . $e->getMessage()]);
        }
    }


    public function bussinessReview(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'reviews' => 'required|string|max:255', // Adjust validation rules as needed
            'bussiness_id' => 'required'
        ]);

        try {
            // Create a new comment using mass assignment
            $review = BussinessReview::create([
                'reviewer_id' => auth()->user()->id,
                'reviews' => $validatedData['reviews'],
                'bussiness_id' => $validatedData['bussiness_id']
            ]);

            $ownermail = $review->user->email;
            $title = "Your profile has received a review.";


            event(new CommentEvent($ownermail, $title));

            // Return success response
            return redirect()->back()->with(['success' => 'Review posted successfully']);
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            // For now, we'll redirect back with an error message
            return redirect()->back()->with(['error' => 'Failed to post review. Please try again later.']);
        }
    }



    public function partReview(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255', // Adjust validation rules as needed
            'part_id' => 'required'
        ]);

        try {
            // Create a new comment using mass assignment
            $review = PartReviews::create([
                'user_id' => auth()->user()->id,
                'comment' => $validatedData['comment'],
                'part_id' => $validatedData['part_id']
            ]);

            $part = Part::find($validatedData['part_id']);

            $ownermail = $review->user->email;
            $name = auth()->user()->name;
            $urlLink = url('product/view-part/' . $validatedData['part_id']);

            $title = <<<EOT
                        Dear Valued User,
                        {$name} dropped a review on your asset part.
                        Part Name: {$part->part_name}.
                        View at  $urlLink
                        EOT;


            event(new CommentEvent($ownermail, $title));

            // Return success response
            return redirect()->back()->with(['success' => 'Review posted successfully']);
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            // For now, we'll redirect back with an error message
            return redirect()->back()->with(['error' => 'Failed to post review. Please try again later.']);
        }
    }

    public function searchProduct(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // Retrieve inputs from the form
        $brand_id = $request->input('brand_id');
        $category_id = $request->input('category_id');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        // Start with a base query
        $query = Product::query();

        // Add conditions based on inputs
        if ($brand_id) {
            $query->where('brand_id', $brand_id);
        }

        // Add conditions based on inputs
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        // Add price range condition if both min and max prices are provided
        if ($min_price && $max_price) {
            $query->whereBetween('price', [$min_price, $max_price]);
        } else {
            // If only one of min or max price is provided, adjust the condition accordingly
            $query->when($min_price, function ($query) use ($min_price) {
                return $query->where('price', '>=', $min_price);
            })->when($max_price, function ($query) use ($max_price) {
                return $query->where('price', '<=', $max_price);
            });
        }

        // Execute the query and fetch the results
//        $products = $query->get();
        $products = $query->with('subcategories')->get();

        // Fetch 5 auctions for display
        $auctions = Auction::all()->take(5);


        // Return the search results to the view
        return view('home.products.search', compact('products', 'auctions'));
    }

    public function valueAsset(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $brands = Brand::all();

        return view('home.value.index', compact('brands'));
    }


    public function saveValuedAsset(Request $request): \Illuminate\Http\RedirectResponse
    {


        $saveAsset = ValueAsset::create([
            'user_id' => auth()->user()->id,
            'model' => $request->model,
            'color' => $request->color,
            'mileage' => $request->mileage,
            'engine_type' => $request->engine_type,
            'desc' => $request->desc,
            'brand' => $request->brand,
            'asset_type' => $request->selected_car_type
        ]);


        $uploadImagesAndGetLinks = $this->uploadImagesAndGetLinks($request);
        foreach ($uploadImagesAndGetLinks as $imageUrl) {
            ValueDocs::create([
                'value_asset_id' => $saveAsset->id,
                'type' => 'Images',
                'file_name' => $imageUrl,
            ]);
        }

        $uploadDocsAndGetLinks = $this->uploadDocsAndGetLinks($request);
        foreach ($uploadDocsAndGetLinks as $docsUrl) {
            ValueDocs::create([
                'value_asset_id' => $saveAsset->id,
                'type' => 'Docs',
                'file_name' => $docsUrl,
            ]);
        }

        return redirect()->back()->with(['success' => 'Record received. You shall be notified upon reviewal.']);
    }


    public function uploadDocsAndGetLinks($request): array
    {
        $fileUrls = [];

        if ($request->hasFile('legalDocs')) {
            foreach ($request->file('legalDocs') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName(); // Generate a unique name for the file
                $filePath = $file->storeAs('public/uploads', $fileName);
                $fileUrl = asset('storage/uploads/' . $filePath);
                $fileUrls[] = $fileUrl;
            }
        } else {
            // Handle case where no files were uploaded
        }

        return $fileUrls;
    }


    public function showCountdown()
    {
        $startingDate = Carbon::create(2024, 5, 13);
        $endingDate = Carbon::create(2024, 5, 22);

        return view('home.test', compact('startingDate', 'endingDate'));
    }


    public function updateAuctionStatus(Request $request)
    {
        $auctionId = $request->input('auction_id');
        $auction = Auction::find($auctionId);

        if ($auction) {
            $auction->update(['is_expired' => 2]);  // Assuming 'is_expired' is the field you want to update
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Auction not found'], 404);
    }


    public function countdown(Request $request)
    {
        $countdownData = $request->input('countdownData');

        // Store the countdown data in the session
        session(['countdownData' => $countdownData]);

        return response()->json(['success' => true]);

    }


    public function BidForAuction(Request $request)
    {
        try {
            // Step 1: Validate the incoming request
            $request->validate([
                'auction_id' => 'required',
                'amount_to_bid' => 'required|numeric|min:0',
            ]);

            // Step 2: Create a new bid and retrieve owner

            $auction = Auction::findOrFail($request->auction_id);
            Bid::create([
                'user_id' => Auth::id(),
                'auction_id' => $request->auction_id,
                'price' => $request->amount_to_bid,
                'owner_id'  => $auction->user_id
            ]);

            // Step 4: Notify the auction owner
            $owner = $auction->user; // Assuming the Auction model has a 'user' relationship defined

            $data = [
                'title' => 'New Bid Notification',
                'message' => Auth::user()->name . ' just bid on your auction car named ' . $auction->car_name . ' with a bid of N' . number_format($request->amount_to_bid)
            ];

            $owner->notify(new NotifyAuctionOwners($data));

            // Step 5: Redirect back with a success message
            return redirect()->back()->with('success', 'You have successfully bid on this asset. You will be notified of any updates.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error bidding for auction: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while placing your bid. Please try again.');
        }
    }


    public function sold_items(){


        $solditems = SoldItems::with('buyer_details')
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.sold-history', ['solditems' => $solditems]);
    }


    public function sold_items_by_id($id)
    {
        $solditem = SoldItems::with('buyer_details', 'owner_details')->where('id', $id)->first();

        // Check if the sold item exists
        if ($solditem) {
            $solditem->update(['is_viewed' => 1]);
        }

        return view('admin.modal.orders', ['solditem' => $solditem]);
    }



    public function showForm()
    {
        return view('home.test');
    }

    public function handleForm(Request $request)
    {
        $selectedFrameworks = $request->input('frameworks', []);

        // Process the selected frameworks
        // For example, you can store them in the database or perform some other action

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function showBlog()
    {
        $categories = Category::all();
        $allBlogs = Blog::where('is_active', '1')->paginate(10);
        $featuredBlog = Blog::where('is_active', '1')->orderBy('created_at', 'desc')->first();
        $unrelatedBlogs = Blog::where('id', '!=', '1')->take(5)->get();

        return view('home.blog', [
            'categories' => $categories,
            'allBlogs' => $allBlogs,
            'featuredBlog' => $featuredBlog,
            'unrelatedBlogs' => $unrelatedBlogs,
        ]);
    }



    public function showBlogById($id){

         $blog = Blog::with('user')->find($id);
         $categories = Category::all();

         $unrelatedBlogs = Blog::where('id', '!=', $id)->take(5)->get();

         $otherBlogs = Blog::where('id', '!=', $id)->get();




         return view('home.blog-details', ['blog' => $blog, 'otherBlogs' => $otherBlogs,  'categories' => $categories, 'unrelatedBlogs' => $unrelatedBlogs]);

     }


    public function featureUser(Request $request)
    {
        // Validate request
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Find the user
        $user = User::findOrFail($request->user_id);

        // Toggle the 'is_featured' attribute
        if ($user->is_featured === 0 || $user->is_featured === null) {
            $user->is_featured = 1;
            $message = 'User has been featured on website homepage';
        } else {
            $user->is_featured = 0;
            $message = 'User has been unfeatured from website homepage';
        }

        // Save the changes
        $user->save();

        // Redirect back or return a response as needed
        return redirect()->back()->with('success', $message);
    }



    public function toggleFeatured(Request $request)
    {
        // Validate request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Find the product
        $product = Product::findOrFail($request->product_id);

        // Toggle the 'is_featured' attribute
        $product->is_featured = !$product->is_featured;

        // Save the changes
        $product->save();

        // Redirect back or return a response as needed
        return redirect()->back()->with('success', 'Product featured status toggled successfully.');
    }

}
