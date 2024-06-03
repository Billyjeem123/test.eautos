<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CARS</title>
    <link rel="stylesheet" href="/home/css/carService.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
@include('home.includes.nav')
<header class="hero">

    <div class="form_control">
        <form action="">
            <h3>Search For Car Service Providers</h3>
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
            <button>Get Instant Valuation</button>
        </form>
    </div>
</header>
<!-- --------------------------------------------------- -->
<div class="status container">
    <h3>Service Providers</h3>
    <ul>
        <li>
            <img src="/home/images/ellipses/Ellipse 61.png" width="" alt="">
            <p>Mechanics</p>
        </li>
        <li>
            <img src="/home/images/ellipses/Ellipse 61-1.png" width="" alt="">
            <p>Car Engineers</p>
        </li>
        <li>
            <img src="/home/images/ellipses/Ellipse 61-2.png" width="" alt="">
            <p>Electricians</p>
        </li>
        <li>
            <img src="/home/images/ellipses/Ellipse 61-3.png" width="" alt="">
            <p>Vulcanizers</p>
        </li>
        <li>
            <img src="/home/images/ellipses/Ellipse 61-4.png" width="" alt="">
            <p>Panel Beaters</p>
        </li>

    </ul>
</div>
<!-- -------------------------------------------------- -->

<div class="mechanics container">
    <h3><span>Popular Mechanics</span> <a href="">View All (22)</a></h3>
    <div class="card_group">
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/b\ and\ w.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/b\ and\ w.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/b\ and\ w.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/b\ and\ w.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/b\ and\ w.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
    </div>
    <div class="pagination">
        <ul>
            <li><a href="" id="prev"><i class="fa fa-angles-left"></i></a></li>
            <li><a href="" class="active">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="" id="next"><i class="fa fa-angles-right"></i></a></li>
        </ul>
    </div>
</div>
<!-- ----------------------------------------------------- -->
<!-- -------------------------------------------------- -->

<div class="vulca container">
    <h3><span>Popular Vulcanizers</span> <a href="">View All (22)</a></h3>
    <div class="card_group">
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/worker1.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/worker1.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/worker1.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/worker1.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
        <div class="card">
            <div class="card_img" style="background: url(/home/images/people/worker1.png) no-repeat;">
                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
            </div>
            <div class="card_text">
                <h5>Valton Kiz</h5>
                <p>Specialized in Car body</p>
                <h6>Ikeja Lagos</h6>
                <h6 class="ratings">
            <span class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </span>
                    &nbsp;
                    <span>5 (22)</span>
                </h6>
            </div>
        </div>
    </div>
    <div class="pagination">
        <ul>
            <li><a href="" id="prev"><i class="fa fa-angles-left"></i></a></li>
            <li><a href="" class="active">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="" id="next"><i class="fa fa-angles-right"></i></a></li>
        </ul>
    </div>
</div>
<!-- ----------------------------------------------------- -->

<div class="car_dealers container">
    <h3>Connect with Car Dealers</h3>
    <div class="card_group">
        <div class="card">
            <div class="card_img"
                 style="background: url(/home/images/brands/Optimized-alen-kajtezovic-iI9Mf9g_9gY-unsplash.jpg) no-repeat;"></div>
            <div class="details">
                <h5>Perillo BMW</h5>
                <span><strong>100%</strong> Verified</span>
                <p class="progress"><i class="fa fa-check"></i></p>
            </div>
        </div>
        <div class="card">
            <div class="card_img"
                 style="background: url(/home/images/brands/Optimized-clem-onojeghuo-NlaQS1em2Pk-unsplash.jpg) no-repeat;">
            </div>
            <div class="details">
                <h5>Mechino Mottors</h5>
                <span><strong>100%</strong> Verified</span>
                <p class="progress"><i class="fa fa-check"></i></p>
            </div>
        </div>
        <div class="card">
            <div class="card_img"
                 style="background: url(/home/images/brands/Optimized-ivan-didenko-n6jgA_FbDOE-unsplash.jpg) no-repeat;">
            </div>
            <div class="details">
                <h5>Porsche Downtown</h5>
                <span><strong>100%</strong> Verified</span>
                <p class="progress"><i class="fa fa-check"></i></p>
            </div>
        </div>
        <div class="card">
            <div class="card_img"
                 style="background: url(/home/images/brands/Optimized-krish-parmar-QsnLLIHwY8Y-unsplash.jpg) no-repeat;">
            </div>
            <div class="details">
                <h5>Perillo BMW</h5>
                <span><strong>100%</strong> Verified</span>
                <p class="progress"><i class="fa fa-check"></i></p>
            </div>
        </div>
        <div class="card">
            <div class="card_img"
                 style="background: url(/home/images/brands/Optimized-taras-chernus--Y8-NNDqiRM-unsplash.jpg) no-repeat;">
            </div>
            <div class="details">
                <h5>Perillo BMW</h5>
                <span><strong>100%</strong> Verified</span>
                <p class="progress"><i class="fa fa-check"></i></p>
            </div>
        </div>
    </div>

</div>
<!-- ----------------------------------------- -->

@include('home.includes.footer')
</body>

</html>
