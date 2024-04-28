<marquee
    onmouseover="stop()"
    onmouseout="start()"
    scrollamount="20"
    class="marquee"
    style="display: flex; background-color: #3b3838; padding: 5px"
>
    <ul
        style="
          width: 100%;
          list-style: none;
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 30px;
        "
    >
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="/home/images/countries/United Kingdom (GB).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">EUR</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="/home/images/countries/Nigeria (NG).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="/home/images/countries/India (IN).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">INR</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="i/home/mages/countries/Nigeria (NG).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="/home/images/countries/China (CN).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">CHI</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="/home/images/countries/Nigeria (NG).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="/home/images/countries/South Africa (ZA).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">SHR</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="/home/images/countries/Nigeria (NG).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="/home/images/countries/Japan (JP).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">JPN</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="/home/images/countries/Nigeria (NG).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="/home/images/countries/Ghana (GH).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">GHN</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="/home/images/countries/Nigeria (NG).png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
    </ul>
</marquee>

<nav class="navbar">
    <a href="{{route('index')}}" class="logo">Logo</a>
    <ul>
        @foreach($categories as $category)
            @if($category->subcategories->count() > 0)
                <li>
                    <a href="{{ route('category.product', $category->id) }}"
                           class="{{ isset($categoryName) && $categoryName == $category->catname ? 'active' : '' }}
">
                        {{ $category->catname }}


                    </a>
                </li>

            @endif
        @endforeach



        <li><a href="javascript:void(0)">Car Service</a></li>
      <li><a href="{{route('scrapy-yard')}}">Scrapyard</a></li>
            <li>
                <a href="{{ route('value.vehicle') }}" class="{{ request()->routeIs('value.vehicle') ? 'active' : '' }}">Value Asset</a>
            </li>

            <li>
                <a href="{{ route('parts') }}" class="{{ request()->routeIs('parts') ? 'active' : '' }}">Car Part</a>
            </li>

    </ul>

    <style>
        #profile {
            position: relative;
            z-index: 99;
            /*background-color: #fff;*/
            /*min-width: 100px;*/
        }
        #profile ul {
            display: none;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 5px 0;
            position: absolute;
            left: 0;
            right: 0;
            width: 100%;
            top: 1.2rem;
            background-color: #fff;

        }
        #profile ul li a {
            padding: 5px 10px !important;
            margin: 0;
            font-weight: lighter;
            color: #333;
            display: flex !important;
            justify-content: center;
            align-items: center;
            width: 100px !important;
            font-size: 13px;
            transition: background-color 0.3s;
        }

        #profile:hover ul {
            display: block;
        }
        #profile:hover ul {
            display: flex;
        }
        #profile ul li a:hover {
            background-color: #f0f0f0;
        }

    </style>



    @if (!auth()->check())
        <span class="nav_form">
        <a href="{{ route('register') }}" class="signUp">Sign Up</a>
        <a href="{{ route('login') }}" class="login">Login</a>
    </span>
    @endif

    <!--Profile Menu-->

    <!--Profile Menu-->

    @if (auth()->check())
        <span class="profile" id="profile">
        <span
            style="
                margin: auto;
                font-size: 20px;
                color: #394293;
                text-align: center;
                display: flex;
                width: fit-content;
            "
        >
            <i class="fa fa-user-circle"></i>
        </span>
        <ul>
            <li><a href="#">Logout</a></li>
            <li><a href="#">Dashboard</a></li>
        </ul>
    </span>
    @endif



    <i class="fa fa-close" id="close_nav"></i>
    <i class="fa fa-bars" id="open_nav"></i>
  </nav>
