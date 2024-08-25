<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
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

    <style>
        .short-video-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 15px;
        }

        .short-video-item {
            background-color: #f5f5f5;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .short-video-item video {
            width: 100%;
            height: 350px;
        }

        .video-stats,
        .video-info {
            padding: 10px;
        }

        .video-stats div {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .video-stats i {
            margin-right: 5px;
        }

        .pagination-section {
            margin-top: 20px;
            text-align: center;
            align-content: center;
        }

        .pagination-section ul.pagination {
            margin: 0;
        }

        .pagination-section ul.pagination li.page-item {
            display: inline-block;
            margin-right: 5px;
        }

        .pagination-section ul.pagination li.page-item a.page-link {
            color: #007bff;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 3px;
        }

        .pagination-section ul.pagination li.page-item a.page-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination-section ul.pagination li.page-item.active a.page-link {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

    </style>
</head>

<body>
@include('home.includes.nav')

<header class="hero">
    <div class="card_group">
        <div class="card image" style="background: linear-gradient(#00000059, #00000059),url(/home/images/kicthen.png) no-repeat;">
            <img src="https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png" alt="">
        </div>
        <div class="card">
            <h2 style="display: flex; justify-content: start;
            align-items: center; gap: 3px;">
                {{ $profile->name }} - {{ $carsCount }} Cars 
                <span style="font-size: 13px; background: #f2f2f2; 
                border-radius: 10px; padding: 4px 8px; display: flex; 
                justify-content: start; align-items: center; width: fit-content;">
                    Verified
                    <img src="https://img.icons8.com/?size=48&id=98A4yZTt9abw&format=png" width="20px" />
                </span>
                <!--    <span style="font-size: 13px; background: #f2f2f2; -->
                <!--border-radius: 10px; padding: 4px 8px; display: flex; -->
                <!--justify-content: start; align-items: center; width: fit-content;">-->
                <!--    Not-verified-->
                <!--    <img src="https://img.icons8.com/?size=48&id=13742&format=png" width="20px" />-->
                <!--</span>-->
            </h2><br>

            <div class="card_info">
                <img src="https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png" width="" alt="">
                <div>
                    <p><span><i class="fa fa-map-marker-alt"></i></span>&nbsp;&nbsp;  {{$profile->business_state }} ({{rand(5, 20)}} miles)</p>
                    <p><span><i class="fa fa-user-plus"></i></span>&nbsp;&nbsp; Joined {{ $profile->created_at->format('F j, Y') }}</p>
                    <p><span><i class="fa fa-magnifying-glass"></i></span>&nbsp;&nbsp; Reviews {{ $totalReviews }}</p>
                    <p><span><i class="fa fa-user"></i></span>&nbsp;&nbsp; UserId  {{ $profile->id }}</p>
                    @if ($reportsCount > 0)
                        <p><span><i class="fa fa-exclamation-triangle"></i></span>&nbsp;&nbsp; Reported {{ $reportsCount }} times</p>
                    @else
                        <p><span><i class="fa fa-exclamation-triangle"></i></span>&nbsp;&nbsp; Reported 0 times</p>
                    @endif

                    <p><span><i class="fa fa-envelope"></i></span>&nbsp;&nbsp;<a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></p>
                    <p><span><i class="fa fa-phone"></i></span>&nbsp;&nbsp;<a style="" href="tel: {{ $profile->phone }}">{{ $profile->phone }}</a></p>
                    <p class="experience"><a>Experience</a>&nbsp;&nbsp; Over {{ $profile->experience }}</p>
                </div>
            </div><br>
            <div class="abt">
                <h5>About Us</h5>
                <p>{{$profile->about}}</p>
            </div><br>
            <!--<span class="share"><i class="fa fa-share"></i>&nbsp;&nbsp; <strong>Share</strong></span><br>-->
            <span style="display: flex; gap: 3px;">
            <a href="#" class="share" style="color: #000; text-decoration: none;"><i class="fab fa-facebook"></i>&nbsp;&nbsp; <strong></strong></a>
            <a href="#" class="share"  style="color: #000; text-decoration: none;"><i class="fab fa-instagram"></i>&nbsp;&nbsp; <strong></strong></a>
            <a href="#" class="share"  style="color: #000; text-decoration: none;"><i class="fab fa-twitter"></i>&nbsp;&nbsp; <strong></strong></a>
            <a href="https://wa.me/{{ $profile->phone }}" class="share"  style="color: #000; text-decoration: none;"><i class="fab fa-whatsapp"></i>&nbsp;&nbsp; <strong></strong></a>
            </span>

            <div class="card_footer">
                <a id="connect" style="cursor: pointer;">Connect</a><a style="cursor: pointer;" id="report">Report</a>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------------------->
    <div class="connect-modal">
         <div class="bid">
            <div class="close-modal"><strong><i class="fa-solid fa-xmark"></i></strong></div>
            <div class="connect-form">
                <form>
                  <!--<span class="form_group">-->
                      <label>Enter Your Name <i class="fa fa-arrow-down"></i></label>
                      <input type="text" placeholder="Name"><br>
                      <label>Enter Your E-mail <i class="fa fa-arrow-down"></i></label>
                    <input type="text" placeholder="E-mail"><br>
                  <!--</span>-->
                  <label>Type In Your Message <i class="fa fa-arrow-down"></i></label>
                    <textarea name="complain" id="" cols="30" rows="5" placeholder="Message"></textarea>
                  <button>Send</button>
                </form>
            </div>
         </div>
    </div>
    <!--------------------------------------------------------------------------->
    <div class="report-modal">
         <div class="bid">
            <div class="close-modal"><strong><i class="fa-solid fa-xmark"></i></strong></div>
            <div class="report-form">
                <form   method="POST" action="{{route('report.save_report')}}">
                    @csrf
                  <strong style="font-size: 18px;">Offenders Info.</strong>
                  <span style="background: #e6e6e6; width: 100%; padding: 5px;">
                      <input type="text" readonly placeholder="Offender Name" name="offender_name" value="{{ $profile->name}}">
                    <input type="text" readonly placeholder="Bussiness Name" name="business_name" value="{{ $profile->business_name}}">
                       <input type="text" readonly placeholder="Location" name="location" value="{{ $profile->business_location ?? "stat" }}">

                       <input type="hidden" readonly placeholder="Location" name="offender_id" value="{{ $profile->id}}">
                  </span><br>

                       <strong>Input Your Info <i class="fa fa-arrow-down"></i></strong>
                    <input type="text" placeholder="Enter Your Name" name="name" value="{{auth()->user()->name ?? ""}}">
                      <input type="text" placeholder="Enter Your Address" name="country">
                    <input type="text" placeholder="Phone Number"  name="phone_number" value="{{auth()->user()->phone ?? ""}}">
                       <input type="text" placeholder="Your Email" name="email" value="{{auth()->user()->email ?? ""}}">
                       <label><strong>Enter Your Message <i class="fa fa-arrow-down"></i></strong></label>
                    <textarea name="complain" id="" cols="30" rows="5" placeholder="Type in your complaint"></textarea>
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
                <li><i class="fa-regular fa-circle-check"></i>&nbsp;&nbsp; {{$bussiness->service_list}}</li>
            @empty
                <li>No business services available at the moment.</li>
            @endforelse
        </ul>
    </div>
    <!-- ------------------------------------------------------------ -->
    <div class="work-history">
{{--        <form action="">--}}
{{--            <select name="" id="" disabled>--}}
{{--                <option value="" selected disabled>Work History</option>--}}
{{--                <option value="" >.....</option>--}}
{{--            </select>--}}
{{--        </form>--}}
        <h3>Dealer Product</h3>

        <div class="card-group">
            @forelse($carsUploaded as $car)
                <a href="{{route('product.show', $car->id)}}" style="color:#000; text-decoration: none;" class="card">
                    <div class="card_img"
                         style="background: url('{{ $car->images[0]['image'] }}') no-repeat;"></div>

                    <div class="card_text">
                        <h5>{{ $car->title }}</h5>
                        <div class="details">
                            <ul>
                                <li>{{ $car->subcategories->name }}</li>
                                <li>{{ $car->cylinder }}</li>
                                <li style="background-color: {{ $car->color }}; border: none; color: #ffffff;">{{ $car->color }}</li>
                                <li>Fuel</li>

                            </ul>
                            <h5>₦ {{ number_format($car->price, 2) }}</h5>
                            <p>{{ $car->location }} ({{ $car->mileage }})</p>
                        </div>
                    </div>
                </a>
            @empty
                <p>No cars uploaded yet.</p>
            @endforelse
        </div>


          @if($carsUploaded->count() > 0 )

            <!-- Pagination Section -->
            <div class="pagination-section">
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center flex-wrap">
                            @if ($carsUploaded->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">Prev</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $carsUploaded->previousPageUrl() }}">Prev</a></li>
                            @endif

                            @foreach ($carsUploaded->getUrlRange(1, $carsUploaded->lastPage()) as $page => $url)
                                <li class="page-item {{ ($page == $carsUploaded->currentPage()) ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($carsUploaded->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $carsUploaded->nextPageUrl() }}">Next</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
          @endif


        </section>




    </div>


    <div class="time container">
        <div class="card_group">
             <div class="card" style="display: flex; 
            justify-content: center; align-items: center;">
                <!--<img src="/home/images/map2.png" alt="">-->
            <!--<a href="#">See Directions</a>-->
                <div style="text-align: center;">
                    <p style="font-size: 18px; display: block;"><i class="fa fa-map-marker-alt"></i> Office Address</p>
                    <h2>Lorem Ipsum</h2>
                </div>
            </div>
            <div class="card">
                <h4>Opening Hours</h4>
                <p><span>Monday</span><span>10:00 - 15:00</span></p>
                <p><span>Tuesday</span><span>10:00 - 15:00</span></p>
                <p><span>Wednesday</span><span>10:00 - 15:00</span></p>
                <p><span>Thursday</span><span>10:00 - 15:00</span></p>
                <p><span>Friday</span><span>10:00 - 15:00</span></p>
                <p><span>Saturday</span><span>10:00 - 15:00</span></p>
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
            $(".report-modal").css("z-index", "999999");
          });
          $(".close-modal").click(function () {
            $(".report-modal").css("display", "none");
          });
        //   ------------------------------
          $("#connect").click(function () {
            $(".connect-modal").css("display", "flex");
            $(".connect-modal").css("z-index", "999999");
          });
          $(".close-modal").click(function () {
            $(".connect-modal").css("display", "none");
          });

      });

</script>
</body>

</html>
