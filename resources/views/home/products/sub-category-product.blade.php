<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/cars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            <h3>Our Latest {{ Str::singular($categoryName) }}</h3>

            <div class="card_group">

                @forelse ($products as $product)
                    <div class="card">
                        <a href="{{ route('product.show', $product->id) }}" class="card_link">
                            <div class="card_img" style="background: url('{{ $product->images[0]['image'] }}') no-repeat;"></div>
                        </a>
                        <div class="card_text">
                            <h5>{{ $product->car_name }}</h5>
                            <small><em>Posted by: {{ $product->user->name }} - Posted {{ $product->created_at->diffForHumans() }}</em></small>
                            {{-- <small><em>Posted by: {{ $product->user->name }} - Joined {{ $product->user->created_at->diffForHumans() }}</em></small> --}}
                            <div class="details">
                                <ul>
                                    <li>{{ $sub_category_name }}</li>
                                    <li>{{ $product->cylinder }}</li>
                                    <li style="background-color: {{ $product->color }}; border: 1px solid; color: #000;">{{ $product->color }}</li>
                                    <li>Fuel</li>
                                </ul>
                                <h5>₦ {{ number_format($product->price, 2) }}</h5>
                                <p>{{ $product->location }} ({{ $product->mileage }})</p>
                            </div>
                        </div>
                        <div class="card_footer">
                            <!--<h6>Compare</h6>-->
                            <!--<a href="#" style="padding: 8px 20px;-->
                            <!--background: #d3d3d3; text-decoration: none;-->
                            <!--color: #000; border-radius: 5px; font-size: 13px; font-weight: bold;">Compare</a>-->
                            <span>
                <!--<i class="fa-regular fa-heart"></i>-->
{{--                <i class="fa fa-share"></i>--}}

                           </span>
                        </div>
                    </div>
                @empty
                    <p>No products available.</p>
                @endforelse








            </div>
        </div>
    </section>
    <!-- ---------------------------------- -->
    <!-- ---------------------------------- -->
    <div class="verification">
        <div class="card_group">
            <div class="card">
                <p>Land Verification, <br> Regularization on E-Property</p>
                <a href="">Read More</a>
            </div>
            <div class="card"></div>
        </div>
    </div>
    <!-- ----------------------------------- -->
    <!-- ----------------------------------- -->

    <div class="car_dealers container">
        <h3>Dealers Near You</h3>
        <div class="card_group">

            @foreach($getDealers as $dealer)
                <div class="card">
                    {{--                    <div class="card_img" style="background: url('/home/images/brands/Optimized-taras-chernus--Y8-NNDqiRM-unsplash.jpg') no-repeat;"></div>--}}
                    <div class="card_img" style="background: url('{{ !empty($dealer->image) ? $dealer->image : '/images/profile.svg' }}') no-repeat;"></div>
                    <div class="details">
                        <h5>{{ $dealer->name}}</h5>
                        <span><strong>100%</strong> Verified</span>
                        <p class="progress"><i class="fa fa-check"></i></p>
                    </div>
                </div>
            @endforeach



        </div>

    </div>
    <!-- --------------------------------------------- -->
    <!-- MEET DEALERS -->
    <!-- --------------------------------------------- -->
    <div class="meet_dealers">
        <ul class="card_group">
            <li class="card"><a href="{{route('dealers.all')}}">Car Dealers</a></li>
            <li class="card">
                <p>Meet with Different Car Dealers, who will help get your desired property, with little to no agent fee added
                </p>
            </li>
            <li class="card"><img src="/home/images/Rectangle 247.png" alt=""></li>
        </ul>
    </div>
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
                    top: "inherit",
                });
                $(".hero").css("padding-top", "5rem");
            }
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
