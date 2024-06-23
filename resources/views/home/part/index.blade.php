<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Parts</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/viewParts.css" />
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
    <div class="form">
        <form action="{{ route('part.search') }}" method="POST">
            @csrf
            <input type="text" name="search" placeholder="e.g. Toyota Camry Engine" />
            <button id="search" type="submit">
                <i class="fa fa-search"></i> <span>Search</span>
            </button>
        </form>
    </div>
    <a id="backButton"><i class="fa fa-angle-left"></i> - Go back</a>
</header>
<main>
    <ul class="part-nav">
            @forelse ($partCategories as $partcategory)
                <li><a href="">{{ $partcategory->part_category }}</a></li>
            @empty
                <!-- This will be displayed if $partcategories is empty -->
                <p>Category not available at the moment</p>
            @endforelse
    </ul>
    <!-- --------- -->
    <section>
        <aside class="aside1">
            <h3>Materials</h3>
            <form id="searchForm" action="" method="GET">
                <div class="form-group">
                    <input type="text" name="keyword" placeholder="Search Tools" />
                    <button type="submit">Search</button>
                </div>
                <div class="form-check-group">
                    @forelse ($partCategories as $partcategory)
                        <div class="form-control">
                            <input type="radio" name="category" id="category{{ $loop->index }}" value="{{ $partcategory->id }}" onchange="document.getElementById('searchForm').submit();" />
                            <label for="category{{ $loop->index }}">{{ $partcategory->part_category }}</label>
                        </div>
                    @empty
                        <!-- This will be displayed if $partCategories is empty -->
                        <p>Category not available at the moment</p>
                    @endforelse
                </div>
            </form>

        </aside>
        <aside class="aside2">
            <h3><span>Car Part</span> <a href="#">See more</a></h3>
            <div class="card-group">

               @foreach($parts as $part)
                    <div class="card">
                        <div
                            class="card-image"
                            style="background: url('{{ $part->image }}');
                             background-position: center !important;
    background-size: cover !important;
                            "
                        >
                            <span><i class="far fa-heart"></i></span>
                        </div>
                        <div class="details">
                            <h5>{{$part->partcategories->part_category}}</h5>
                            <p>
                                <span>₦ {{ number_format($part->price,2) }}</span>
                                <span>&dollar; 200,000</span>
                                <span>&pound; 180,000</span>
                            </p>
                            <strong><i class="fa fa-location-dot"></i>&nbsp; {{$part->location}}</strong>
                        </div>
                        <div class="card-footer">
                            <p>
                                <span><i class="fa fa-check"></i></span> Verified
                            </p>
                            <a href="{{route('view.parts', $part->id)}}">View</a>
                        </div>
                    </div>
               @endforeach
            </div>
        </aside>




    </section>
{{--    <div class="stores">--}}
{{--        <div class="store-wrapper">--}}
{{--            <h3>See Stores</h3>--}}
{{--            <p>Buy your building materials from stores around you!</p>--}}
{{--            <a href="#">See Stores</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="arrival">--}}
{{--        <h3><span>New Arrivals</span> <a href="#">See more</a></h3>--}}
{{--        <div class="card-group">--}}

{{--            <div class="card">--}}
{{--                <div--}}
{{--                    class="card-image"--}}
{{--                    style="background: url(images/parts/Rectangle\ 17.jpg)"--}}
{{--                >--}}
{{--                    <span><i class="far fa-heart"></i></span>--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h4>Cart Parts</h4>--}}
{{--                    <p>--}}
{{--                        <span>₦ 20,000</span>--}}
{{--                        <span>&dollar; 200,000</span>--}}
{{--                        <span>&pound; 180,000</span>--}}
{{--                    </p>--}}
{{--                    <strong><i class="fa fa-location-dot"></i>&nbsp; Lagos</strong>--}}
{{--                </div>--}}
{{--                <div class="card-footer">--}}
{{--                    <p>--}}
{{--                        <span><i class="fa fa-check"></i></span> Verified--}}
{{--                    </p>--}}
{{--    <!-- ----------------------------------- -->--}}
{{--    <div class="car_dealers">--}}
{{--        <h3>Connect with Car Dealers</h3>--}}
{{--        <div class="card_group">--}}
{{--            <div class="card">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(images/brands/Optimized-alen-kajtezovic-iI9Mf9g_9gY-unsplash.jpg) no-repeat;"></div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Perillo BMW</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(images/brands/Optimized-clem-onojeghuo-NlaQS1em2Pk-unsplash.jpg) no-repeat;">--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Mechino Mottors</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(images/brands/Optimized-ivan-didenko-n6jgA_FbDOE-unsplash.jpg) no-repeat;">--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Porsche Downtown</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(images/brands/Optimized-krish-parmar-QsnLLIHwY8Y-unsplash.jpg) no-repeat;">--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Perillo BMW</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(images/brands/Optimized-taras-chernus--Y8-NNDqiRM-unsplash.jpg) no-repeat;">--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Perillo BMW</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
</main>

@include('home.includes.footer')

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
              //-------------------------------------------
         $("#backButton").click(function() {
    history.go(-1);
  });
    });
</script>


</body>
</html>
