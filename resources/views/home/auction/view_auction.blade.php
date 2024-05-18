<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Auction</title>
    <link rel="stylesheet" href="viewAuction.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="../assets/slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="/home/css/view-auction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
<nav class="navbar">
    <a href="../index.html" class="logo">Logo</a>
    <ul>
        <li><a href="index.html" class="active">Cars</a></li>
        <li><a href="../vans/index.html">Vans</a></li>
        <li><a href="../bikes/index.html">Bikes</a></li>
        <li><a href="../trucks/index.html">Trucks</a></li>
        <li><a href="../farm/index.html">Farm</a></li>
        <li><a href="../plants/index.html">Plant</a></li>
        <li><a href="../carService.html">Car Service</a></li>
        <li><a href="../scrapeyard.html">Scrapyard</a></li>
    </ul>
    <span class="nav_form">
      <a href="../signUp.html" target="_blank" class="signUp">Sign Up</a>
      <a href="../login.html" class="login" target="_blank">Login</a>
    </span>
    <i class="fa fa-close" id="close_nav"></i>
    <i class="fa fa-bars" id="open_nav"></i>
</nav>
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
            <a href="{{ route('parts') }}" class="{{ request()->routeIs('parts') ? 'active' : '' }}">Car Part</a>
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
        <div class="card">
            <div class="image-wrapper">
                <img src="/home/images/cars/bmw.png" class="main-image" width="100%" alt="">
                <div class="image-nav">
                    <img src="/home/images/cars/bmw.png" alt="">
                    <img src="/home/images/cars/blue car.png" alt="">
                    <img src="/home/images/cars/joey-banks-YApiWyp0lqo-unsplash.jpg" alt="">
                    <img src="/home/images/cars/Optimized-dhiva-krishna-YApS6TjKJ9c-unsplash.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="card">
            <h4>{{$auction->model}}</h4>
            <p>
                <span>Time Left</span>
                <strong>5days 2hr 12min(s)</strong>
                <strong>Thursday, 11:08am</strong>
            </p>
            <p>
                <span>Starting Bid</span>
                <strong>₦ {{number_format($auction->price, 6)}}</strong>
                <span>Current Bid</span>
                <strong>₦300, 658</strong>
            </p>
            <p>
                <span>Ongoing Bids</span>
                <strong>90 Bids</strong>
            </p>

            <div class="description">
                <h4>Description</h4><br>
                <p>{{$auction->desc}}</p>
                <p style="display: flex; margin-top: 1rem;">
                    <a href="#" class="bidButton">Place a Bid</a>
                    <a href=""><i class="far fa-heart"></i>&nbsp; Add to Watchlist</a>
                </p>
            </div>
        </div>
    </div>
    <div class="bid-modal">
        <div class="bid">
            <div class="close-modal">X</div>
            <div class="time">
                <p><strong>Days</strong><br><span>0</span></p>
                <p><strong>Hours</strong><br><span>0</span></p>
                <p><strong>Minutes</strong><br><span>0</span></p>
            </div>
            <form action="">
                <label for="">Enter Your Bid</label>
                <input type="text" placeholder="₦">
                <div class="bid-price">
                    <p>Min N 301,000</p>
                    <p><span
                            style="padding: 5px 10px; border: 1px solid #000000; border-radius: 5px; margin-right: 5px;">Current
                Bid</span>Min N
                        301,000</p>
                    <p>91 Bids</p>
                </div>
                <button>Place a Bid</button>
            </form>
            <p style="display: flex; justify-content: center; align-items: center; flex-wrap: nowrap;">
                <span style="border: 1px solid #707070a3; width: 100%;"></span> or
                <span style="border: 1px solid #707070a3; width: 100%;"></span>
            </p>
            <ul>
                <li>N 20,000</li>
                <li>N 20,000</li>
                <li>N 20,000</li>
                <li>N 20,000</li>
            </ul>
        </div>
    </div>
</header>
<!-- ---------------------------- -->
<main>
    <div class="table">
        <h3>Farm Details</h3>
        <table>
            <tr>
                <th>Property Type</th>
                <td>Farm</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Essential Verified</th>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Property Status</th>
                <td>For Sale</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Farm ID</th>
                <td>E83DFE</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>C of O</th>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Engine Type</th>
                <td>10 Cylinder</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Color</th>
                <td>Yellow</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Source</th>
                <td>Fuel</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Date Posted</th>
                <td>21/22/23</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Location</th>
                <td>Abuja</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Number of Views</th>
                <td>3,000</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <!-- ----------------------------------------------------- -->

</main>

@include('home.includes.footer')



<script src="../js/jquery.js"></script>
<script src="../assets/slick-1.8.1/slick/slick.min.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
<script src="../js/index.js"></script>

<script>

    $(document).ready(function () {
        $imageClick = $(".image-nav img");
        $imageClick.click(function () {
            $imageSource = $(this).attr("src");
            $(".main-image").attr("src", $imageSource);
        })

        $(".bidButton").click(function () {
            $(".bid-modal").css("display", "flex");
        });
        $(".close-modal").click(function () {
            $(".bid-modal").css("display", "none");
        });

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
                $("header").css("padding-top", "5rem");
            }
        });
    })
</script>
</body>

</html>
