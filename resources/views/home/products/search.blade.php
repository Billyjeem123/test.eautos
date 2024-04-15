<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="/home/css/cars.css">
    <link rel="stylesheet" href="/home/assets/fontawesome/css/all.css">
</head>

<body>

@include('home.includes.nav')


@include('home.includes.search')
<main>
    <section>
        <div class="aside_hide">Live Auction</div>

        <aside class="aside">
            <div class="close_aside">Close</div>
            <h3>Live Auction</h3>
            <div class="card_group">

                @forelse($auctions as $auction)
                    <div class="card">

                        <div id="auction-timers">
                            <!-- Countdown timer for each auction will be dynamically generated here -->
                        </div>
                        <div class="time">
                            <p>
                                <strong>Days</strong><br>
                                <span id="days">50</span>
                            </p>
                            <p>
                                <strong>Hours</strong><br>
                                <span id="hours">4</span>
                            </p>
                            <p>
                                <strong>Minutes</strong><br>
                                <span id="minutes">31</span>
                            </p>
                        </div>

                        <div class="details">
                            <h5>{{ $auction->car_name }}</h5> <!-- Assuming $item has a 'title' property -->
                            <p class="location">{{ $auction->location }}</p> <!-- Assuming $item has a 'location' property -->
                            <p class="bid_price"> Starting bid: <span> ₦ {{ number_format($auction->price, 2) }}</span></p> <!-- Assuming $item has a 'starting_bid' property -->
                        </div>
                        <div class="card_footer">
                            <span><i class="fa fa-circle"></i></span>
                            <p>Live</p>
                        </div>
                    </div>
                @empty
                    <p>No result found</p>
                @endforelse

            </div>
            <a href="{{route('get.auction.cars')}}" class="see_all">See All</a>

        </aside>
        <div class="latest">
            <h3>Search Cars</h3>

            <div class="card_group">
                <div class="card">

                    <div class="card_img"
                         style="background: url(/home/images/cars/Optimized-joshua-koblin-eqW1MPinEV4-unsplash.jpg) no-repeat;">
                    </div>
                    <div class="card_text">
                        <h5>2014 Toyota Camry</h5>
                        <div class="details">
                            <p class="location">Lagos Nigeria (11 miles)</p>
                            <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                            <ul>
                                <li>New</li>
                                <li>10 Cylinder</li>
                                <li style="background-color: red; border: none; color: #ffffff;">Red</li>
                                <li>Fuel</li>
                            </ul>
                        </div>
                    </div>

                </div>







            </div>
        </div>
    </section>


</main>

@include('home.includes.footer')
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
            }
        });
    });

</script>
</body>

</html>
