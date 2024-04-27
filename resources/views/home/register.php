<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CARS</title>
    <link rel="stylesheet" href="/home/css/signUp.css">
    <link rel="stylesheet" href="/home/assets/fontawesome/css/all.min.css">
</head>

<body>

@include('home.includes.nav')

<main>
    <div class="wrapper">
        <form action="">
            <div class="card">
                <ul>
                    <li>
                        <input type="radio">
                        <span><i class="fa fa-handshake-angle"></i></span>
                        <p>I'm a dealer, here to sell.</p>
                    </li>
                    <li>
                        <input type="radio">
                        <span><i class="fa fa-gears"></i></span>
                        <p>I'm a service provider.</p>
                    </li>
                    <li>
                        <input type="radio">
                        <span><i class="fa fa-cart-arrow-down"></i></span>
                        <p>I'm here to buy or get service provider.</p>
                    </li>
                </ul>
                <button>Create Account</button><br>
                <p>Already have an account? <a href="login.html">Log In</a></p>
            </div>
        </form>
    </div>

</main>


@include('home.includes.footer')
