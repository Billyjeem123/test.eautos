<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="/home/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>


   @include('home.includes.nav')

   @include('home.includes.search')


  <!-- --------------------------------------------------- -->
  <div class="status container">
    <ul>
      <li>
        <img src="/home/images/ellipses/Ellipse 61.png" width="" alt="">
        <p>Micheal Ose</p>
      </li>
      <li>
        <img src="/home/images/ellipses/Ellipse 61-1.png" width="" alt="">
        <p>Micheal Ose</p>
      </li>
      <li>
        <img src="/home/images/ellipses/Ellipse 61-2.png" width="" alt="">
        <p>Micheal Ose</p>
      </li>
      <li>
        <img src="/home/images/ellipses/Ellipse 61-3.png" width="" alt="">
        <p>Micheal Ose</p>
      </li>
      <li>
        <img src="/home/images/ellipses/Ellipse 61-4.png" width="" alt="">
        <p>Micheal Ose</p>
      </li>
      <li>
        <img src="/home/images/ellipses/Ellipse 61-5.png" width="" alt="">
        <p>Micheal Ose</p>
      </li>
      <li>
        <img src="/home/images/ellipses/Ellipse 61-6.png" width="" alt="">
        <p>Micheal Ose</p>
      </li>
      <li>
        <img src="/home/images/ellipses/Ellipse 61-7.png" width="" alt="">
        <p>Micheal Ose</p>
      </li>

    </ul>
  </div>
  <!-- -------------------------------------------------- -->
  <div class="essential container">
    <h3>The world is going <span>e</span> so are we</h3><br>
    <h4>List of essential Group Brands</h4>
    <ul>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
      <li>
        <img src="essential_img/Frame 194.png" alt="">
        <p>Product</p>
      </li>
    </ul>
  </div>
  <!-- ------------------------------------------------- -->
  <div class="report_request container">
    <div class="grey"></div>
    <div class="report">
      <span>
        <h3>Report a car Deal Scam</h3>
        <p>Lorem ipsum dolor, Corporis aliquid consequatur aspernatur at iure
          voluptas vero inventore similique officiis quia?</p>
        <a href="{{route('report.show')}}" >Report</a>
      </span>
    </div>
    <div class="request">
      <span>
        <h3>Make a Request</h3>
        <p>Lorem ipsum dolor, Corporis aliquid consequatur aspernatur at iure
          voluptas vero inventore similique officiis quia?</p>
        <a href="{{route('request.show')}}" >Request</a>
      </span>
    </div>

  </div>
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

  <div class="latest container">
    <h3>Our Latest Products</h3>
    <div class="card_group">
      @foreach ($products as $product)
      <div class="card">
          <a href="{{route('product.show', $product->id)}}" class="card_link">
              <div class="card_img" style="background: url('{{ $product->images[0]['image'] }}') no-repeat;"></div>
          </a>
          <div class="card_text">
              <h5>{{ $product->car_name}}</h5>
              <div class="details">
                  <ul>
                    <li>New</li>
                    <li>{{$product->cylinder}}</li>
                    <li style="background-color: {{ $product->color }}; border: none; color: #ffffff;">{{ $product->color }}</li>
                    <li>Fuel</li>
                  </ul>
                  <h5> ₦ {{ number_format($product->price,2) }}</h5>
                  <p>{{ $product->location }} ({{ $product->mileage }})</p>

              </div>
          </div>
      </div>


      @endforeach
  </div>



  </div>
  <!-- ----------------------------------------------------- -->

  <div class="car_dealers container">
    <h3>Connect with Car Dealers</h3>
    <div class="card_group">

            @foreach($getDealers as $dealer)
                <div class="card">
                    <a href="{{route('user.profile', $dealer->id)}}">
                        <div class="card_img" style="background: url('{{ !empty($dealer->image) ? $dealer->image : '/images/profile.svg' }}') no-repeat;"></div>
                    </a>
                    <div class="details">
                        <h5>{{ $dealer->name}}</h5>
                        <span><strong>100%</strong> Verified</span>
                        <p class="progress"><i class="fa fa-check"></i></p>
                    </div>
                </div>
            @endforeach



    </div>

  </div>
  <!-- ----------------------------------------------------- -->

