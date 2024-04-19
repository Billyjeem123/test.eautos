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

<div class="car_type_nav">
    <ul>
        <li class="option">Menu <i class="fa fa-angle-down"></i></li>
        <li><a href="{{route('index')}}">Home</a></li>
        @foreach($subcategories as $subcategory)
            <li><a href="{{route('get.sub.product', urlencode($subcategory))}}" class="{{ $sub_category_name == $subcategory ? 'active' : '' }}"  >{{$subcategory}}</a></li>
        @endforeach

        <li><a href="sell.html">Sell A {{ Str::singular($categoryName) }}</a></li>
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
            <h3>Our Latest {{ Str::singular($categoryName) }}</h3>

            <div class="card_group">

                @foreach ($products as $product)
                    <div class="card">
                        <a href="{{route('product.show', $product->id)}}" class="card_link">
                            <div class="card_img" style="background: url('{{ $product->images[0]['image'] }}') no-repeat;"></div>
                        </a>
                        <div class="card_text">
                            <h5>{{ $product->car_name }}</h5>
                            <small><em>Posted by: {{ $product->user->name }} - Posted  {{ $product->created_at->diffForHumans() }}</em></small>
{{--                            <small><em>Posted by: {{ $product->user->name }} - Joined {{ $product->user->created_at->diffForHumans() }}</em></small>--}}
                            <div class="details">
                                <ul>
                                    <li>{{ $sub_category_name }}</li>
                                    <li>{{ $product->cylinder }}</li>
                                    <li style="background-color: {{ $product->color }}; border: none; color: #ffffff;">{{ $product->color }}</li>
                                    <li>Fuel</li>
                                </ul>
                                <h5>₦ {{ number_format($product->price, 2) }}</h5>
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
                    <div class="card_img" style="background: url('/home/images/brands/Optimized-taras-chernus--Y8-NNDqiRM-unsplash.jpg') no-repeat;"></div>
                    <div class="details">
                        <h5>{{ $dealer}}</h5>
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
            <li class="card"><a href="../dealers.html">Car Dealers</a></li>
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
                    top: "normal",
                });
            }
        });
    });

</script>
</body>

</html>
