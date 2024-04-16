<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Value Asset</title>
    <link rel="stylesheet" href="/home/css/value.css" />
</head>

<body>
@include('home.includes.nav')
<div class="car_type_nav">
    <ul>
        <li class="option">Menu <i class="fa fa-angle-down"></i></li>
        <li><a href="../index.html">Home</a></li>
        <li><a href="index.html">New Cars</a></li>
        <li><a href="foreignUsed.html">Foreign Used</a></li>
        <li><a href="locallyUsed.html">Locally Used</a></li>
        <li><a href="sell.html">Sell A Car</a></li>
        <li><a href="value.html" class="active">Value My Car</a></li>
        <li><a href="auction.html">Auction</a></li>
        <li><a href="parts.html">Car Parts</a></li>
        <li><a href="stolenCars.html">Stolen Cars</a></li>
        <li><a href="blacklist.html">Blacklist</a></li>
    </ul>
</div>
<header class="hero">
    <h1>Get Your <span>Values Worth</span></h1>
</header>
<!-- ---------------------------- -->
<main>
    <div class="main-nav">
        <h3>Select Car Type</h3>
        <ul>
            <li><a href="#">New</a></li>
            <li><a href="#">Foreign</a></li>
            <li><a href="#">Locally Used</a></li>
        </ul>
    </div>
    <!-- ----------------------------------------------------- -->
    <form action="">
        <h3>Upload Display Image</h3>
        <div class="form-control-file">
            <label for="file">Choose a file</label>
            <input type="file" id="file" />
        </div>
        <h3>Car Information</h3>
        <div class="form-group">
            <div class="form-control">
                <label for="brand">Brand</label>
                <select name="brand" id="brand">
                    <option value="" selected disabled>Enter Car Brand</option>
                </select>
            </div>
            <div class="form-control">
                <label for="model">Model</label>
                <select name="model" id="model">
                    <option value="" selected disabled>Enter Car Model</option>
                </select>
            </div>
            <div class="form-control">
                <label for="color">Color</label>
                <select name="color" id="color">
                    <option value="" selected disabled>Enter Car Color</option>
                </select>
            </div>
            <div class="form-control">
                <label for="mileage">Mileage</label>
                <select name="mileage" id="mileage">
                    <option value="" selected disabled>Enter Car Milwage</option>
                </select>
            </div>
            <div class="form-control">
                <label for="engine">Engine Type</label>
                <select name="engine" id="engine">
                    <option value="" selected disabled>Enter Engine Type</option>
                </select>
            </div>
        </div>
        <h3>More of Car Image</h3>
        <div class="form-control-file">
            <label for="file">
                <i class="fa fa-plus-circle" style="font-size: 20px;"></i><br>
                Add More Images</label>
            <input type="file" id="file" />
        </div>
        <h3>Legal Information</h3>
        <div class="form-group">
            <div class="form-control">
                <label for="tender">Legal Tender</label>
                <div><input type="text" id="tender" placeholder="Legal Tender">
                    <input type="file">
                </div>
            </div>
            <div class="form-control">
                <label for="tender">Legal Tender</label>
                <div><input type="text" id="tender" placeholder="Legal Tender">
                    <input type="file">
                </div>
            </div>
        </div>
        <div class="form-control">
            <label for="">Brand</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div><br><br>
        <div class="form-control agree" style="flex-direction: row; gap: 2px !important;">
            <input type="checkbox" id="agree" style="cursor: pointer;">
            <label for="agree" style="text-decoration: underline; font-weight: bold; font-size: 12px; cursor: pointer;">Agree to Terms and Conditions</label>
        </div>
        <button>Submit</button>
    </form>
</main>

<footer>
    <div class="card_group">
        <div class="card">
            <h6>About</h6>
            <br />
            <p>
                Lorem ipsum dolor sit amet consectetur. Ullamcorper bibendum diam
                sapien faucibus. Dolor in nibh malesuada pharetra aenean eu rhoncus.
                Non tortor sagittis metus vitae nunc. Varius congue faucibus lacus
                pharetra nisl risus. Bibendum integer fringilla id ante fusce varius
                eget.
            </p>
            <br /><br />
            <a href="#!">Learn More</a>
        </div>
        <div class="card">
            <h6>Services</h6>
            <nav class="footer_nav">
                <ul class="">
                    <li><a href="cars/index.html">Cars</a></li>
                    <li><a href="bikes/index.html">Bikes</a></li>
                    <li><a href="trucks/index.html">Trucks</a></li>
                    <li><a href="farm/index.html">Farms</a></li>
                    <li><a href="plants/index.html">Plants</a></li>

                    <li><a href="#!">Valuation</a></li>

                    <li><a href="#!">Blacklist</a></li>
                </ul>
                <ul class="">
                    <li><a href="#!">Privacy Police</a></li>
                    <li><a href="#!">Terms and Conditions</a></li>
                    <li><a href="#!">FAQs</a></li>
                    <li><a href="#!">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <!-- <div class="card">

      </div> -->
        <div class="card">
            <h6>Follow us</h6>
            <div class="socials">
                <a href="#!"><i class="fab fa-facebook"></i></a>
                <a href="#!"><i class="fab fa-square-instagram"></i></a>
                <a href="#!"><i class="fab fa-linkedin"></i></a>
                <a href="#!"><i class="fab fa-square-x-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>

<script src="../js/jquery.js"></script>
<script src="../assets/slick-1.8.1/slick/slick.min.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
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
    });
</script>
</body>
</html>