{{--  <div class="short_video container">--}}
{{--    <h3><span>Short Videos</span> <a href="javascript:void(0)" >See All</a></h3>--}}
{{--    <div class="card_group">--}}
{{--      <div class="card" style="background: linear-gradient(#00000059, #00000059),--}}
{{--      url(/home/images/cars/Optimized-dima-panyukov-DwxlhTvC16Q-unsplash.jpg) no-repeat;">--}}
{{--        <span class="control"><i class="fa-solid fa-play"></i></span>--}}
{{--        <div class="reaction">--}}
{{--          <span class="love"><i class="fa-regular fa-heart"></i> 203</span>--}}
{{--          <span class="views">5,345 views</span>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card" style="background: linear-gradient(#00000059, #00000059),--}}
{{--      url(/home/images/bikes/Optimized-ajin-k-s-GmSBNRB9124-unsplash.jpg) no-repeat;">--}}
{{--        <span class="control"><i class="fa-solid fa-play"></i></span>--}}
{{--        <div class="reaction">--}}
{{--          <span class="love"><i class="fa-regular fa-heart"></i> 203</span>--}}
{{--          <span class="views">5,345 views</span>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card" style="background: linear-gradient(#00000059, #00000059),--}}
{{--      url(/home/images/cars/Optimized-dhiva-krishna-YApS6TjKJ9c-unsplash.jpg) no-repeat;">--}}
{{--        <span class="control"><i class="fa-solid fa-play"></i></span>--}}
{{--        <div class="reaction">--}}
{{--          <span class="love"><i class="fa-regular fa-heart"></i> 203</span>--}}
{{--          <span class="views">5,345 views</span>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card" style="background: linear-gradient(#00000059, #00000059),--}}
{{--      url(/home/images/bikes/Optimized-sanjeev-nagaraj-caz59CGkQz8-unsplash.jpg) no-repeat;">--}}
{{--        <span class="control"><i class="fa-solid fa-play"></i></span>--}}
{{--        <div class="reaction">--}}
{{--          <span class="love"><i class="fa-regular fa-heart"></i> 203</span>--}}
{{--          <span class="views">5,345 views</span>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card" style="background: linear-gradient(#00000059, #00000059),--}}
{{--      url(/home/images/cars/Optimized-kenny-eliason-FcyipqujfGg-unsplash.jpg) no-repeat;">--}}
{{--        <span class="control"><i class="fa-solid fa-play"></i></span>--}}
{{--        <div class="reaction">--}}
{{--          <span class="love"><i class="fa-regular fa-heart"></i> 203</span>--}}
{{--          <span class="views">5,345 views</span>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--  </div>--}}

  <!-- ------------------------------------------------------------ -->
  <div class="why">
    <div class="why_content">
      <h2>Why E-Autos</h2>
      <ul class="load">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <span>Waiting for Content</span>
      </ul>
    </div>
  </div>
  <!-- ----------------------------------------- -->

  <div class="meet_dealers">
    <ul class="card_group">
      <li class="card"><a href="{{route('dealers.all')}}">The Dealers</a></li>
      <li class="card">
        <p>Meet with Different Car Dealers, who will help get your desired property, with little to no agent fee added
        </p>
      </li>
      <li class="card"><img src="/home/images/Rectangle 247.png" alt=""></li>
    </ul>
  </div>
  <!-- ----------------------------------------------------- -->

{{--  <div class="groups container">--}}
{{--    <h3><span>Groups you may like</span> <a href="javascript:void(0)" target="_blank">See more</a></h3>--}}
{{--    <div class="card_group">--}}
{{--      <div class="card">--}}
{{--        <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--        <div class="details">--}}
{{--          <h5>IT news</h5>--}}
{{--          <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--          <a href="#!">Join</a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card">--}}
{{--        <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--        <div class="details">--}}
{{--          <h5>IT news</h5>--}}
{{--          <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--          <a href="#!">Join</a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card">--}}
{{--        <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--        <div class="details">--}}
{{--          <h5>IT news</h5>--}}
{{--          <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--          <a href="#!">Join</a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card">--}}
{{--        <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--        <div class="details">--}}
{{--          <h5>IT news</h5>--}}
{{--          <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--          <a href="#!">Join</a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card">--}}
{{--        <div class="card_img" style="background: url(/home/images/people/group\ of\ people.png) no-repeat;"></div>--}}
{{--        <div class="details">--}}
{{--          <h5>IT news</h5>--}}
{{--          <p><span>1 Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>--}}
{{--          <a href="#!">Join</a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--  </div>--}}


  @include('home.includes.footer')
