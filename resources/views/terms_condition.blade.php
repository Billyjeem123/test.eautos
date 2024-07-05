<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/terms.css">
    <!--<link rel="stylesheet" href="/home/css/scrapy-yard.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Inter", sans-serif;
    }
    .hero{
        width: 100%;
        min-height: 60vh;
        background: url(https://images.unsplash.com/photo-1563906267088-b029e7101114?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YWJvdXQlMjB1c3xlbnwwfHwwfHx8MA%3D%3D) no-repeat;
        background-position: center;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .hero h1{
        color: #fff;
    }
    main{
        padding: 1rem;
    }
    main div{
        padding: 10px;
    }
    main h2{
        text-align: center;
    }
    .about div{
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }
    .about p{
        width: 45%;
        display: block;
    }
    .img{
        display: block;
        width: 45%;
        height: 150px;
        background: url(https://images.unsplash.com/photo-1455849318743-b2233052fcff?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D) no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>
<body>
@include('home.includes.nav')
<header class="hero">
    <div class="">
        <h1>About E-Autos</h1>
    </div>

</header>
<main>
    <div class="about">
        <div>
            <p><strong style="text-align: center; font-size: 20px; width: 100%; display: flex; justify-content: center; margin: 10px 0">About Us <br></strong>
                Welcome to E-Autos, your ultimate destination for all things automotive. Whether you're in the market for a car, bike, truck, or any vehicle-related parts
                and accessories, E-Autos is your one-stop shop. We pride ourselves on offering a vast selection, competitive prices, and exceptional customer service to ensure
                you find exactly what you need.</p>
            <!--<img src="https://images.unsplash.com/photo-1455849318743-b2233052fcff?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" width="50%" style="border: 1px solid #000;" />-->
            <span class="img"></span>
        </div>
    </div>
    <div class="">
        <h2>Who We Are</h2><br>
        <p>E-Autos is a team of passionate automotive enthusiasts, experienced professionals, and dedicated customer service representatives.
            Our collective expertise spans decades in the automotive industry, from vehicle sales to parts and service. We are committed to providing a
            seamless and satisfying shopping experience for our customers.</p>
    </div>
    <div class="">
        <h2>Our Mission</h2><br>
        <p>Our mission at E-Autos is to simplify your search for vehicles and vehicle parts by providing a comprehensive, user-friendly platform.
            We aim to be the go-to resource for automotive needs, ensuring our customers have access to the best products and information available.
            We strive to create a community where automotive enthusiasts and everyday drivers alike can find everything they need under one roof.</p>
    </div>
    <div class="">
        <h2>What We Offer</h2><br>
        <ul>
            <li><strong>Wide Range of Vehicles: </strong>From compact cars and family SUVs to powerful motorcycles and heavy-duty trucks,
                we offer an extensive inventory to suit all preferences and budgets. Our selection features new and pre-owned vehicles from trusted manufacturers,
                ensuring quality and reliability.</li>
        </ul>
    </div>
</main>
