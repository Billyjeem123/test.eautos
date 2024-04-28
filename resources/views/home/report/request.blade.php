<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Car</title>
    <link rel="stylesheet" href="/home/css/request_form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
@include('home.includes.nav')

<main>
    <div class="form-control">
        <h2>REQUEST FORM</h2>
        <div>

            <form action="{{route('save-request')}}" method="POST">
          <span class="form_group">
            <select name="brand" id="">
               <option value="" selected disabled>Select Cars</option>
                @foreach($brands as $brand)
                    <option value="{{$brand->name}}">{{$brand->name}}</option>
                @endforeach

            </select>
          </span>

                @csrf
                <span class="form_group">
            <input type="text" name="model" id=""  placeholder="Model" required>
                    <input type="text" name="budget" id=""  placeholder="Budget" required>
              </span>

                <textarea name="body" id="" cols="30" rows="5" placeholder="Further Information (Optional)" required></textarea>
                <h2>...</h2>
                <input type="text" placeholder="Name" name="name" value="{{ auth()->check() ? auth()->user()->name : '' }}" required>

                <span class="form_group">
            <input type="text" placeholder="Country" name="country" required>
            <input type="text" name="phone_number" placeholder="Phone Number" value="{{ auth()->check() ? auth()->user()->phone : '' }}" required>
            <input type="text" placeholder="Email Address" value="{{ auth()->check() ? auth()->user()->email : '' }}" required>

          </span>
                <button id="login">Send Request</button>
            </form>
        </div>
    </div>

</main>


<footer>
    <div class="card_group">
        <div class="card">
            <h6>About</h6><br>
            <p>Lorem ipsum dolor sit amet consectetur. Ullamcorper bibendum diam sapien faucibus. Dolor in nibh malesuada
                pharetra aenean eu rhoncus. Non tortor sagittis metus vitae nunc. Varius congue faucibus lacus pharetra nisl
                risus. Bibendum integer fringilla id ante fusce varius eget.</p><br><br>
            <a href="#!">Learn More</a>
        </div>
        <div class="card">
            <h6>Services</h6>
            <nav class="footer_nav">
                <ul class="">
                    <li><a href="cars/index.html">Cars</a></li>
                    <li><a href="bikes/index.html">Bikes</a></li>
                    <li><a href="trucks/index.html">Trucks</a></li>
                    <li><a href="farm/index.html">Farms</a></li>
                    <li><a href="plants/index.html">Plants</a></li>

                    <li><a href="#!">Valuation</a></li>

                    <li><a href="#!">Blacklist</a></li>
                </ul>
                <ul class="">
                    <li><a href="#!">Privacy Police</a></li>
                    <li><a href="#!">Terms and Conditions</a></li>
                    <li><a href="#!">FAQs</a></li>
                    <li><a href="#!">Contact Us</a></li>
                </ul>
            </nav>

        </div>
        <!-- <div class="card">

        </div> -->
        <div class="card">
            <h6>Follow us</h6>
            <div class="socials">
                <a href="#!"><i class="fab fa-facebook"></i></a>
                <a href="#!"><i class="fab fa-square-instagram"></i></a>
                <a href="#!"><i class="fab fa-linkedin"></i></a>
                <a href="#!"><i class="fab fa-square-x-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>

<script src="assets/fontawesome/js/all.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/index.js"></script>
</body>

</html>
