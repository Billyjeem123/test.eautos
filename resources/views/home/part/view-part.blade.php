<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Part Details</title>
    <link rel="stylesheet" href="/home/css/partDetails.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <style>
        .comment-section {
            margin-top: 20px;
        }

        .comment-section h4 {
            margin-bottom: 10px;
        }

        .comment-section textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            margin-bottom: 10px;
        }

        .comment-section button {
            background-color: #394293;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .comment-section button:hover {
            background-color: #0056b3;
        }

    </style>


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
                    <p>
                        <span><i class="fa fa-phone"></i></span>&nbsp;&nbsp;
                        <a href="tel:{{ preg_replace('/\s+/', '', $part->users->phone) }}">{{ $part->users->phone }}</a>
                    </p>

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


{{--    <div class="other-option">--}}
{{--        <h3><span>Other {{$part->partcategories->part_category}} Options</span> <a href="#">See more</a></h3>--}}
{{--        <div class="card-group">--}}

{{--            <div class="card">--}}
{{--                <div--}}
{{--                    class="card-image"--}}
{{--                    style="background: url(/images/parts/Rectangle\ 17\ \(8\).png)"--}}
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
{{--                    <a href="javascript:void(0)">View</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- ------------------------------------------- -->
    <!-- ----------------------------------------- -->
    <div class="reviews container">
        <h3>Reviews</h3>
        <div class="card_group">
            @forelse ($reviews as $comment)
                <div class="card">
                    <div class="card_header">
                        <strong>{{ substr($comment->user->name, 0, 1) }}
                        </strong>
                        <small>{{$comment->user->name}}</small>
                    </div>
                    <p>{{$comment->comment}}</p>
                </div>

            @empty
                <div class="card" style="text-align: center;" >
                    <p>No reviews available at the moment.</p>
                </div>
            @endforelse

        </div>

        <!-- Add a textarea for commenting -->
        <div class="comment-section">
            <h4>Leave a Review</h4>
            <form action="{{route('part.comment.review')}}" method="post" >
                @csrf
                <input type="hidden" name="part_id" value="{{$part->id}}">
                <textarea name="comment" id="comment" placeholder="Write your review  here..." rows="4" required></textarea>
                <button type="submit">Post Comment</button>
            </form>

        </div>

    </div>




    <!-- ----------------------------------- -->
</main>


@include('home.includes.footer')

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
