<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black List</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/blacklist.css">
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


{{--        <li>--}}
{{--            <a href="{{ route('sell') }}" class="{{ request()->routeIs('sell') ? 'active' : '' }}">Sell A Car</a>--}}
{{--        </li>--}}


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
<header class="hero">
    <div class="card_group">
        <div class="card blacklisted">
            <div class="text">
                <h2><span>Blacklisted</span><br> Car Dealers on E-Autos</h2><br>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum tempora, ducimus quidem quaerat numquam omnis
                    repudiandae, corrupti obcaecati ipsa fugiat unde perferendis officia est sit consequatur cupiditate, vero
                    distinctio a voluptas doloremque doloribus. Tempora quo nobis repudiandae alias fugiat eveniet?</p>
            </div>
        </div>
        <div class="card">
            <img src="/home/images/blacklist_1-removebg-preview 1.png" alt="">
        </div>
    </div>
    <div class="form">
        <form action="">
            <input type="text" placeholder="Search for Card Dealers">
            <button id="search"><i class="fa fa-search"></i> <span>Search</span></button>
        </form>
    </div>
    <a id="backButton"><i class="fa fa-angle-left"></i> - Go back</a>
</header>
<main>

    <!-- ---------------------------------- -->
    <div class="blacklist container">
        <h3>Blacklisted Car Dealers</h3>
        <div class="card_group">
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
        </div>
        <br>
        <h3>Blacklisted Car Sellers</h3>
        <div class="card_group">
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
        </div>
        <br>
        <h3>Blacklisted Car Buyers</h3>
        <div class="card_group">
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
        </div>
        <br>
        <h3>Blacklisted Service Provider</h3>
        <div class="card_group">
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
            <div class="card">
                <div class="card_img" style="background: url(/home/images/people/meeting.png) no-repeat;"></div>
                <div class="card_text">
                    <h6>Lagos Nig.</h6>
                    <h4>Mercedes Benz</h4>
                    <h6>Deals on Luxury Cars</h6>
                    <a href=""><span><strong>B</strong>&nbsp; Blessing Lainus</span> <span><i
                                class="fa fa-angle-right"></i></span></a>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                            <li><i class="fa-regular fa-star"></i></li>
                        </ul>
                        <span>20/20/2002</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero quod veritatis eum officiis similique
                        distinctio ipsam animi nam dignissimos!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------- -->

{{--    <div class="groups container">--}}
{{--        <h3><span>Groups you may like</span> <a href="" target="_blank">See more</a></h3>--}}
{{--        <div class="card_group">--}}
{{--            <div class="card">--}}
{{--                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--                <div class="details">--}}
{{--                    <h5>IT news</h5>--}}
{{--                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--                    <a href="#!">Join</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--                <div class="details">--}}
{{--                    <h5>IT news</h5>--}}
{{--                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--                    <a href="#!">Join</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--                <div class="details">--}}
{{--                    <h5>IT news</h5>--}}
{{--                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--                    <a href="#!">Join</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--                <div class="details">--}}
{{--                    <h5>IT news</h5>--}}
{{--                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--                    <a href="#!">Join</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--                <div class="details">--}}
{{--                    <h5>IT news</h5>--}}
{{--                    <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--                    <a href="#!">Join</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- ---------------------------------- -->--}}


</main>


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
                     //-------------------------------------------
         $("#backButton").click(function() {
    history.go(-1);
  });
    });

</script>
</body>

</html>
