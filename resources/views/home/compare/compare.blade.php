<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/cars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
  .hero {
    width: 100%;
    min-height: 30vh;
    background: url(images/cars/Optimized-dima-panyukov-6bzyGhyVg6M-unsplash.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem;
    color: #ffffff;
  }

  .compare {
    width: 100%;
  }

  .c-row {
    max-width: 1200px;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: stretch;
    gap: 10px;
  }

  .c-row div {
    background-color: #f7f7f7;
    width: 35%;
    display: flex;
    justify-content: start;
    align-items: center;
    flex-direction: column;
    color: #000000;
    padding: 10px;
  }

  .add {
    height: 100px;
    justify-content: center !important;
    align-items: center;
    text-align: center;
  }

  .add a {
    padding: 10px 30px;
    background-color: #363636;
    text-decoration: none;
    color: #ffffff;
    border-radius: 5px;
  }

  #remove {
    margin-left: auto;
    padding: 5px 10px;
    background-color: #a80000;
    color: #fff;
    cursor: pointer;
    font-size: 10px;
  }

  .details-wrap {
    max-width: 1200px;
    margin: auto;
  }

  .compare .details {
    display: flex;
    justify-content: start;
    align-items: center;
    gap: 10px;
    padding: 1rem;
  }

  .compare .details div {
    background-color: #f7f7f7;
    width: 35%;
    min-height: 50px;
    display: flex;
    justify-content: start;
    align-items: center;
    color: #000000;
    padding: 10px;
  }

  .compare .details .title {
    font-weight: bold;
  }

  .add-modal {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    min-height: 100vh;
    background-color: #00000051;
    z-index: 99999;
    padding: 2rem 0;
    overflow-y: auto;
    display: none;
  }

  .modal {
    background-color: #ffffff;
    max-width: 1200px;
    padding: 2rem 1rem;
    margin: auto;
    position: relative;
  }

  .close-add-modal {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 5px 10px;
    background-color: red;
    color: #fff;
    cursor: pointer;
    font-weight: bolder;
    font-size: 13px;
  }
</style>

<body>

