<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
  <link rel="stylesheet" href="/home/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 <!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
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

    <ul class="center-item-slider">
      <li class="holder center">
        <h3>Lorem</h3>
        <p>loremloremloremloeremememwjfbljvajh</p>
        <a href="#">Button</a>
      </li>
      <li class="holder center">
        <h3>Lorem</h3>
        <p>loremloremloremloeremememwjfbljvajh</p>
        <a href="#">Button</a>
      </li>
      <li class="holder center">
        <h3>Lorem</h3>
        <p>loremloremloremloeremememwjfbljvajh</p>
        <a href="#">Button</a>
      </li>
      <li class="holder center">
        <h3>Lorem</h3>
        <p>loremloremloremloeremememwjfbljvajh</p>
        <a href="#">Button</a>
      </li>
      <li class="holder center">
        <h3>Lorem</h3>
        <p>loremloremloremloeremememwjfbljvajh</p>
        <a href="#">Button</a>
      </li>
    </ul>

  </div>
  <!-- ------------------------------------------------- -->
  <div class="report_request container">
    <!--<div class="grey"></div>-->
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
        <p>Here at e-autos, we want to make your car buying experience as smooth and efficient as possible. Utilize this form to let us know what kind of car you're looking for, and we'll use our resources to find the perfect match!</p>
        <a href="{{route('request.show')}}" >Request</a>
      </span>
    </div>

  </div>
  <!-- ------------------------------------------- -->
   <div class="numbers container">
       <h3>E-Autos in Numbers</h3>
       <ul id="numberList">
           <li>
               <p id="soldCars">9,122</p> <small>Sold Cars</small>
           </li>
           <li>
               <p id="ongoingAuction">1,122,074</p> <small>Ongoing Auction</small>
           </li>
           <li>
               <p id="registeredDealer">201,905</p> <small>Registered Car Dealer</small>
           </li>
           <li>
               <p id="blacklist">201,905</p> <small>Blacklist</small>
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
                    <li style="background-color: {{ $product->color }}; border: 1px solid; color: #000;">{{ $product->color }}</li>
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

      @if($getDealers->count() === 0)
          <!-- Hide the section if no service providers are available -->
      @else
          <h3>Connect with Car Dealers</h3>
      @endif


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




   <div class="car_dealers container">
           @if($featuredProvider->count() === 0)
               <!-- Hide the section if no service providers are available -->
           @else
               <h3>Connect with Service providers</h3>
           @endif

           <div class="card_group">

           @foreach($featuredProvider as $dealer)
               <div class="card">
                   <a href="{{route('user.profile', $dealer->id)}}">
                       <div class="card_img" style="background: url('{{ !empty($dealer->image) ? $dealer->image : 'https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png' }}') no-repeat;"></div>
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
  <!-- -------------------------------------------------- -->



   <br><br>
   <div class="latest container">
       <h3>Featured Product</h3>
       <div class="card_group">
           @foreach ($featuredProducts as $product)
               <div class="card">
                   <a href="{{route('user.profile', $product->user_id)}}" class="card_link">
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






   <div class="blog">
       <h3>Blog Posts</h3>
       <div class="blog-group">
           @forelse ($blogs as $blog)
               <a href="{{route('show.blog.id', $blog->id)}}" class="card">
                   <div class="blog-img" style="background: url({{ $blog->image }});"></div>
                   <h4>LatestNews</h4>
                   <p>{{ $blog->title }}</p>
               </a>
           @empty
               <p>No blog posts found.</p>
           @endforelse
       </div>
   </div>


   <div class="groups container">
{{--       <a href="{{route('groups')}}" target="_blank">See more</a>--}}
       <h3><span>Groups you may like</span></h3>
       <div class="card_group">
           @foreach ($groups as $group):
           <div class="card">
               <div class="card_img" style="background: url('{{ $group->image }}') no-repeat;"></div>
               <div class="details">
                   <h5>{{$group->title}}</h5>
                   <p><span> {{$group->getMembersCountAttribute()}}  Member</span>&nbsp; &nbsp;&nbsp;<span>0 Posts today</span></p>
                   <a href="{{route('groups', $group->id)}}">Join</a>
               </div>


           </div>
           @endforeach;
       </div>
   </div>




  @include('home.includes.footer')
  <script src="
https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js
"></script>
<script>
      //Center item Slider
  $('.center-item-slider').slick({
    centerMode: true,
    centerPadding: '60px',
    autoplay: true,
    autoplaySpeed: 4000,
    slidesToShow: 2,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });
</script>


   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
       $(document).ready(function() {
           $(window).scroll(function() {
               // Check if the number list is visible in the viewport
               if ($('#numberList').visible(true)) {
                   // Increment numbers with animation
                   $('#soldCars').prop('Counter', 0).animate({
                       Counter: 9122
                   }, {
                       duration: 2000,
                       easing: 'swing',
                       step: function(now) {
                           $(this).text(Math.ceil(now).toLocaleString());
                       }
                   });

                   $('#ongoingAuction').prop('Counter', 0).animate({
                       Counter: 1122074
                   }, {
                       duration: 2000,
                       easing: 'swing',
                       step: function(now) {
                           $(this).text(Math.ceil(now).toLocaleString());
                       }
                   });

                   $('#registeredDealer').prop('Counter', 0).animate({
                       Counter: 201905
                   }, {
                       duration: 2000,
                       easing: 'swing',
                       step: function(now) {
                           $(this).text(Math.ceil(now).toLocaleString());
                       }
                   });

                   $('#blacklist').prop('Counter', 0).animate({
                       Counter: 201905
                   }, {
                       duration: 2000,
                       easing: 'swing',
                       step: function(now) {
                           $(this).text(Math.ceil(now).toLocaleString());
                       }
                   });

                   // Unbind scroll event to prevent animation on subsequent scrolls
                   $(window).off('scroll');
               }
           });
       });

       // Custom function to check if an element is visible in the viewport
       $.fn.visible = function(partial) {
           var $t = $(this),
               $w = $(window),
               viewTop = $w.scrollTop(),
               viewBottom = viewTop + $w.height(),
               _top = $t.offset().top,
               _bottom = _top + $t.height(),
               compareTop = partial === true ? _bottom : _top,
               compareBottom = partial === true ? _top : _bottom;

           return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
       };
   </script>
