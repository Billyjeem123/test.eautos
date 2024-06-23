<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/signUp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

@include('home.includes.nav')


<main>
    <div class="wrapper">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="card">
                <ul>
                    <li>
                        <input type="radio" name="role" value="dealer" id="dealer">
                        <label for="dealer">
                            <span><i class="fa fa-handshake-angle"></i></span>
                            <p>I'm a dealer, here to sell.</p>
                        </label>
                    </li>
                    <li>
                        <input type="radio" name="role" value="service_provider" id="service_provider">
                        <label for="service_provider">
                            <span><i class="fa fa-gears"></i></span>
                            <p>I'm a service provider.</p>
                        </label>
                    </li>
                    <li>
                        <input type="radio" name="role" value="buyer" id="buyer">
                        <label for="buyer">
                            <span><i class="fa fa-cart-arrow-down"></i></span>
                            <p>I'm here to buy or get service provider.</p>
                        </label>
                    </li>
                </ul>
                <button type="submit">Create Account</button><br>
                <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
            </div>
        </form>
    </div>
</main>



@include('home.includes.footer')
