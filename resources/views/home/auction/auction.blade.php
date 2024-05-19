<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Asset</title>
    <link rel="stylesheet" href="/home/css/allAuction.css">
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


{{--        <li>--}}
{{--            <a href="{{ route('sell') }}" class="{{ request()->routeIs('sell') ? 'active' : '' }}">Sell A Car</a>--}}
{{--        </li>--}}




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
            <h3>Upcoming Auction</h3><br>

            <div class="card_group">

                @forelse ($auctions as $auction)
                    <div class="card">
                        <div class="time" data-auction-id="{{ $auction->id }}" data-ending-date="{{ $auction->ending_date }}">
                            <p>
                                <strong>Days</strong><br>
                                <span class="days">0</span>
                            </p>
                            <p>
                                <strong>Hours</strong><br>
                                <span class="hours">0</span>
                            </p>
                            <p>
                                <strong>Minutes</strong><br>
                                <span class="minutes">0</span>
                            </p>
                            <p>
                                <strong>Seconds</strong><br>
                                <span class="seconds">0</span>
                            </p>
                        </div>
                        <div class="card_img" style="background: url('{{ $auction->images[0]['image'] }}') no-repeat;">
                            <a href="" class="card_img_icon">
                                <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                            </a>
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
                            <p><strong>Starts:</strong> {{$auction->starting_date}}</p>
                            <a href="" class="footer_button">View</a>
                        </div>
                    </div>
                @empty
                    <div class="card" style="text-align: center;">
                        <p>No auction items at the moment.</p>
                    </div>
                @endforelse




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

                @foreach ($auctions as $auction)
                    <div class="card">
                        <div class="time" data-auction-id="{{ $auction->id }}" data-ending-date="{{ $auction->ending_date }}">
                            <p>
                                <strong>Days</strong><br>
                                <span class="days">0</span>
                            </p>
                            <p>
                                <strong>Hours</strong><br>
                                <span class="hours">0</span>
                            </p>
                            <p>
                                <strong>Minutes</strong><br>
                                <span class="minutes">0</span>
                            </p>
                            <p>
                                <strong>Seconds</strong><br>
                                <span class="seconds">0</span>
                            </p>
                        </div>
                        <div class="card_img" style="background: url('{{ $auction->images[0]['image'] }}') no-repeat;">
                            <a href="" class="card_img_icon">
                                <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                            </a>
                            {{--                            <a href="" class="card_img_icon"><i class="far fa-user"></i></a>--}}
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
                @endforeach




            </div>
        </div>
    </section>
    <!-- ---------------------------------- -->
    <!-- ----------------------------------- -->
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countdownElements = document.querySelectorAll('.time');

        countdownElements.forEach(countdownElement => {
            const auctionId = countdownElement.getAttribute('data-auction-id');
            const endDateString = countdownElement.getAttribute('data-ending-date');
            const endDate = new Date(endDateString).getTime();

            // Debugging: Check if dates are parsed correctly
            console.log(`Auction ID: ${auctionId}`);
            console.log(`End Date: ${endDateString}`);
            console.log(`Parsed End Date (timestamp): ${endDate}`);

            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = endDate - now;

                // Debugging: Check distance calculation
                console.log(`Current Time: ${now}`);
                console.log(`Time Difference: ${distance}`);

                if (distance >= 0) {
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    countdownElement.querySelector('.days').innerText = days;
                    countdownElement.querySelector('.hours').innerText = hours;
                    countdownElement.querySelector('.minutes').innerText = minutes;
                    countdownElement.querySelector('.seconds').innerText = seconds;
                } else {
                    clearInterval(countdownInterval);
                    countdownElement.innerHTML = "EXPIRED";
                    // updateAuctionStatus(auctionId); // Uncomment this to update status
                }
            };

            const countdownInterval = setInterval(updateCountdown, 1000);
            updateCountdown();
        });

        function updateAuctionStatus(auctionId) {
            $.ajax({
                url: '{{ route("updateAuctionStatus") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    auction_id: auctionId
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Auction status updated successfully.');
                    } else {
                        console.log('Failed to update auction status.');
                    }
                },
                error: function(xhr) {
                    console.log('Error:', xhr.responseText);
                }
            });
        }
    });
</script>

</body>

</html>
