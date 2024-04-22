<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sell Car</title>
    <link rel="stylesheet" href="/home/css/sell.css" />
    <link rel="stylesheet" href="/home/assets/fontawesome/css/all.min.css" />
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
<header class="hero"></header>
<main>
    <ul class="plan-group">
        <li class="plan">
            <h4 class="plan-type">BASIC</h4>
            <p class="message">
                For all Indidviduals and starters who wants to start with domaining.
            </p>
            <br />
            <hr />
            <br />
            <h1 class="price">
                $19 <br />
                <small>Per member, per Month</small>
            </h1>
            <br />
            <hr />
            <br />
            <div class="features">
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Access to All Features</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>1K lookups / per Month</span>
                </p>
                <p>
                    <i class="fa fa-circle-xmark" style="color: red !important"
                    >&nbsp;</i
                    >
                    <span>No API Credits</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>10 Monitoring Quota</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>60 Minutes Monitoring Level</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>20% Discount on Backorders</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Domain Name Appraisal <small>coming soon</small></span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Ip Monitoring <small>coming soon</small></span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Backlink Monitoring <small>coming soon</small></span>
                </p>
            </div>
            <a href="#">Start free 14-day Trial</a>
            <small style="text-align: center">No credit card required</small>
        </li>
        <!-- ---------------------- -->
        <li class="plan popular">
            <p
                style="
              background-color: #a9b2ff;
              color: #000b6b;
              width: fit-content;
              padding: 3px 10px;
              border-radius: 3px;
            "
            >
                Popular
            </p>
            <h4 class="plan-type">PROFESSIONAL</h4>
            <p class="message">
                For professional domain names investors with a big portfolio.
            </p>
            <br />
            <hr />
            <br />
            <h1 class="price">
                $49 <br />
                <small>Per member, per Month</small>
            </h1>
            <br />
            <hr />
            <br />
            <div class="features">
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Access to All Features</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>1K lookups / per Month</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>30K API Credits / Month</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>10 Monitoring Quota</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>60 Minutes Monitoring Level</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>20% Discount on Backorders</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Domain Name Appraisal <small>coming soon</small></span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Ip Monitoring <small>coming soon</small></span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Backlink Monitoring <small>coming soon</small></span>
                </p>
            </div>
            <a href="#">Start free 14-day Trial</a>
            <small style="text-align: center; color: #ffffff92"
            >No credit card required</small
            >
        </li>
        <!-- ---------------------- -->
        <li class="plan">
            <h4 class="plan-type">ADVANCED</h4>
            <p class="message">
                For businessess, enterprise domain registrars and registries .
            </p>
            <br />
            <hr />
            <br />
            <h1 class="price">
                $99 <br />
                <small>Per member, per Month</small>
            </h1>
            <br />
            <hr />
            <br />
            <div class="features">
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Access to All Features</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>1K lookups / per Month</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>30K API Credits / Month</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>10 Monitoring Quota</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>60 Minutes Monitoring Level</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>20% Discount on Backorders</span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Domain Name Appraisal <small>coming soon</small></span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Ip Monitoring <small>coming soon</small></span>
                </p>
                <p>
                    <i class="fa fa-check-circle">&nbsp;</i>
                    <span>Backlink Monitoring <small>coming soon</small></span>
                </p>
            </div>
            <a href="#">Start free 14-day Trial</a>
            <small style="text-align: center">No credit card required</small>
        </li>
        <!-- ---------------------- -->
    </ul>
    <div class="free-plan">
        <h1>Try our 100% free Plan</h1>
        <div>
            <p>
                Get started with our free plan and make 10 lookups per month
                absolutely free!
            </p>
            <a href="#">Signup for Free</a>
        </div>
    </div>
    <div class="payment">
        <h3>Payment Methods</h3>
        <img src="/home/images/payment.png" alt="" />
        <small>We Visa, American Express, Mastercard, Paypal and Crypto</small>
    </div>
</main>
<!-- ------------------------------------ -->
<!-- ------------------------------------ -->
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
