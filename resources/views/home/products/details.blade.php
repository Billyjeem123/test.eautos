<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="/home/css/vehicleDetails.css">
    <link rel="stylesheet" href="/home/assets/fontawesome/css/all.min.css">

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

        <li><a href="">Sell A {{ Str::singular($categoryName) }}</a></li>
        <li><a href="">Value My {{ Str::singular($categoryName) }}</a></li>
        <li><a href="auction.html">Auction</a></li>
        <li><a href="parts.html">{{ Str::singular($categoryName) }} Parts</a></li>
        <li><a href="stolenCars.html">Stolen {{ Str::singular($categoryName) }}</a></li>
        <li><a href="blacklist.html">Blacklist</a></li>
    </ul>
</div>
<header class="hero">
    <div class="image-wrapper">
        <!-- Main image -->
        <img src="{{ $products->images[0]['image'] }}" class="main-image" style="width: 100%; height: auto; object-fit: cover;" alt="">

        <!-- Image navigation -->
        <div class="image-nav">
            @foreach($products->images as $image)
                <img src="{{ $image['image'] }}" class="nav-image" style="width: 100%; height: auto; object-fit: cover;" alt="">
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
        <a href="">Car Page</a>
    </div>
    <!-- --------------------------------------------------- -->
    <section>
        <aside class="aside1">
            <ul>
                <h3>Vehicle Details</h3>
                <hr>
                <li><strong>Property Type</strong> <span>{{$categoryName}}</span></li>
                <hr>
                <li><strong>Essential Verified</strong> <span>Yes</span></li>
                <hr>
                <li><strong>Property Status</strong> <span>For Sale</span></li>
                <hr>
{{--                <li><strong>Car ID</strong> <span>EP3456</span></li>--}}
                <li>
                    <strong>Car Document</strong>
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
                <li><strong>Car Receipt</strong> <span>{{ $products->car_receipt == 1 ? "YES" : "NO" }}</span></li>
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
                <div class="card"></div>
                <div class="card">
                    <h3>{{$products->bussiness_name ?? "E Autos Automobile"}}</h3>

                </div>
            </div>
            <p><i class="fa fa-phone"></i>&nbsp; <span>{{$products->user->phone}}</span></p><br>
            <p><i class="fa fa-envelope"></i>&nbsp; <span>{{$products->user->email}}</span></p>
            <a>To Schedule Meeting &nbsp; <i class="fa fa-arrow-down"></i></a>
            <form action="">
                <input type="text" placeholder="Your Name" name="name">
                <input type="text" placeholder="Your Email"  name="email">
                <input type="text" placeholder="Your Phone Number" name="phone">
                <textarea name="" id="" cols="30" rows="6" placeholder="I'm interested in buying............"></textarea>
                <button type="submit">Send Email</button>
            </form>

        </aside>
    </section>
    <!-- --------------------------------------------------- -->
    <!-- ----------------------------------------- -->
    <div class="reviews container">
        <h3>Reviews</h3>
        <div class="card_group">
            <div class="card">
                <div class="card_header">
                    <strong>B</strong>
                    <small>Blessing Lainus</small>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas nisi natus quasi, alias laboriosam ex?</p>
            </div>
            <div class="card">
                <div class="card_header">
                    <strong>B</strong>
                    <small>Blessing Lainus</small>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas nisi natus quasi, alias laboriosam ex?</p>
            </div>
            <div class="card">
                <div class="card_header">
                    <strong>B</strong>
                    <small>Blessing Lainus</small>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas nisi natus quasi, alias laboriosam ex?</p>
            </div>
            <div class="card">
                <div class="card_header">
                    <strong>B</strong>
                    <small>Blessing Lainus</small>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas nisi natus quasi, alias laboriosam ex?</p>
            </div>
            <div class="card">
                <div class="card_header">
                    <strong>B</strong>
                    <small>Blessing Lainus</small>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas nisi natus quasi, alias laboriosam ex?</p>
            </div>
            <div class="card">
                <div class="card_header">
                    <strong>B</strong>
                    <small>Blessing Lainus</small>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas nisi natus quasi, alias laboriosam ex?</p>
            </div>
        </div>
        <a href="">Post a Comment</a>
    </div>
    <!-- --------------------------------------------------- -->
    <!-- ----------------------------------------- -->
    <div class="similar container">
        <h3><span>Similar Cars</span> <a href="">See more</a></h3><br>
        <div class="card_group">

            <div class="card_group">

                @foreach ($similarProducts as $product)
                    <div class="card">
                        <a href="{{route('product.show', $product->id)}}" class="card_link">
                            <div class="card_img" style="background: url('{{ $product->images[0]['image'] }}') no-repeat;"></div>
                        </a>
                        <div class="card_text">
                            <h5>{{ $product->car_name}}</h5>
                            <small><em>Posted by: {{ $product->user->name}} - Joined {{$product->user->created_at->diffForHumans()}} </em></small>
                            <div class="details">
                                <ul>
                                    <li>{{$product->subcategories->name}}</li>
                                    <li>{{$product->cylinder}}</li>
                                    <li style="background-color: {{ $product->color }}; border: none; color: #ffffff;">{{ $product->color }}</li>
                                    <li>Fuel</li>
                                </ul>
                                <h5> ₦ {{ number_format($product->price,2) }}</h5>
                                <p>{{ $product->location }} ({{ $product->mileage }})</p>
                            </div>
                        </div>
                        <div class="card_footer">
                            <h6>Compare</h6>
                            <span>
                <i class="fa-regular fa-heart"></i>
                <i class="fa fa-share"></i>
              </span>
                        </div>
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
                    top: "normal",
                });
                $("header").css("padding-top", "4rem");
            }
        });
    });
</script>
</body>

</html>
