<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/vehicleDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .comment-section {
            margin-top: 20px;
        }

        .comment-section h4 {
            margin-bottom: 10px;
        }

        .comment-section textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            margin-bottom: 10px;
        }

        .comment-section button {
            background-color: #394293;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .comment-section button:hover {
            background-color: #0056b3;
        }

    </style>

</head>

<body>
@include('home.includes.nav')

<div class="car_type_nav">
    <ul>
        <li class="option">Menu <i class="fa fa-angle-down"></i></li>
        <li><a href="{{route('index')}}">Home</a></li>
        @foreach($subcategories as $subcategory)
            <li><a href="{{route('get.sub.product', urlencode($subcategory))}}" class="{{ $sub_category_name == $subcategory ? 'active' : '' }}"  >{{$subcategory}}</a></li>
        @endforeach



{{--        <li>--}}
{{--            <a href="{{ route('sell') }}" class="{{ request()->routeIs('sell') ? 'active' : '' }}">Sell A {{ Str::singular($categoryName) }}</a>--}}
{{--        </li>--}}

        <li><a href="{{route('value.vehicle')}}">Value My {{ Str::singular($categoryName) }}</a></li>
        <li>
            <a href="{{ route('get.auction.cars') }}" class="{{ request()->routeIs('get.auction.cars') ? 'active' : '' }}">Auction</a>
        </li>

        <li><a href="{{route('parts')}}">{{ Str::singular($categoryName) }} Parts</a></li>
        <li>
            <a href="{{ route('stolen') }}" class="{{ request()->routeIs('stolen') ? 'active' : '' }}">Stolen {{ Str::singular($categoryName) }}</a>
        </li>

        <li>
            <a href="{{ route('blacklist') }}" class="{{ request()->routeIs('blacklist') ? 'active' : '' }}">BlackList</a>
        </li>
    </ul>
</div>
<header class="hero">
    <style>
        .image-wrapper .main-image{
            width: 85%;
            height: auto; 
            object-fit: cover;
        }
        .image-nav .nav-image{
            width: 100%;
            height: auto; 
            object-fit: cover;
        }
        
        @media (max-width:768px){
        .image-wrapper .main-image{
            width: 100%;
            height: auto; 
            object-fit: cover;
        }
         .image-nav .nav-image{
            width: 50%;
            height: auto; 
            object-fit: cover;
        }
        }
    </style>
    <div class="image-wrapper">
        <!-- Main image -->
        <img src="{{ $products->images[0]['image'] }}" class="main-image" alt="">

        <!-- Image navigation -->
        <div class="image-nav">
            @foreach($products->images as $image)
                <img src="{{ $image['image'] }}" class="nav-image" alt="">
            @endforeach
        </div>
    </div>


