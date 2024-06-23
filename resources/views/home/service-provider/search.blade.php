<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Providers</title>
    <link rel="stylesheet" href="/home/css/carService.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .no-records {
            text-align: center;
            margin: 20px;
            color: #ff0000; /* Example color for visibility */
        }

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

    <div class="form_control">
        <form action="{{ route('provider.all') }}" method="GET">
            <h3>Search For Car Service Providers</h3>
            <div class="form_group">
                <div class="form_card">
                    <label for="category"><i class="fa fa-angle-down"></i></label>
                    <select name="category" id="category">
                        <option value="" selected disabled>Select Service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->service_list }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form_card">
                    <label for="location"><i class="fa fa-angle-down"></i></label>
                    <select name="location" id="location">
                        <option disabled selected>Select State</option>
                        <option>Abia</option>
                        <option>Adamawa</option>
                        <option>Akwa Ibom</option>
                        <option>Anambra</option>
                        <option>Bauchi</option>
                        <option>Bayelsa</option>
                        <option>Benue</option>
                        <option>Borno</option>
                        <option>Cross River</option>
                        <option>Delta</option>
                        <option>Ebonyi</option>
                        <option>Edo</option>
                        <option>Ekiti</option>
                        <option>Enugu</option>
                        <option>Gombe</option>
                        <option>Imo</option>
                        <option>Jigawa</option>
                        <option>Kaduna</option>
                        <option>Kano</option>
                        <option>Katsina</option>
                        <option>Kebbi</option>
                        <option>Kogi</option>
                        <option>Kwara</option>
                        <option>Lagos</option>
                        <option>Nasarawa</option>
                        <option>Niger</option>
                        <option>Ogun</option>
                        <option>Ondo</option>
                        <option>Osun</option>
                        <option>Oyo</option>
                        <option>Plateau</option>
                        <option>Rivers</option>
                        <option>Sokoto</option>
                        <option>Taraba</option>
                        <option>Yobe</option>
                        <option>Zamfara</option>
                        <option>Federal Capital Territory (FCT)</option>
                    </select>
                </div>
            </div>
            <button type="submit">Get Instant Valuation</button>
        </form>

    </div>
</header>

<!-- -------------------------------------------------- -->

@if ($noRecordsFound)
    <div class="no-records">
        <h1>No records found</h1>
    </div>
@else
    @foreach ($businessServiceLists as $service)
        <div class="mechanics container">
            <h3><span>Popular {{ $service->service_list }}</span> <a href="">View All ({{ $service->users->count() }})</a></h3>
            <div class="card_group">
                @foreach ($service->users as $user)
                    <div class="card">
                        <a href="{{ route('user.profile', $user->id) }}">
                            <div class="card_img" style="background: url('{{ !empty($user->image) ? $user->image : 'https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png' }}') no-repeat;">
                                <p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>
                            </div>
                        </a>
                        <div class="card_text">
                            <h5>{{ $user->name }}</h5>
                            <p>{{ $user->businessServiceLists[0]['service_list'] ?? 'Specialization not provided' }}</p>
                            <h6>{{ $user->business_state ?? 'Location not provided' }}</h6>
                            <h6 class="ratings">
                                <span class="star">
                                    @for ($i = 0; $i < $user->bussiness_reviews->count(); $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @for ($i = $user->bussiness_reviews->count(); $i < 5; $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                </span>
                                &nbsp;
                                <span>({{ $user->bussiness_reviews->count() ?? 0 }})</span>
                            </h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endif


@include('home.includes.footer')
</body>

</html>
