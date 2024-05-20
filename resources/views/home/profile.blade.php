<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/home/css/provider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .comment-section {
            margin-top: 20px;
        }

        .comment-section h4 {
            margin-bottom: 10px;
        }

        .comment-section textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            margin-bottom: 10px;
        }

        .comment-section button {
            background-color: #394293;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .comment-section button:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
@include('home.includes.nav')

<header class="hero">
    <div class="card_group">
        <div class="card image" style="background: linear-gradient(#00000059, #00000059),url(/home/images/kicthen.png) no-repeat;">
            <img src="/home/images/people/smiling man.png" alt="">
        </div>
        <div class="card">
            <h2>{{ $profile->name }} - {{ $carsCount }} Cars</h2><br>

            <div class="card_info">
                <img src="/home/images/people/smiling man.png" width="" alt="">
                <div>
                    <p><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp; Lagos Nigeria (11 miles)</p>
                    <p><span><i class="fa fa-calendar"></i></span>&nbsp;&nbsp; Joined {{ $profile->created_at->format('F j, Y') }}</p>

                    <p><span><i class="fa fa-envelope"></i></span>&nbsp;&nbsp; {{ $profile->email }}</p>
                    <p><span><i class="fa fa-phone"></i></span>&nbsp;&nbsp;<a style="color:#000;" href="tel: {{ $profile->phone }}">{{ $profile->phone }}</a></p>
                    <p class="experience"><a href="#">Experience</a>&nbsp;&nbsp; Over {{ $profile->experience }}</p>
                </div>
            </div><br>
            <div class="abt">
                <h5>About Us</h5>
                <p>{{$profile->about}}</p>
            </div><br>
            <!--<span class="share"><i class="fa fa-share"></i>&nbsp;&nbsp; <strong>Share</strong></span><br>-->
            <span style="display: flex;">
            <a href="#" class="share" style="color: #000; text-decoration: none;"><i class="fab fa-facebook"></i>&nbsp;&nbsp; <strong></strong></a>
            <a href="#" class="share"  style="color: #000; text-decoration: none;"><i class="fab fa-instagram"></i>&nbsp;&nbsp; <strong></strong></a>
            <a href="#" class="share"  style="color: #000; text-decoration: none;"><i class="fab fa-twitter"></i>&nbsp;&nbsp; <strong></strong></a>
            </span>
            
            <div class="card_footer">
                <a href="#">Connect</a><a href="#" id="report">Report</a>
            </div>
        </div>
    </div>
    <div class="report-modal">
         <div class="bid">
            <div class="close-modal">X</div>
            <div class="report-form">
                <form>
                  <span class="form_group">
                    <input type="text" placeholder="Enter Your Name">
                    <input type="text" placeholder="Phone Number">
                    <input type="text" placeholder="Email Address">
                  </span>
                    <textarea name="" id="" cols="30" rows="5" placeholder="Complain"></textarea>
                  <button>Send Report</button>
                </form>
            </div>
         </div>
    </div>
</header>
<main>
    <!-- ---------------------------- -->
{{--    <div class="work-image">--}}
{{--        <div class="/home/images">--}}
{{--            <img src="/home/images/workers/Rectangle 1312.png" alt="">--}}
{{--            <img src="/home/images/workers/Rectangle 131.png" alt="">--}}
{{--            <img src="/home/images/workers/Rectangle 239.png" alt="">--}}
{{--            <img src="/home/images/workers/Rectangle 131t.png" alt="">--}}
{{--            <img src="/home/images/workers/Rectangle 1313.png" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- ---------------------------- -->
    <div class="services">
        <h3>Our Services</h3>
        <ul>
            @forelse($bussiness_service as $bussiness)
                <li><i class="fa-regular fa-circle-check"></i>&nbsp;&nbsp; {{$bussiness->bussiness_name}}</li>
            @empty
                <li>No business services available at the moment.</li>
            @endforelse
        </ul>
    </div>
    <!-- ------------------------------------------------------------ -->
    <div class="work-history">
        <form action="">
            <select name="" id="" disabled>
                <option value="" selected disabled>Work History</option>
                <option value="" >.....</option>
            </select>
        </form>
        <h3>Dealer Product</h3>
        <div class="card-group">
      <a href="#" style="color:#000; text-decoration: none;" class="card">
              <div
                class="card_img"
                style="background: url(/images/cars/Rectangle\ 16.png) no-repeat"
              ></div>
              <div class="card_text">
                <h5>2014 Toyota Camry</h5>
                <div class="details">
                  <ul>
                    <li>New</li>
                    <li>10 Cylinder</li>
                    <li
                      style="
                        background-color: #f9e17a;
                        border: none;
                        color: #ffffff;
                      "
                    >
                      Yellow
                    </li>
                    <li>Fuel</li>
                  </ul>
                  <h5>₦ 930,000</h5>
                  <p>Lagos Nigeria (11 miles)</p>
                </div>
              </div>
        </a>
        </div>
    </div>
    <!-- ------------------------------------------------------------ -->
    <!-- ------------------------------------------------------------ -->
    <div class="work-history">
        <h3>Featured Cars</h3>
        <div class="card-group">
            <a href="#" style="color:#000; text-decoration: none;" class="card">
              <div
                class="card_img"
                style="background: url(/images/cars/Rectangle\ 16.png) no-repeat"
              ></div>
              <div class="card_text">
                <h5>2014 Toyota Camry</h5>
                <div class="details">
                  <ul>
                    <li>New</li>
                    <li>10 Cylinder</li>
                    <li
                      style="
                        background-color: #f9e17a;
                        border: none;
                        color: #ffffff;
                      "
                    >
                      Yellow
                    </li>
                    <li>Fuel</li>
                  </ul>
                  <h5>₦ 930,000</h5>
                  <p>Lagos Nigeria (11 miles)</p>
                </div>
              </div>
        </a>
        
        </div>
    </div>
    <!-- ------------------------------------------------------------ -->

    <div class="time container">
        <div class="card_group">
            <div class="card">
                <h4>Opening Hours</h4>
                <p><span>Monday</span><span>10:00 - 15:00</span></p>
                <p><span>Tuesday</span><span>10:00 - 15:00</span></p>
                <p><span>Wednesday</span><span>10:00 - 15:00</span></p>
                <p><span>Thursday</span><span>10:00 - 15:00</span></p>
                <p><span>Friday</span><span>10:00 - 15:00</span></p>
                <p><span>Saturday</span><span>10:00 - 15:00</span></p>
            </div>
            <div class="card img">
                <img src="/home/images/map2.png" alt="">
                <a href="">See Directions</a>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------- -->
    <!-- ----------------------------------------- -->

    <div class="reviews container">
        <h3>Reviews</h3>
        <div class="card_group">
            @forelse ($reviews as $review)
                <div class="card">
                    <div class="card_header">
                        <strong>{{ substr($review->user->name, 0, 1) }}
                        </strong>
                        <small>{{$review->user->name}}</small>
                    </div>
                    <p>{{$review->reviews}}</p>
                </div>

            @empty
                <div class="card" style="text-align: center;" >
                    <p>No Review available at the moment.</p>
                </div>
            @endforelse

        </div>

        <!-- Add a textarea for commenting -->
        <div class="comment-section">
            <h4>Leave a Review</h4>
            <form action="{{route('post.reviews')}}" method="post" >
                @csrf
                <input type="hidden" name="bussiness_id" value="{{$profile->id}}">
                <textarea name="reviews" id="reviews" placeholder="Write your reviews here..." rows="4" required></textarea>
                @auth
                    <button type="submit">Post Review</button>
                @else
                    <a href="{{ route('login') }}">Login to Review</a>
                @endauth
            </form>

        </div>

    </div>

    <!-- ----------------------------------- -->
{{--    <div class="car_dealers container">--}}
{{--        <h3>Other Service Provider Near you</h3>--}}
{{--        <div class="card_group">--}}
{{--            <a class="card" href="#">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(/home/images/workers/Rectangle\ 131.png) no-repeat;"></div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Panel Beater</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a class="card" href="#">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(/home/images/workers/Rectangle\ 1312.png) no-repeat;">--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Mechanic</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a class="card" href="#">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(/home/images/workers/Rectangle\ 1313.png) no-repeat;">--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Vulvanizer</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a class="card" href="#">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(/home/images/workers/Rectangle\ 239.png) no-repeat;">--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Panel Beater</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a class="card" href="#">--}}
{{--                <div class="card_img"--}}
{{--                     style="background: url(/home/images/workers/Rectangle\ 131t.png) no-repeat;">--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <h5>Mechanic</h5>--}}
{{--                    <span><strong>100%</strong> Verified</span>--}}
{{--                    <p class="progress"><i class="fa fa-check"></i></p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--    </div>--}}

    <!-- ------------------------------------------- -->
</main>


@include('home.includes.footer')

<script>
        $(document).ready(function () {


      $("#report").click(function () {
        $(".report-modal").css("display", "flex");
      });
      $(".close-modal").click(function () {
        $(".report-modal").css("display", "none");
      });
      });

</script>
</body>

</html>
