<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Parts</title>
    <link rel="stylesheet" href="/home/css/parts.css">
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
    <div class="form">
        <form action="">
            <input type="text" placeholder="e.g. Toyota Camry Engine">
            <button id="search"><i class="fa fa-search"></i> <span>Search</span></button>
        </form>
    </div>
</header>
<main>
    <div class="auto_part">
        <h3>Popular Auto Parts</h3>
        <h3>Get The Best of Auto Parts Here</h3><br>

        <div class="card_group">
            <div class="card" style="background: url(/home/images/parts/engine.png);">
                <a href="">Engine</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/gear/box.jpg);">
                <a href="">Gear Box</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/lamps.jpg);">
                <a href="">Lamps</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/radiator.png);">
                <a href="">Radiator</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/mirror.png);">
                <a href="">Mirror</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/speedometer.png);">
                <a href="">Speedometer</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/tyre\ and\ rim.png);">
                <a href="">Tyres and Rims</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/breaks.png);">
                <a href="">Breaks</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/compressor.png);">
                <a href="">Compressors</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/fuel.png);">
                <a href="">Fuel</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/battery.png);">
                <a href="">Batteries</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/horn.png);">
                <a href="">Horn</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/exust.png);">
                <a href="">Exhaust</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/kick\ starter.png);">
                <a href="">Kick Starters</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/clutches.png);">
                <a href="">Clutches</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/speedometer.png);">
                <a href="">Speedometer</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/tyre\ and\ rim.png);">
                <a href="">Tyres and Rims</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/breaks.png);">
                <a href="">Breaks</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/compressor.png);">
                <a href="">Compressors</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/fuel.png);">
                <a href="">Fuel</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/battery.png);">
                <a href="">Batteries</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/horn.png);">
                <a href="">Horn</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/exust.png);">
                <a href="">Exhaust</a>
            </div>
            <div class="card" style="background: url(/home/images/parts/kick\ starter.png);">
                <a href="">Kick Starters</a>
            </div>

        </div>
        <a href="" class="more">More Categories</a>

        <div class="product_category">
            <h3>700 Products / 77 Categories</h3>
            <br>
            <div class="wrapper">
                <ul>
                    <li><a href="">Engines (10)</a></li>
                    <li><a href="">Gear Box (30)</a></li>
                    <li><a href="">Lamps (12)</a></li>
                    <li><a href="">Radiators (33)</a></li>
                    <li><a href="">Bumper (23)</a></li>
                    <li><a href="">Windscreens (12)</a></li>
                    <li><a href="">Mirrors (34)</a></li>
                    <li><a href="">Compressors (10)</a></li>
                    <li><a href="">Breaks (10)</a></li>
                    <li><a href="">Tyres & Rims (10)</a></li>
                </ul>
                <ul>
                    <li><a href="">Engines (10)</a></li>
                    <li><a href="">Gear Box (30)</a></li>
                    <li><a href="">Lamps (12)</a></li>
                    <li><a href="">Radiators (33)</a></li>
                    <li><a href="">Bumper (23)</a></li>
                    <li><a href="">Windscreens (12)</a></li>
                    <li><a href="">Mirrors (34)</a></li>
                    <li><a href="">Compressors (10)</a></li>
                    <li><a href="">Breaks (10)</a></li>
                    <li><a href="">Tyres & Rims (10)</a></li>
                </ul>
                <ul>
                    <li><a href="">Engines (10)</a></li>
                    <li><a href="">Gear Box (30)</a></li>
                    <li><a href="">Lamps (12)</a></li>
                    <li><a href="">Radiators (33)</a></li>
                    <li><a href="">Bumper (23)</a></li>
                    <li><a href="">Windscreens (12)</a></li>
                    <li><a href="">Mirrors (34)</a></li>
                    <li><a href="">Compressors (10)</a></li>
                    <li><a href="">Breaks (10)</a></li>
                    <li><a href="">Tyres & Rims (10)</a></li>
                </ul>
                <ul>
                    <li><a href="">Engines (10)</a></li>
                    <li><a href="">Gear Box (30)</a></li>
                    <li><a href="">Lamps (12)</a></li>
                    <li><a href="">Radiators (33)</a></li>
                    <li><a href="">Bumper (23)</a></li>
                    <li><a href="">Windscreens (12)</a></li>
                    <li><a href="">Mirrors (34)</a></li>
                    <li><a href="">Compressors (10)</a></li>
                    <li><a href="">Breaks (10)</a></li>
                    <li><a href="">Tyres & Rims (10)</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>


@include('home.includes.footer')
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
                $(".hero").css("padding-top", "5rem");
            }
        });
    });

</script>
</body>

</html>
