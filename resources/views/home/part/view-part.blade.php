<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Part Details</title>
    <link rel="stylesheet" href="/home/css/partDetails.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
@include('home.includes.nav')
<div class="car_type_nav">
    <ul>
        <li class="option">Menu <i class="fa fa-angle-down"></i></li>
        <li><a href="{{route('index')}}">Home</a></li>

        <li>
            <a href="{{ route('value.vehicle') }}" class="{{ request()->routeIs('value.vehicle') ? 'active' : '' }}">Value Asset</a>
        </li>


        <li>
            <a href="{{ route('sell') }}" class="{{ request()->routeIs('sell') ? 'active' : '' }}">Sell A Car</a>
        </li>


        <li>
            <a href="{{ route('get.auction.cars') }}" class="{{ request()->routeIs('get.auction.cars') ? 'active' : '' }}">Auction</a>
        </li>
        <li>
            <a href="{{ route('view.parts') }}" class="{{ request()->routeIs('view.parts') ? 'active' : '' }}">Car Part</a>
        </li>
        <li>
            <a href="{{ route('stolen') }}" class="{{ request()->routeIs('stolen') ? 'active' : '' }}">Stolen Cars</a>
        </li>
        <li>
            <a href="{{ route('blacklist') }}" class="{{ request()->routeIs('blacklist') ? 'active' : '' }}">BlackList</a>
        </li>
    </ul>
</div>
<header class="hero">
    <div class="card_group">
        <div class="card image">
            <img src="{{ $part->image }}" alt="" style="max-height: 500px; max-width: 100%;" />


        </div>
        <div class="card">
            <h2>{{$part->partcategories->part_category}}</h2>
            <div class="card_info">
                <img src="/images/parts/Rectangle 17.png" alt="" style="height:200px">
                <div>
                    <p><span><i class="fa fa-user"></i></span>&nbsp;&nbsp;  {{$part->users->name}} </p>
                    <p><span><i class="fas fa-map-marker-alt"></i></span>&nbsp;&nbsp;  {{$part->location}}</p>
                    <p><span><i class="fa fa-envelope"></i></span>&nbsp;&nbsp; {{$part->users->email}}</p>
                    <p><span><i class="fa fa-phone"></i></span>&nbsp;&nbsp; {{$part->users->phone}}</p>
                </div>
            </div>
            <div class="abt">
                <h5>Description</h5>
                <p>{{$part->description}}</p>
            </div>
            <div class="pricing">
                <h5>Pricing</h5>
                <p>₦ {{ number_format($part->price,2) }}</p>
{{--                <p>1. 1 bag ----- #600000</p>--}}
            </div>
            <span class="share"><i class="fas fa-share"></i>&nbsp;&nbsp; <strong>Share</strong></span><br>
            <div class="card_footer">
                <a href="#">Buy</a><a href="#">Send a Message</a>
            </div>
        </div>
    </div>
</header>
<main>
    <!-- ---------------------------- -->
{{--    <div class="work-image">--}}
{{--        <div class="/images">--}}
{{--            <img src="..//images/workers/Rectangle 1312.png" alt="">--}}
{{--            <img src="..//images/workers/Rectangle 131.png" alt="">--}}
{{--            <img src="..//images/workers/Rectangle 239.png" alt="">--}}
{{--            <img src="..//images/workers/Rectangle 131t.png" alt="">--}}
{{--            <img src="..//images/workers/Rectangle 1313.png" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- ----------------------------------------- -->
    <!-- ----------------------------------------- -->


    <div class="other-option">
        <h3><span>Other {{$part->partcategories->part_category}} Options</span> <a href="#">See more</a></h3>
        <div class="card-group">

            <div class="card">
                <div
                    class="card-image"
                    style="background: url(/images/parts/Rectangle\ 17\ \(8\).png)"
                >
                    <span><i class="far fa-heart"></i></span>
                </div>
                <div class="details">
                    <h4>Cart Parts</h4>
                    <p>
                        <span>₦ 20,000</span>
                        <span>&dollar; 200,000</span>
                        <span>&pound; 180,000</span>
                    </p>
                    <strong><i class="fa fa-location-dot"></i>&nbsp; Lagos</strong>
                </div>
                <div class="card-footer">
                    <p>
                        <span><i class="fa fa-check"></i></span> Verified
                    </p>
                    <a href="javascript:void(0)">View</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------------------------- -->
</main>


<footer>
    <div class="card_group">
        <div class="card">
            <h6>About</h6><br>
            <p>Lorem ipsum dolor sit amet consectetur. Ullamcorper bibendum diam sapien faucibus. Dolor in nibh malesuada
                pharetra aenean eu rhoncus. Non tortor sagittis metus vitae nunc. Varius congue faucibus lacus pharetra nisl
                risus. Bibendum integer fringilla id ante fusce varius eget.</p><br><br>
            <a href="#!">Learn More</a>
        </div>
        <div class="card">
            <h6>Services</h6>
            <nav class="footer_nav">
                <ul class="">
                    <li><a href="cars/index.html">Cars</a></li>
                    <li><a href="bikes/index.html">Bikes</a></li>
                    <li><a href="trucks/index.html">Trucks</a></li>
                    <li><a href="farm/index.html">Farms</a></li>
                    <li><a href="plants/index.html">Plants</a></li>

                    <li><a href="#!">Valuation</a></li>

                    <li><a href="#!">Blacklist</a></li>
                </ul>
                <ul class="">
                    <li><a href="#!">Privacy Police</a></li>
                    <li><a href="#!">Terms and Conditions</a></li>
                    <li><a href="#!">FAQs</a></li>
                    <li><a href="#!">Contact Us</a></li>
                </ul>
            </nav>

        </div>
        <!-- <div class="card">

        </div> -->
        <div class="card">
            <h6>Follow us</h6>
            <div class="socials">
                <a href="#!"><i class="fab fa-facebook"></i></a>
                <a href="#!"><i class="fab fa-square-instagram"></i></a>
                <a href="#!"><i class="fab fa-linkedin"></i></a>
                <a href="#!"><i class="fab fa-square-x-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>
<script src="../assets/fontawesome/js/all.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/index.js"></script>
<script>
    $(document).ready(function () {
        // -------------------------------------
        $height = $(".car_type_nav").height() + $(".navbar").height();
        $(window).scroll(function () {
            if ($(window).scrollTop() > $height) {
                $(".car_type_nav").css({
                    position: "fixed",
                    top: "3.9rem",
                    left: "0",
                    "z-index": "999",
                });
            } else {
                $(".car_type_nav").css({
                    position: "normal",
                    top: "inherit",
                    "z-index": "999",
                });
                $(".hero").css("padding-top", "4rem")
            }
        });
    });
</script>
</body>

</html>
