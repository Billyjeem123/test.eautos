<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Providers</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/carService.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
    header{
    width: 100%;
    min-height: 30vh;
    background: url(/images/parts/black%20speedometer.png) no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem;
    color: #ffffff;
}
        .pagination-section ul.pagination {
            margin: 0;
        }

        .pagination-section ul.pagination li.page-item {
            display: inline-block;
            margin-right: 5px;
        }

        .pagination-section ul.pagination li.page-item a.page-link {
            color: #000000;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #000000;
            border-radius: 3px;
        }

        .pagination-section ul.pagination li.page-item a.page-link:hover {
            background-color: #000000;
            color: #fff;
        }

        .pagination-section ul.pagination li.page-item.active a.page-link {
            background-color: #000000;
            color: #fff;
            border-color: #000000;
        }

    </style>
</head>

<body>
@include('home.includes.nav')
<header>
<div>
    <h1 style="color: #ffffff; text-align: center;">Vaulcanizers</h1><br>
  <div>
          <h3 style="text-align: center;"></h3><br>
          <form action="" style="display: flex; border-radius: 50px; justify-content: space-between;
         padding: 5px 10px; align-items: center; max-width: 500px; background-color: #ececec; margin: auto;">
            <input type="text" placeholder="search"
              style="width: 85%; padding: 5px 10px;  border: none !important; outline: none !important; background-color: transparent;">
            <button style="padding: 10px; border: none !important; outline: none !important; cursor: pointer;"><i
                class="fa fa-magnifying-glass"></i></button>
          </form>
        </div>
</div>
</header>

<!-- ----------------------------------------------------- -->
 <div class="mechanics container">
    <!--<h3><span>Popular Mechanics</span></h3>-->
    <div class="card_group">
      <a href="#" class="card" style="text-decoration: none; color: #000000;">
        <div class="card_img" style="background: url(/home/images/people/b\ and\ w.png) no-repeat;">
             <span style="display: block; text-align: end;"><img src="https://img.icons8.com/?size=48&id=98A4yZTt9abw&format=png" width="30px" /></span>
          <!--<p class="verify"><span><i class="fa fa-check"></i></span> Verified</p>-->
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
      </a>
    </div>
   
   <!--Pagination-->
  
  </div>
<!-- ----------------------------------------- -->

@include('home.includes.footer')
</body>

</html>
