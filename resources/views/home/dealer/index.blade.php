<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealers</title>
    <link rel="stylesheet" href="/home/css/dealers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
@include('home.includes.nav')
<header class="hero">
    <div class="card_group">
        <div class="card">
            <h3>Connect With Dealers</h3><br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, deserunt nam porro voluptatibus quis harum ex
                vero nisi officia nostrum inventore earum debitis nulla fugit corrupti error expedita magni similique? Lorem
                ipsum dolor sit, amet consectetur adipisicing elit. Iure, dolore?</p>
        </div>
        <div class="card">
            <img src="/images/ellipses/red hand.png" alt="">
        </div>
    </div>
    <div class="form">
        <form action="">
            <select name="" id="location">
                <option value="" selected disabled>Location</option>
            </select>
            <select name="" id="category">
                <option value="" selected disabled>Category</option>
            </select>
            <button><i class="fa fa-search"></i> <span>Search</span></button>
        </form>
    </div>
</header>
<main>
    <div class="card_group">
        <div class="card left">
            <h4>Car Dealers</h4>
            <form action="">
                @foreach($allDealers as $dealer)
                    <span class="form_control">
                    <input type="radio" id="" placeholder="">
                    <label for="">{{ $dealer->name }}</label>
                    <small>{{ $carCounts[$dealer->id] }} Cars</small> <!-- Display car count using the carCounts array -->
                </span>
                @endforeach
            </form>
        </div>
        <!-- ---- -->
        <div class="card right">
            <ul>
                @foreach($allDealers as $dealer)
                    <li>
                        <div class="card_img" style="background: url('{{ !empty($dealer->image) ? $dealer->image : '/images/profile.svg' }}') no-repeat;"></div>
                        <div class="details">
                            <h5>{{ $dealer->name }}</h5>
                            <p>{{ $carCounts[$dealer->id] }} Cars</p> <!-- Display car count using the carCounts array -->
                            <a href="{{route('user.profile', $dealer->id)}}">Connect</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


</main>


<footer>
    <div class="card_group">
        <div class="card">
            <h6>About</h6><br>
            <p>Lorem ipsum dolor sit amet consectetur. Ullamcorper bibendum diam sapien faucibus. Dolor in nibh malesuada
                pharetra aenean eu rhoncus. Non tortor sagittis metus vitae nunc. Varius congue faucibus lacus pharetra nisl
                risus. Bibendum integer fringilla id ante fusce varius eget.</p><br><br>
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

<script src="assets/fontawesome/js/all.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/index.js"></script>
</body>

</html>
