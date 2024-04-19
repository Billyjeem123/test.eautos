<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Value Asset</title>
    <link rel="stylesheet" href="/home/css/value.css" />
</head>

<body>
@include('home.includes.nav')
<div class="car_type_nav">
    <ul>
        <li class="option">Menu <i class="fa fa-angle-down"></i></li>
        <li><a href="{{route('index')}}">Home</a></li>

        <li>
            <a href="{{ route('value.vehicle') }}" class="{{ request()->routeIs('value.vehicle') ? 'active' : '' }}">Value Asset</a>
        </li>
        <li><a href="sell.html">Sell A Car</a></li>
        <li><a href="auction.html">Auction</a></li>
        <li><a href="parts.html">Car Parts</a></li>
        <li><a href="stolenCars.html">Stolen Cars</a></li>
        <li><a href="blacklist.html">Blacklist</a></li>
    </ul>
</div>
<header class="hero">
    <h1>Get Your <span>Values Worth</span></h1>
</header>
<!-- ---------------------------- -->
<main>
    <div class="main-nav">
        <h3>Select Car Type</h3>
        <ul>
            <li style="margin-bottom: 5px;margin-right: 5px;">
                <input type="radio" id="new" name="car_type" value="New" style="margin-right: 5px;" required>
                <label for="new">New</label>
            </li>
            <li style="margin-bottom: 5px;margin-right: 5px;">
                <input type="radio" id="foreign" name="car_type" value="Foreign" style="margin-right: 5px;">
                <label for="foreign">Foreign</label>
            </li>
            <li style="margin-bottom: 5px;margin-right: 5px;">
                <input type="radio" id="locally_used" name="car_type" value="Locally Used" style="margin-right: 5px;">
                <label for="locally_used">Locally Used</label>
            </li>
        </ul>
    </div>



    <script>
        // Get all radio buttons with name "car_type"
        const radioButtons = document.querySelectorAll('input[name="car_type"]');

        // Add event listener to each radio button
        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', function() {
                // Get the value of the selected radio button
                const selectedValue = this.value;

                // Set the value of the text input to the selected value
                document.getElementById('selected_car_type').value = selectedValue;
            });
        });
    </script>




    <!-- ----------------------------------------------------- -->
        <form action="{{route('value.asset')}}"  method="POST"  enctype="multipart/form-data">
            @csrf
            <h3>Upload Display Image</h3>
            <div class="form-control-file">
                <label for="file">Choose a file</label>
                <input type="file"  name="images[]" multiple id="file" />
            </div>
            <h3>Car Information</h3>
            <div class="form-group">
                <div class="form-control">
                    <label for="brand">Brand</label>
                    <select name="brand" id="brand">
                        <option value="" selected disabled>Select Car Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}" {{ old('brand') == $brand->name ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-control">
                    <label for="model">Model</label>
                    <input type="text" name="model" placeholder="Enter Model" class="form-group" style="width: 300px; border-radius: 5px" required value="{{ old('model') }}">

                </div>
                <div class="form-control">
                    <label for="color">Color</label>
                    <input type="text" name="color"  placeholder="Enter Car Color" class="form-group" style="width: 300px;border-radius: 5px" required>
                </div>
                <div class="form-control">
                    <label for="color">Mileage</label>
                    <input type="text" name="mileage"  placeholder="Enter Mileage" class="form-group" style="width: 300px;border-radius: 5px" required>
                </div>
                <div class="form-control">
                    <label for="color">Engine Type</label>
                    <input type="text" name="engine_type"  placeholder="Enter Type" class="form-group" style="width: 300px;border-radius: 5px" required>
                </div>
            </div>
            <h3>More of Car Image</h3>
            <div class="form-control-file">
                <label for="file">
                    <i class="fa fa-plus-circle" style="font-size: 20px;"></i><br>
                    Add More Images</label>
                <input type="file"  name="additional_images[]" multiple id="file" />
            </div>

            <h3>Legal Information</h3>
            <div class="form-group">
                <div class="form-control">
                    <label for="tender">Legal Tender</label>
                    <div><input type="text" id="tender" placeholder="Legal Tender">
                        <input type="file" name="legalDocs[]" accept=".pdf,.doc,.docx" required multiple>

                    </div>
                </div>
    {{--            <div class="form-control">--}}
    {{--                <label for="tender">Legal Tender</label>--}}
    {{--                <div><input type="text" id="tender" placeholder="Legal Tender">--}}
    {{--                    <input type="file">--}}
    {{--                </div>--}}
    {{--            </div>--}}
            </div>
            <input type="hidden" id="selected_car_type" name="selected_car_type" value="" readonly>
            <div class="form-control">
                <label for="">Description</label>
                <textarea name="desc" id="" cols="30" rows="10" required></textarea>
            </div><br><br>
            <div class="form-control agree" style="flex-direction: row; gap: 2px !important;">
                <input type="checkbox" id="agree" style="cursor: pointer;" required>
                <label for="agree" style="text-decoration: underline; font-weight: bold; font-size: 12px; cursor: pointer;">Agree to Terms and Conditions</label>
            </div>
            <button type="submit">Submit</button>
        </form>
</main>

@include('home.includes.footer')

<script>
    $(document).ready(function () {
        // -------------------------------------
        $height = $(".car_type_nav").height() + $(".navbar").height();
        $(window).scroll(function () {
            if ($(window).scrollTop() > $height) {
                $(".car_type_nav").css({
                    position: "fixed",
                    top: "3.9rem",
                    left: "0",
                    "z-index": "9999",
                });
            } else {
                $(".car_type_nav").css({
                    position: "normal",
                    top: "normal",
                });
                $("header").css("padding-top", "5rem");
            }
        });
    });
</script>
</body>
</html>