</header>
<!-- ---------------------------- -->
<main>
    <div class="main_nav">
        <div>
            <h3>{{$products->car_name}}</h3>
            <p>{{$products->location . ' ' . $products->address}}</p>
            <p><span>Price</span>
                <span style="font-weight: bold; font-size: 18px; color: #394293;">₦ {{ number_format($products->price,2) }}</span>
            </p>
        </div>
        <a href="#">Compare</a>
    </div>
    <!-- --------------------------------------------------- -->
    <section>
        <aside class="aside1">
            <ul>
                <h3>Vehicle Details</h3>
                <hr>
                <li><strong>Vehicle Type</strong> <span>{{$categoryName}}</span></li>
                <hr>
                <li><strong>Essential Verified</strong> <span>Yes</span></li>
                <hr>
                <li><strong>Property Status</strong> <span>For Sale</span></li>
                <hr>
                {{--                <li><strong>Car ID</strong> <span>EP3456</span></li>--}}
                <li>
                    <strong>Valid Documents</strong>
                    <span>{{ $products->car_docs == 1 ? "YES" : "NO" }}</span>
                </li>

                <hr>
                <li><strong>Engine Type</strong> <span>{{$products->cylinder}}</span></li>
                <hr>
                <li><strong>Color</strong> <span>{{$products->color}}</span></li>
                <hr>
                <li><strong>Source</strong> <span>Fuel</span></li>
                <hr>
                <li><strong>Date Posted</strong> <span>{{$products->created_at->diffForHumans()}}</span></li>
                <hr>
                <li><strong>Location</strong> <span>{{$products->location . ' ' . $products->address}}</span></li>
                <hr>
                <li><strong>Installment</strong> <span>{{ $products->is_installemt == 1 ? "YES" : "NO" }}</span></li>
                <hr>
                <li><strong>Number of Views</strong> <span>{{$products->views}}</span></li>
                <hr>
                <li><strong>Receipt</strong> <span>{{ $products->car_receipt == 1 ? "YES" : "NO" }}</span></li>
                <hr>
                <li><strong>Mileage</strong> <span>{{$products->mileage}}</span></li>
            </ul>
            <ul>
                <h3>Description</h3><br>
                <p>{{$products->desc}}</p>
                <a href="" class="" style="display: none">Open in Google Map</a>
            </ul>
        </aside>
        <aside class="aside2">
            <div class="card_group">
                <!--<div class="card"></div>-->
                <div class="">
                    <h3>{{$products->bussiness_name ?? "E Autos Automobile"}}</h3>
                </div>
            </div>
            <div>
                <a href="#" style="flex-wrap:wrap; gap:10px;">
                    <span><i class="fa fa-user"></i></span>
                    View Dealer Profile<br>
                    <span style="font-size: 13px; background: #f2f2f2; 
                border-radius: 10px; padding: 4px 8px; display: flex; 
                justify-content: start; align-items: center; width: fit-content;">
                    Verified
                    <img src="https://img.icons8.com/?size=48&id=98A4yZTt9abw&format=png" width="20px" />
                </span>
                <!--    <span style="font-size: 13px; background: #f2f2f2; -->
                <!--border-radius: 10px; padding: 4px 8px; display: flex; -->
                <!--justify-content: start; align-items: center; width: fit-content;">-->
                <!--    Not-verified-->
                <!--    <img src="https://img.icons8.com/?size=48&id=13742&format=png" width="20px" />-->
                <!--</span>-->
                </a>
            </div>
            <p><span><i class="fa fa-map-marker-alt"></i></span>&nbsp;&nbsp; {{$products->location . ' ' . $products->address}}</p><br>
            <p><span><i class="fa fa-road"></i></span>&nbsp;&nbsp; 10 Miles Away</p><br>
            <p><span><i class="fa fa-phone"></i></span>&nbsp;&nbsp;
            <a style="margin:0; text-decoration: none; padding: 0 !important; border:none !important; display:inline-flex !important; font-weight:500; text-decoration:underline;" 
            href="tel: {{$products->user->phone}}">{{$products->user->phone}}</a></p><br>
             <p><span><i class="fa fa-envelope"></i></span>&nbsp;&nbsp;
             <a style="margin:0; text-decoration: none; padding: 0 !important; border: none !important; display: inline-flex !important; font-weight:500; text-decoration:underline;" 
             href="mailto:{{$products->user->email}}">{{$products->user->email}}</a></p>
              <span style="display: flex; gap: 3px; justify-content: start !important; align-items: center; width: fit-content;">
            <a href="#" class="share" 
            style="color: #000; text-decoration:none; padding:0 !important; border:none !important; font-size: 20px;">
                <i class="fab fa-facebook"></i>&nbsp;&nbsp; <strong></strong></a>
            <a href="#" class="share" 
            style="color: #000; text-decoration:none; padding:0 !important; border:none !important; font-size: 20px;">
                <i class="fab fa-instagram"></i>&nbsp;&nbsp; <strong></strong></a>
            <a href="#" class="share"
            style="color: #000; text-decoration:none; padding:0 !important; border:none !important; font-size: 20px;">
                <i class="fab fa-twitter"></i>&nbsp;&nbsp; <strong></strong></a>
            <a href="https://wa.me/{{$products->user->phone}}" class="share"
            style="color: #000; text-decoration:none; padding:0 !important; border:none !important; font-size: 20px;">
                <i class="fab fa-whatsapp"></i>&nbsp;&nbsp; <strong></strong></a>
            </span>
            <a>To Schedule Meeting &nbsp; <i class="fa fa-arrow-down"></i></a>

            <form id="contactForm" action="{{ route('client.reachout') }}" method="POST">
                @csrf
                <input type="text" placeholder="Your Name" name="name" id="name" value="{{ old('name') }}" required>
                <input type="text" placeholder="Your Email" name="email" id="email" value="{{ old('email') }}" required>
                <input type="text" placeholder="Your Phone Number" name="phone" id="phone" value="{{ old('phone') }}" required>
                <input type="hidden" name="productid" id="productid" value="{{ old('productid', $products->id) }}">
                <textarea name="message" id="message" cols="30" rows="6" placeholder="I'm interested in buying............" required>{{ old('message') }}</textarea>
                <button type="button" id="sendButton">Send Email</button>
            </form>

            <script>
                document.getElementById('sendButton').addEventListener('click', function() {
                    @auth
                    document.getElementById('contactForm').submit();
                    @else
                    // Save form data to session storage before redirecting
                    let formData = {
                        name: document.getElementById('name').value,
                        email: document.getElementById('email').value,
                        phone: document.getElementById('phone').value,
                        message: document.getElementById('message').value,
                        productid: document.getElementById('productid').value
                    };

                    // Save to session storage
                    Object.keys(formData).forEach(key => {
                        sessionStorage.setItem(key, formData[key]);
                    });

                    // Redirect to login page
                    window.location.href = "{{ route('login') }}";
                    @endauth
                });

                document.addEventListener('DOMContentLoaded', function() {
                    // Check if there is saved data in session storage and populate the form
                    ['name', 'email', 'phone', 'message', 'productid'].forEach(key => {
                        if (sessionStorage.getItem(key)) {
                            document.getElementById(key).value = sessionStorage.getItem(key);
                            sessionStorage.removeItem(key); // Clean up the session storage
                        }
                    });

                    // Check if the form was submitted successfully
                    @if(session('status') && session('status') === 'success')
                    document.getElementById('contactForm').reset();
                    @endif
                });
            </script>



        </aside>
    </section>
    <!-- --------------------------------------------------- -->
    <!-- ----------------------------------------- -->
    <div class="reviews container">
        <h3>Reviews</h3>
        <div class="card_group">
            @forelse ($comments as $comment)
            <div class="card">
                <div class="card_header">
                    <strong>{{ substr($comment->user->name, 0, 1) }}
                    </strong>
                    <small>{{$comment->user->name}}</small>
                </div>
                <p>{{$comment->comment}}</p>
            </div>

            @empty
                <div class="card" style="text-align: center;" >
                    <p>No comments available at the moment.</p>
                </div>
            @endforelse

        </div>

        <!-- Add a textarea for commenting -->
        <div class="comment-section">
            <h4>Leave a Comment</h4>
            <form action="{{route('post.comment')}}" method="post" >
                @csrf
                <input type="hidden" name="post_id" value="{{$products->id}}">
                <textarea name="comment" id="comment" placeholder="Write your comment here..." rows="4" required></textarea>
                <button type="submit">Post Comment</button>
            </form>

        </div>

    </div>
    <!-- --------------------------------------------------- -->
    <!-- ----------------------------------------- -->
    <div class="similar container">
        <h3><span>Similar {{$categoryName}}</span></h3><br>
        <div class="card_group">

            <div class="card_group">

                @foreach ($similarProducts as $product)
                    <div class="card">
                        <a href="{{route('product.show', $product->id)}}" class="card_link">
                            <div class="card_img" style="background: url('{{ $product->images[0]['image'] }}') no-repeat;"></div>
                        </a>
                        <div class="card_text">
                            <h5>{{ $product->car_name}}</h5>
                            <small><em>Posted by: {{ $product->user->name }} - Posted  {{ $product->created_at->diffForHumans() }}</em></small>
{{--                            <small><em>Posted by: {{ $product->user->name}} - Joined {{$product->user->created_at->diffForHumans()}} </em></small>--}}
                            <div class="details">
                                <ul>
                                    <li>{{$product->subcategories->name}}</li>
                                    <li>{{$product->cylinder}}</li>
                                    <li style="background-color: {{ $product->color }}; border: none; color: grey;">{{ $product->color }}</li>
                                    <li>Fuel</li>
                                </ul>
                                <h5> ₦ {{ number_format($product->price,2) }}</h5>
                                <p>{{ $product->location }} ({{ $product->mileage }})</p>
                            </div>
                        </div>
              <!--          <div class="card_footer">-->
              <!--              <h6>Compare</h6>-->
              <!--              <span>-->
              <!--  <i class="fa-regular fa-heart"></i>-->
              <!--  <i class="fa fa-share"></i>-->
              <!--</span>-->
              <!--          </div>-->
                    </div>
                @endforeach


            </div>


        </div>
    </div>
    <!-- ----------------------------------------------------- -->

</main>

@include('home.includes.footer')



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script src="/home/js/index.js"></script>


<script>
    $(document).ready(function () {
        $imageClick = $(".image-nav img");
        $imageClick.click(function () {
            $imageSource = $(this).attr("src");
            $(".main-image").attr("src", $imageSource);
        })

        // -------------------------------------
        $height = $(".car_type_nav").height() + $(".navbar").height();
        $(window).scroll(function () {
            if ($(window).scrollTop() > $height) {
                $(".car_type_nav").css({
                    position: "fixed",
                    top: "3.9rem",
                    left: "0",
                    "z-index": "9999",
                });
            } else {
                $(".car_type_nav").css({
                    position: "normal",
                    top: "inherit",
                });
                $("header").css("padding-top", "4rem");
            }
        });
    });
</script>
</body>

</html>
