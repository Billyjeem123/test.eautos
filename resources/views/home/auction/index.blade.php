<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Asset</title>
    <link rel="stylesheet" href="/home/css/allAuction.css">
    <link rel="stylesheet" href="/home/assets/fontawesome/css/all.min.css">
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
    <div class="hero-message">
        <div class="">
            <h2>Get the best bidder for your Car</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat obcaecati corrupti ab officiis saepe enim
                repellendus asperiores sunt doloremque aliquid? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                alias libero incidunt? Recusandae officia at, praesentium dolorum ipsum libero aut?</p>
        </div>
        <img src="images/ellipses/Ellipse 43.png" width="25%" alt="">
    </div>
    <div class="search">
        <form action="">
            <input type="text" placeholder="Enter a Model or Brand">
            <button id="search"><span><i class="fa fa-search"></i></span>Search</button>
        </form>
    </div>
</header>
<main>
    <section>
        <div class="upcoming">
            <h3>Up Coming Auction</h3><br>

            <div class="card_group">


                <div class="card">
                    <div class="time">
                        <p>
                            <strong>Days</strong><br>
                            <span>50</span>
                        </p>
                        <p>
                            <strong>Hours</strong><br>
                            <span>20</span>
                        </p>
                        <p>
                            <strong>Minutes</strong><br>
                            <span>12</span>
                        </p>
                    </div>
                    <div class="card_img"
                         style="background: url(/home/images/cars/Optimized-dhiva-krishna-YApS6TjKJ9c-unsplash.jpg) no-repeat;">
                        <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                        <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                    </div>
                    <div class="card_text">
                        <h5>2014 Toyota Camry</h5>
                        <div class="details">
                            <p class="location">Lagos Nigeria (11 miles)</p>
                            <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                            <ul>
                                <li>New</li>
                                <li>10 Cylinder</li>
                                <li style="background-color: grey; border: none; color: #ffffff;">Grey</li>
                                <li>Fuel</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card_footer">
                        <p><strong>Starts:</strong> 20-11-2023</p>
                        <a href="" class="footer_button">View</a>
                    </div>
                </div>
            </div>
            <a href="" class="upcoming_auction_more">
                See All
            </a>
        </div>
        <!-- ------------------------------------------------------- -->
        <!-- ------------------------------------------------------- -->
        <div class="live_auction">
            <h3>Live Auction</h3><br>
            <div class="card_group">

                @forelse ($auctions as $auction)
                    <div class="card">
                        <div class="time">
                            <p>
                                <strong>Days</strong><br>
                                <span>50</span>
                            </p>
                            <p>
                                <strong>Hours</strong><br>
                                <span>20</span>
                            </p>
                            <p>
                                <strong>Minutes</strong><br>
                                <span>12</span>
                            </p>
                        </div>
                        <div class="card_img"
                             style="background: url('{{ $auction->images[0]['image'] }}') no-repeat;">
                            <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                            <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                        </div>
                        <div class="card_text">
                            <h5>{{$auction->car_name}}</h5>
                            <div class="details">
                                <p class="location">{{$auction->address}} ({{$auction->mileage}})</p>
                                <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                                <ul>
                                    <li>New</li>
                                    <li>{{$auction->cylinder ?? "10 Cylinder"}}</li>
                                    <li style="background-color: blue; border: none; color: #ffffff;">{{$auction->color}}</li>
                                    <li>Fuel</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card_footer">
                            <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                            <a href="" class="footer_button">Place a bid</a>
                        </div>
                    </div>

                @empty
                    <div class="card" style="text-align: center;" >
                        <p>No auction items at the moment.</p>
                    </div>
                @endforelse


            </div>
        </div>
    </section>
    <!-- ---------------------------------- -->
    <!-- ----------------------------------- -->
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
                    <li><a href="index.html">Cars</a></li>
                    <li><a href="../bikes/index.html">Bikes</a></li>
                    <li><a href="../trucks/index.html">Trucks</a></li>
                    <li><a href="../farm/index.html">Farms</a></li>
                    <li><a href="../plants/index.html">Plants</a></li>
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
        state = true;
        $(".aside_hide").on("click", function () {
            if (state) {
                $(".aside").css({
                    display: "block",
                    "z-index": "999",
                });
                $(".aside_hide").css("display", "none");
            }
        });

        $(".close_aside").on("click", function () {
            if ($(state)) {
                $(".aside").css({
                    display: "none",
                });
                $(".aside_hide").css("display", "flex");
            }
        });

        // -------------------------------------
        $height = $(".car_type_nav").height() + $(".navbar").height();
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
                    $(".hero").css("padding-top", "5rem");
                }
            });
        });
    });

</script>
</body>

</html>
