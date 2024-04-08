<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;

class ProductController extends Controller
{

    public function index(){

        $brands = Brand::all();
        $categories=  Category::all();

        return view('admin.vehicle', ['brands' => $brands, 'categories' => $categories]);
    }


    public function getSubcategories($categoryId) {
        // Logic to fetch subcategories based on the category ID
        $subcategories = SubCategory::where('category_id', $categoryId)->pluck('name', 'id');
        return response()->json($subcategories);
    }


    public function store(Request $request)
{
    $validator = $this->validateRequest($request);


    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]); // Redirect back with input and error message
    }

    // Save category
    $product  = Product::create([
        'category_id' => $request->category_id,
        'sub_category_id' => $request->sub_category_id,
        'brand_id' => $request->brand_id,
        'model' => $request->model,
        'color' => $request->color,
        'address' => $request->address,
        'location' => $request->location,
        'price' => $request->price,
        'deed' => $request->deed  ? 1 : 0,
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
    return redirect()->back()->with(['success' => 'Product created successfully']);
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
private function validateRequest(Request $request)
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

    public function indexAll(){


        $products  = Product::with('brand', 'images', 'categories')->get();
        // echo "<pre>";
        // echo json_encode($products, JSON_PRETTY_PRINT);
        // echo "</pre>";
        return view('admin.listing', ['products' => $products]);
    }


    public function toggleBlockProduct($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->is_approved = $product->is_approved ? 0 : 1;
        $product->save();

        $status = $product->is_approved ? 'Activated' : 'Deactivated';
        $message = "Record $status successfully";

        return redirect()->back()->with('success', $message);
    }

    public function deleteProduct($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($id);
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
                ->where('category_id', $id);


            // Execute the query to fetch products
            $products = $productsQuery->get();
            // Return the data to your view or do something else with it
            return view('home.products.index', compact('category', 'subcategories', 'products', 'categoryName'));
        } catch (ModelNotFoundException $e) {
            // Handle the case where the category is not found
            abort(404); // Return a 404 response
        }
    }




    public function getSubProductCategory($sub_category_name)
    {
        try {
            // Retrieve the subcategory by its name

            $sub_category_name = str_replace('+', ' ', $sub_category_name);

            $subcategory = SubCategory::where('name', $sub_category_name)->firstOrFail();

            // Retrieve the category of the subcategory
            $categoryName = $subcategory->category->catname;

            // Retrieve all subcategories related to the category
            $subcategories = SubCategory::where('category_id', $subcategory->category_id)->pluck('name', 'id');

            // Eager load products and their images related to the selected subcategory
            $products = Product::with('images', 'brand', 'user')
                ->whereHas('subcategories', function ($query) use ($sub_category_name) {
                    $query->where('name', $sub_category_name);
                })
                ->get();

            // Return the data to your view
            return view('home.products.sub-category-product', compact('subcategories',  'sub_category_name', 'categoryName', 'products'));
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

            // Return the data to your view or do something else with it
            return view('home.products.details', compact('categoryName', 'products', 'subcategories', 'sub_category_name', 'category'));
        } catch (ModelNotFoundException $e) {
            // Handle the case where the product or subcategory is not found
            abort(404); // Return a 404 response
        }
    }






}
