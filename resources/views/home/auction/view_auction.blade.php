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
            <a href="{{ route('get.auction.cars.id', $auction->id) }}" class="{{ request()->routeIs('get.auction.cars.id', $auction->id) ? 'active' : '' }}">Auction</a>
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
                <!-- Main image (first image in the list or a placeholder if none exist) -->
                <img src="{{ $auction->images[0]->image ?? '/path/to/placeholder-image.png' }}" class="main-image" width="100%" alt="">

                <!-- Navigation images -->
                <div class="image-nav">
                    @foreach($auction->images as $image)
                        <img src="{{ $image->image }}" alt="alt">
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card">
            <h4>{{$auction->model}}</h4>
            <p>
                <span>Time Left</span>
                <strong> {{$auction->countdown['days']}}days {{$auction->countdown['hours']}}hr {{$auction->countdown['minutes']}}min(s)</strong>
                <strong>{{$currentDateTime}}</strong>
            </p>
            <p>
                <span>Maximum Bid</span>
                <strong>₦ {{number_format($highestBid,2 )}}</strong>
                <span>Minimum Bid</span>
                <strong>₦ {{ number_format($MinimumBid, 2) }} </strong>
            </p>
            <p>
                <span>Ongoing Bids</span>
                <strong>{{$totalBids}} Bids</strong>
            </p>

            <div class="description">
                <h4>Description</h4><br>
                <p>{{$auction->desc}}</p>
                <p style="display: flex; margin-top: 1rem;">
                    @auth
                        <a href="#" class="bidButton">Place a Bid</a>
                    @else
                        <a href="{{ route('login') }}" class="">Login to continue</a>
                    @endauth



                    <a href=""><i class="far fa-heart"></i>&nbsp; Add to Watchlist</a>
                </p>
            </div>
        </div>
    </div>

    <div class="bid-modal">
        <div class="bid">
            <div class="close-modal">X</div>
            <div class="time">
                <p><strong>Days</strong><br><span>{{$auction->countdown['days']}}</span></p>
                <p><strong>Hours</strong><br><span>{{$auction->countdown['hours']}}</span></p>
                <p><strong>Minutes</strong><br><span>{{$auction->countdown['minutes']}}</span></p>


            </div>
            <form method="POST" action="{{ route('bid_auction') }}">
                @csrf
                <label for="formattedBid">Enter Your Bid</label>
                <input type="text" id="formattedBid" placeholder="₦" oninput="formatBid()">
                <input type="hidden" id="amountToBid" name="amount_to_bid">
                <input type="hidden" value="{{ $auction->id }}" name="auction_id">

                <div class="bid-price">
                    <p>Min N {{ number_format($MinimumBid, 2) }}</p>
                    <p><span style="padding: 5px 10px; border: 1px solid #000000; border-radius: 5px; margin-right: 5px;">Current
            Bid</span>Max N {{ number_format($highestBid, 2) }}</p>
                    <p>{{ $totalBids }} Bids</p>
                </div>
                <button type="submit">Place a Bid</button>
            </form>



                        <p style="display: flex; justify-content: center; align-items: center; flex-wrap: nowrap;">
                <span style="border: 1px solid #707070a3; width: 100%;"></span> or
                <span style="border: 1px solid #707070a3; width: 100%;"></span>
            </p>
            <ul>
                <li class="bid-amount" data-amount="100000">N 100,000</li>
                <li class="bid-amount" data-amount="500000">N 500,000</li>
                <li class="bid-amount" data-amount="1000000">N 1,000,000</li>
                <li class="bid-amount" data-amount="5000000">N 5,000,000</li>
            </ul>
        </div>
    </div>
</header>
<script>
    function formatBid() {
        const formattedBidInput = document.getElementById('formattedBid');
        const amountToBidInput = document.getElementById('amountToBid');

        // Remove any non-numeric characters except the decimal point
        const value = formattedBidInput.value.replace(/[^0-9.]/g, '');

        // Format the number with commas
        const formattedValue = new Intl.NumberFormat().format(value);

        // Set the formatted value in the text input
        formattedBidInput.value = formattedValue;

        // Set the raw numeric value in the hidden input
        amountToBidInput.value = value;
    }

    document.querySelectorAll('.bid-amount').forEach(item => {
        item.addEventListener('click', function() {
            const amount = this.getAttribute('data-amount');

            // Set the formatted value in the text input
            const formattedValue = new Intl.NumberFormat().format(amount);
            document.getElementById('formattedBid').value = formattedValue;

            // Set the raw numeric value in the hidden input
            document.getElementById('amountToBid').value = amount;
        });
    });
</script>
<!-- ---------------------------- -->
<main>
    <div class="table">
        <h3>Farm Details</h3>
        <table>
            <tr>
                <th>Property Type</th>
                <td>{{$auction->categories->catname}}</td>
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
                <th>C of O</th>
                <td>{{ $auction->car_docs === 1 ? "YES" : "NO" }}</td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Engine Type</th>
                <td>{{ $auction->cylinder}}</td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Color</th>
                <td>{{ $auction->model }}</td>
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
                <td>{{ $auction->created_at->diffForHumans() }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Location</th>
                <td>{{ $auction->address }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Number of Views</th>
                <td>{{ $auction->views }}</td>
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
