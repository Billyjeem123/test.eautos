<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CARS</title>
    <link rel="stylesheet" href="/home/css/auction.css">
    <link rel="stylesheet" href="/home/assets/fontawesome/css/all.css">
</head>

<body>
@include('home.includes.nav')


<div class="car_type_nav">
    <ul>
        <li class="option">Menu <i class="fa fa-angle-down"></i></li>
        <li><a href="{{route('index')}}">Home</a></li>
        @foreach($subcategories as $subcategory)
            <li><a href="{{route('get.sub.product', urlencode($subcategory))}}" class="{{ $categoryName == $subcategory ? 'active' : '' }}"  >{{$subcategory}}</a></li>
        @endforeach

        <li><a href="">Sell A {{ Str::singular($categoryName) }}</a></li>
        <li><a href="">Value My {{ Str::singular($categoryName) }}</a></li>
        <li><a href="auction.html">Auction</a></li>
        <li><a href="parts.html">{{ Str::singular($categoryName) }} Parts</a></li>
        <li><a href="stolenCars.html">Stolen {{ Str::singular($categoryName) }}</a></li>
        <li><a href="blacklist.html">Blacklist</a></li>
    </ul>
</div>
<header class="hero">
    <div class="search">
        <h2>INVEST WITH SUCCESS BUY FROM <br> E-Autos.COM</h2>
        <h6>Exclusive Car Listing From The Nation's Leading Car Management</h6><br>
        <form action="">
            <input type="text" placeholder="Enter a Model or Brand">
            <button id="search"><i class="fa fa-search"></i></button>
        </form>
    </div>
