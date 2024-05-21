<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrapy Yard</title>
    <link rel="stylesheet" href="/home/css/scrapy-yard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
@include('home.includes.nav')
<header class="hero">
    <div class="">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit vitae est nobis voluptatum accusamus officia
            inventore doloremque modi cum consequatur, quisquam illo at nisi commodi blanditiis natus tenetur totam
            architecto. Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo magnam molestias ab facere. Error
            debitis omnis non commodi? Inventore, dolores?</p>
    </div>

</header>
<main>
    <div class="about">
        <h2>About</h2><br>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat beatae vero earum amet aspernatur libero
            necessitatibus, illo accusantium quasi? Eligendi quo reprehenderit quia accusantium doloremque nulla non dolor a
            distinctio molestiae asperiores perspiciatis voluptates, quasi rem, deserunt ex, labore illo modi debitis
            delectus neque fuga. Et dolores error, harum placeat deserunt officiis voluptate quisquam at voluptas! Magni
            iusto ullam corporis dolorem aperiam velit quas tenetur impedit, perspiciatis id deleniti repellat omnis earum
            ipsam ut laboriosam esse pariatur illum exercitationem doloremque totam veniam. Voluptate accusantium dolor,
            tempora cum, numquam similique nesciunt temporibus cupiditate ad voluptatem odio incidunt, quos minima odit
            quibusdam.</p>


        @if(Auth::check())
            <a href="{{ route('users.parts') }}">Buy And Sell Your Scrap Here</a>
        @else
            <a href="{{ route('login') }}">Login to continue</a>
        @endif

    </div>
</main>


@include('home.includes.footer')
