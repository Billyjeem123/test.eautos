<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stoloen Cars</title>
    <link rel="stylesheet" href="/home/css/stolenCars.css">
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
            <a href="{{ route('stolen') }}" class="{{ request()->routeIs('stolen') ? 'active' : '' }}">Stolen cars</a>
        </li>


        <li>
            <a href="{{ route('blacklist') }}" class="{{ request()->routeIs('blacklist') ? 'active' : '' }}">BlackList</a>
        </li>
    </ul>
</div>


<header class="hero">
    <div class="form_control">
        <form action="">
            <h3>Search For Stolen Cars</h3>
            <div class="form_group">
                <div class="form_card">
                    <label for="category"><i class="fa fa-angle-down"></i></label>
                    <select name="category" id="category">
                        <option value="" selected disabled>Enter Category</option>
                        <option value="">Toyota</option>
                        <option value="">Benz</option>
                        <option value="">Lexus</option>
                    </select>
                </div>
                <div class="form_card">
                    <label for="specialty"><i class="fa fa-angle-down"></i></label>
                    <select name="specialty" id="specialty">
                        <option value="" selected disabled>Enter Specialty</option>
                        <option value="">C-class</option>
                        <option value="">E-class</option>
                        <option value="">AMG</option>
                    </select>
                </div>
                <div class="form_card">
                    <label for="location"><i class="fa fa-angle-down"></i></label>
                    <select name="location" id="location">
                        <option value="" selected disabled>Enter Location</option>
                        <option value="">Lagos</option>
                        <option value="">Ibadan</option>
                        <option value="">Abuja</option>
                    </select>
                </div>
            </div>
            <button>Search</button>
        </form>
    </div>
</header>
<main>

    <!-- ---------------------------------- -->
    <div class="stolen container">
        <h3>Stolen Cars</h3>
        <div class="card_group">
            <div class="card">
                <div class="card_img" style="background: url(/home/images/cars/blue\ car.png) no-repeat;"></div>
                <div class="card_text">
                    <h4>Mercedes Benz</h4>
                    <h5>Plate Number: ADC1223DD</h5>
                    <h6>Date Reported: 21-11-2023</h6>
                    <h6>Reported by: Mr Tobi (081234574330)</h6>
                    <h6>Reported at: 24 Iyaila street police station</h6>
                    <h6>Color: Blue</h6>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/cars/blue\ car.png) no-repeat;"></div>
                <div class="card_text">
                    <h4>Mercedes Benz</h4>
                    <h5>Plate Number: ADC1223DD</h5>
                    <h6>Date Reported: 21-11-2023</h6>
                    <h6>Reported by: Mr Tobi (081234574330)</h6>
                    <h6>Reported at: 24 Iyaila street police station</h6>
                    <h6>Color: Blue</h6>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/cars/blue\ car.png) no-repeat;"></div>
                <div class="card_text">
                    <h4>Mercedes Benz</h4>
                    <h5>Plate Number: ADC1223DD</h5>
                    <h6>Date Reported: 21-11-2023</h6>
                    <h6>Reported by: Mr Tobi (081234574330)</h6>
                    <h6>Reported at: 24 Iyaila street police station</h6>
                    <h6>Color: Blue</h6>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/cars/blue\ car.png) no-repeat;"></div>
                <div class="card_text">
                    <h4>Mercedes Benz</h4>
                    <h5>Plate Number: ADC1223DD</h5>
                    <h6>Date Reported: 21-11-2023</h6>
                    <h6>Reported by: Mr Tobi (081234574330)</h6>
                    <h6>Reported at: 24 Iyaila street police station</h6>
                    <h6>Color: Blue</h6>
                </div>
            </div>
        </div>
        <br>
        <h3>Recovered Cars</h3>
        <div class="card_group">
            <div class="card">
                <div class="card_img" style="background: url(/home/images/cars/blue\ car.png) no-repeat;"></div>
                <div class="card_text">
                    <h4>Mercedes Benz</h4>
                    <h5>Plate Number: ADC1223DD</h5>
                    <h6>Date Recovered: 21-11-2023</h6>
                    <h6>Recovered by: Mr Tobi (081234574330)</h6>
                    <h6>Recovered at: 24 Iyaila street police station</h6>
                    <h6>Color: Blue</h6>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/cars/blue\ car.png) no-repeat;"></div>
                <div class="card_text">
                    <h4>Mercedes Benz</h4>
                    <h5>Plate Number: ADC1223DD</h5>
                    <h6>Date Recovered: 21-11-2023</h6>
                    <h6>Recovered by: Mr Tobi (081234574330)</h6>
                    <h6>Recovered at: 24 Iyaila street police station</h6>
                    <h6>Color: Blue</h6>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/cars/blue\ car.png) no-repeat;"></div>
                <div class="card_text">
                    <h4>Mercedes Benz</h4>
                    <h5>Plate Number: ADC1223DD</h5>
                    <h6>Date Recovered: 21-11-2023</h6>
                    <h6>Recovered by: Mr Tobi (081234574330)</h6>
                    <h6>Recovered at: 24 Iyaila street police station</h6>
                    <h6>Color: Blue</h6>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/cars/blue\ car.png) no-repeat;"></div>
                <div class="card_text">
                    <h4>Mercedes Benz</h4>
                    <h5>Plate Number: ADC1223DD</h5>
                    <h6>Date Recovered: 21-11-2023</h6>
                    <h6>Recovered by: Mr Tobi (081234574330)</h6>
                    <h6>Recovered at: 24 Iyaila street police station</h6>
                    <h6>Color: Blue</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------- -->

    <div class="groups container">
        <h3><span>Groups you may like</span> <a href="../groupMembers.html" target="_blank">See more</a></h3>
        <div class="card_group">
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
        </div>
        <!-- ---------------------------------- -->


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
</body>

</html>