</header>
<main>
    <div class="live_auction">
        <h3>Live Auction</h3><br>
        <p class="welcome_message">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda vero aliquam
            tempore at vitae alias enim
            animi deleniti ducimus dicta.</p><br>
        <div class="card_group">
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img"
                     style="background: url(images/vans/Optimized-peter-thomas-lTwogC-C9OA-unsplash.jpg) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: blue; border: none; color: #ffffff;">Blue</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                    <a href="" class="footer_button">Place a bid</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16a.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: #000000; border: none; color: #ffffff;">Black</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                    <a href="" class="footer_button">Place a bid</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16cc.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: red; border: none; color: #ffffff;">Red</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                    <a href="" class="footer_button">Place a bid</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16qq.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: silver; border: none; color: #ffffff;">Silver</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                    <a href="" class="footer_button">Place a bid</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16ghj.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: grey; border: none; color: #ffffff;">Grey</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                    <a href="" class="footer_button">Place a bid</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16x.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: grey; border: none; color: #ffffff;">Grey</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                    <a href="" class="footer_button">Place a bid</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img"
                     style="background: url(images/vans/Optimized-peter-thomas-lTwogC-C9OA-unsplash.jpg) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: #F9E17A; border: none; color: #ffffff;">Yellow</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                    <a href="" class="footer_button">Place a bid</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16cc.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: yellow; border: none; color: #ffffff;">Yellow</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><span class="live_icon"><i class="fa fa-circle"></i></span>Live</p>
                    <a href="" class="footer_button">Place a bid</a>
                </div>
            </div>

        </div>

        <a href="" class="live_auction_more">
            See All
        </a>
    </div>
    <!-- ---------------------------------- -->
    <!-- ------------------------------------------- -->
    <div class="numbers container">
        <h3>E-Autos in Numbers</h3>
        <ul>
            <li>
                <p>9,122</p> <small>Sold Cars</small>
            </li>
            <li>
                <p>1,122,074</p> <small>Ongoing Auction</small>
            </li>
            <li>
                <p>201,905</p> <small>Registered Car Dealer</small>
            </li>
            <li>
                <p>201,905</p> <small>Blacklist</small>
            </li>
        </ul>
    </div>
    <!-- -------------------------------------------------- -->
    <div class="what_client_say">
        <h3>What Clients Says</h3>
    </div>
    <!-- ----------------------------------- -->
    <!-- ---------------------------------- -->

    <div class="upcoming">
        <h3>Up Coming Auction</h3><br>
        <p class="welcome_message">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam quasi similique
            consequatur commodi aliquam
            facere, voluptas magnam? Dolorem, earum incidunt.</p><br>

        <div class="card_group">
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img"
                     style="background: url(images/vans/Optimized-peter-thomas-lTwogC-C9OA-unsplash.jpg) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: blue; border: none; color: #ffffff;">Blue</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><strong>Starts:</strong> 20-11-2023</p>
                    <a href="" class="footer_button">View</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16a.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: #000000; border: none; color: #ffffff;">Black</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><strong>Starts:</strong> 20-11-2023</p>
                    <a href="" class="footer_button">View</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16cc.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: red; border: none; color: #ffffff;">Red</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><strong>Starts:</strong> 20-11-2023</p>
                    <a href="" class="footer_button">View</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16ghj.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: silver; border: none; color: #ffffff;">Silver</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><strong>Starts:</strong> 20-11-2023</p>
                    <a href="" class="footer_button">View</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16x.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: grey; border: none; color: #ffffff;">Grey</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><strong>Starts:</strong> 20-11-2023</p>
                    <a href="" class="footer_button">View</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16x.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: grey; border: none; color: #ffffff;">Grey</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><strong>Starts:</strong> 20-11-2023</p>
                    <a href="" class="footer_button">View</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img" style="background: url(images/vans/Rectangle\ 16qq.png) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: #F9E17A; border: none; color: #ffffff;">Yellow</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><strong>Starts:</strong> 20-11-2023</p>
                    <a href="" class="footer_button">View</a>
                </div>
            </div>
            <div class="card">
                <div class="time">
                    <p>
                        <strong>Days</strong><br>
                        <span>50</span>
                    </p>
                    <p>
                        <strong>Hours</strong><br>
                        <span>20</span>
                    </p>
                    <p>
                        <strong>Minutes</strong><br>
                        <span>12</span>
                    </p>
                </div>
                <div class="card_img"
                     style="background: url(images/vans/Optimized-peter-thomas-lTwogC-C9OA-unsplash.jpg) no-repeat;">
                    <a href="" class="card_img_icon"><i class="far fa-user"></i></a>
                    <a href="" class="card_img_icon"><i class="fa fa-share"></i></a>
                </div>
                <div class="card_text">
                    <h5>2014 Toyota Camry</h5>
                    <div class="details">
                        <p class="location">Lagos Nigeria (11 miles)</p>
                        <p class="bid_price">Current bid: <span>₦ 930,000</span></p>
                        <ul>
                            <li>New</li>
                            <li>10 Cylinder</li>
                            <li style="background-color: yellow; border: none; color: #ffffff;">Yellow</li>
                            <li>Fuel</li>
                        </ul>
                    </div>
                </div>
                <div class="card_footer">
                    <p><strong>Starts:</strong> 20-11-2023</p>
                    <a href="" class="footer_button">View</a>
                </div>
            </div>

        </div>

        <a href="" class="upcoming_auction_more">
            See All
        </a>


    </div>



    <!-- ----------------------------------------------------- -->

    <div class="groups container">
        <h3><span>Groups you may like</span> <a href="../groupMembers.html" target="_blank">See more</a></h3>
        <div class="card_group">
            <div class="card">
                <div class="card_img" style="background: url(images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(images/people/group\ of\ people.png) no-repeat;"></div>
                <div class="details">
                    <h5>IT news</h5>
                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                    <a href="#!">Join</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------- -->

    <!-- ----------------------------------- -->
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
                    <li><a href="../cars/index.html">Cars</a></li>
                    <li><a href="../bikes/index.html">Bikes</a></li>
                    <li><a href="../trucks/index.html">Trucks</a></li>
                    <li><a href="../farm/index.html">Farms</a></li>
                    <li><a href="../plants/index.html">Plants</a></li>
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


<script src="../assets/fontawesome/js/all.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/index.js"></script>
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
                    top: "normal",
                });
            }
        });
    });

</script>
</body>

</html>