@include('home.includes.nav')

 <header class="hero">
    <h1>Compare</h1>
  </header>
  <main>

    <br><br>


    <div class="compare">
      <div class="c-row">
        <div class="add">
          <a id="open-add-modal" style="cursor: pointer;"><i class="fa fa-add"></i>&nbsp; Add</a>
        </div>
        <div>
          <a href="#" id="remove"><i class="fa fa-x"></i></a>
          <img src="/home/images/cars/bmw.png" width="100%" alt=""><br>
          <h3>Toyota</h3>
        </div>
        <div>
          <a href="#" id="remove"><i class="fa fa-x"></i></a>
          <img src="/home/images/cars/blue car.png" width="100%" alt=""><br>
          <h3>Toyota</h3>
        </div>
        <!-- <div class="img-1">
          <div class="img"
            style=" background: url(images/cars/Optimized-dhiva-krishna-YApS6TjKJ9c-unsplash.jpg) no-repeat;"></div>
        </div>
        <div class="img-1">
          <div class="img"
            style=" background: url(images/cars/Optimized-evgeny-tchebotarev-aiwuLjLPFnU-unsplash.jpg) no-repeat;">
          </div>
        </div> -->

      </div>
      <div class="details-wrap">
        <!-- ---- -->
        <div class="details">
          <div class="title">
            <p>Price</p>
          </div>
          <div>₦200,000</div>
          <div>₦900,000</div>
        </div>
        <!-- ------- -->
        <div class="details">
          <div class="title">
            <p>Car ID</p>
          </div>
          <div>df98998</div>
          <div>ko00909</div>
        </div>
        <!-- ------ -->
        <div class="details">
          <div class="title">
            <p>Status</p>
          </div>
          <div>New</div>
          <div>Fairly Used</div>
        </div>
        <!-- --------- -->
        <div class="details">
          <div class="title">
            <p>Engine Type</p>
          </div>
          <div>10 Cylinder</div>
          <div>8 Cylinder</div>
        </div>
        <!-- ----------- -->
        <div class="details">
          <div class="title">
            <p>Color</p>
          </div>
          <div>Yellow</div>
          <div>Green</div>
        </div>
        <!-- ----------- -->
        <div class="details">
          <div class="title">
            <p>Source</p>
          </div>
          <div>Gas</div>
          <div>Fuel</div>
        </div>
        <!-- ----------- -->
        <div class="details">
          <div class="title">
            <p>Date Posted</p>
          </div>
          <div>12/12/12</div>
          <div>12/12/12</div>
        </div>
        <!-- ----------- -->
        <div class="details">
          <div class="title">
            <p>C of O</p>
          </div>
          <div>No</div>
          <div>Yes</div>
        </div>
        <!-- ----------- -->
        <div class="details">
          <div class="title">
            <p>Essential Verified</p>
          </div>
          <div>No</div>
          <div>Yes</div>
        </div>
        <!-- ----------- -->
        <div class="details">
          <div class="title">
            <p>Number of views</p>
          </div>
          <div>700</div>
          <div>1,000</div>
        </div>
        <!-- ----------- -->
        <div class="details">
          <div class="title">
            <p>Location</p>
          </div>
          <div>Lagos (11 miles)</div>
          <div>Abuja (20 miles)</div>
        </div>
        <!-- ----------- -->
      </div>
    </div>
  </main>
  <div class="add-modal">
    <div class="modal">
      <a class="close-add-modal"><i class="fa-solid fa-x"></i></a>
      <div class="latest" style="margin: auto;">
        <div>
          <h3 style="text-align: center;">Select to compare</h3><br>
          <form action="" style="display: flex; border-radius: 50px; justify-content: space-between;
         padding: 5px 10px; align-items: center; max-width: 300px; background-color: #ececec; margin: auto;">
            <input type="text" placeholder="search"
              style="width: 85%; padding: 5px 10px;  border: none !important; outline: none !important; background-color: transparent;">
            <button style="padding: 10px; border: none !important; outline: none !important; cursor: pointer;"><i
                class="fa fa-magnifying-glass"></i></button>
          </form>
        </div>
        <br>

        <div class="card_group">
          <!-- ----- -->
          <div class="card">
            <div class="card_img"
              style="background: url(/home/images/cars/Optimized-campbell-3ZUsNJhi_Ik-unsplash.jpg) no-repeat;"></div>
            <div class="card_text">
              <h5>2014 Toyota Camry</h5>
              <small><em>Posted by: Perillo BNW - Joined 2 months ago</em></small>
              <div class="details">
                <ul>
                  <li>New</li>
                  <li>10 Cylinder</li>
                  <li style="background-color: #000000; border: none; color: #ffffff;">Black</li>
                  <li>Fuel</li>
                </ul>
                <h5>₦ 930,000</h5>
                <p>Lagos Nigeria (11 miles)</p>
              </div>
            </div>
            <div class="card_footer">
              <a href="#" style="text-decoration: none; padding: 10px 25px; 
              background: #d6d6d6; color: #000000; font-size: 13px;
               font-weight: bold;">Compare</a>
            </div>
          </div>
          <!-- --------- -->
          <div class="card">
            <div class="card_img"
              style="background: url(/home/images/cars/Optimized-dhiva-krishna-X16zXcbxU4U-unsplash.jpg) no-repeat;"></div>
            <div class="card_text">
              <h5>2014 Toyota Camry</h5>
              <small><em>Posted by: Perillo BNW - Joined 2 months ago</em></small>
              <div class="details">
                <ul>
                  <li>New</li>
                  <li>10 Cylinder</li>
                  <li style="background-color: #F9E17A; border: none; color: #ffffff;">Yellow</li>
                  <li>Fuel</li>
                </ul>
                <h5>₦ 930,000</h5>
                <p>Lagos Nigeria (11 miles)</p>
              </div>
            </div>
            <div class="card_footer">
              <a href="#" style="text-decoration: none; padding: 10px 25px; 
              background: #d6d6d6; color: #000000; font-size: 13px;
               font-weight: bold;">Compare</a>
            </div>
          </div>
          <!-- --------- -->
          <div class="card">
            <div class="card_img"
              style="background: url(/home/images/cars/Optimized-joshua-koblin-eqW1MPinEV4-unsplash.jpg) no-repeat;"></div>
            <div class="card_text">
              <h5>2014 Toyota Camry</h5>
              <small><em>Posted by: Perillo BNW - Joined 2 months ago</em></small>
              <div class="details">
                <ul>
                  <li>New</li>
                  <li>10 Cylinder</li>
                  <li style="background-color: red; border: none; color: #ffffff;">Red</li>
                  <li>Fuel</li>
                </ul>
                <h5>₦ 930,000</h5>
                <p>Lagos Nigeria (11 miles)</p>
              </div>
            </div>
            <div class="card_footer">
              <a href="#" style="text-decoration: none; padding: 10px 25px; 
              background: #d6d6d6; color: #000000; font-size: 13px;
               font-weight: bold;">Compare</a>
            </div>
          </div>
          <!-- --------- -->


        </div>
      </div>
    </div>
  </div>


@include('home.includes.footer')

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
          // ---------------------------------------------------------------------------
      $("#open-add-modal").on("click", function () {
          $(".add-modal").css({
            display: "block",
            "z-index": "99999",
          });
      });
      $(".close-add-modal").on("click", function () {
          $(".add-modal").css({
            display: "none",
            "z-index": "0",
          });
      });
      // ---------------------------------------------------------------------------
    });

</script>


</body>
</html>
