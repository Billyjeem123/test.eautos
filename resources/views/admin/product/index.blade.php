
@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h1 class="h3 text-gray-800">Post a Vehicle</h1>
            <span class="py-2 px-4 bg-white text-dark rounded">Sell your car</span>
        </div>
        <form id="vehicleForm" class="p-3" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="d-flex justify-content-start align-items-center">
                <h5 class="h5">Property Details</h5>
                <div class="form-check px-5">
                    <input type="checkbox" class="form-check-input" id="installment" name="is_installemt">
                    <label class="form-check-label" for="installment">Auction Properties</label>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <select id="category" class="form-control bg-white" name="category_id" required>
                        <option  >Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->catname}}</option>

                        @endforeach

                    </select>
                </div>




                <div class="form-group col-md-6">
                    <select id="subcategory" class="form-control bg-white" name="sub_category_id" required>
                        <option  disabled>Sub Category</option>
                        <!-- Subcategory options will be populated dynamically -->
                    </select>
                </div>


            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-5">

                    <select id="brand" class="form-control bg-white" name="brand_id" required>
                        <option  selected>Select Brand  </option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>

                        @endforeach

                    </select>



                </div>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control bg-white" placeholder="Model" id="year" name="model" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control bg-white" placeholder="Year" id="year" name="year" required>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control bg-white" placeholder="Milage" id="milage"  name="mileage" required>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control bg-white" placeholder="Cylinders" name="cylinder" required>
                </div>
                <div class="form-group col-md-5 d-flex">
                    <select id="color" class="form-control bg-white" name="color" required>
                        <option value=""  selected>Select color</option>
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                        <option value="Silver">Silver</option>
                        <option value="Ash">Ash</option>
                        <option value="Gray">Gray</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                        <option value="Brown">Brown</option>
                        <option value="Beige">Beige</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Orange">Orange</option>
                        <option value="Gold">Gold</option>
                        <option value="Metallic">Metallic</option>
                        <option value="Pearl">Pearl</option>
                        <option value="Champagne">Champagne</option>
                        <option value="Bronze">Bronze</option>
                        <option value="Charcoal">Charcoal</option>
                        <option value="Midnight Blue">Midnight Blue</option>
                        <option value="Navy">Navy</option>
                        <option value="Burgundy">Burgundy</option>
                        <option value="Teal">Teal</option>
                        <option value="Maroon">Maroon</option>
                        <option value="Cream">Cream</option>
                        <option value="Tan">Tan</option>
                        <option value="Ivory">Ivory</option>
                        <option value="Slate">Slate</option>
                        <option value="Pewter">Pewter</option>
                        <option value="Gunmetal">Gunmetal</option>
                        <option value="Graphite">Graphite</option>
                        <option value="Ruby">Ruby</option>
                        <option value="Emerald">Emerald</option>
                        <option value="Sapphire">Sapphire</option>
                        <option value="Copper">Copper</option>
                        <option value="Mocha">Mocha</option>
                        <option value="Forest Green">Forest Green</option>
                        <option value="Arctic White">Arctic White</option>
                        <option value="Sky Blue">Sky Blue</option>
                        <option value="Electric Blue">Electric Blue</option>
                        <option value="Ice Silver">Ice Silver</option>
                        <option value="Dark Gray">Dark Gray</option>
                        <option value="Light Gray">Light Gray</option>
                        <option value="Rose Gold">Rose Gold</option>
                        <option value="Ocean Blue">Ocean Blue</option>
                        <option value="Candy Apple Red">Candy Apple Red</option>
                        <option value="Lemon Yellow">Lemon Yellow</option>
                        <option value="Racing Green">Racing Green</option>
                        <option value="Sandstone">Sandstone</option>
                        <option value="Tungsten">Tungsten</option>
                        <option value="Steel Blue">Steel Blue</option>
                        <option value="Deep Purple">Deep Purple</option>


                    </select>

                </div>
            </div>
            <h5 class="h5 mb-2">Address Details</h5>
            <div class="form-row justify-content-between mb-3">
                <div class="form-group col-md-6">
                    <select id="state" class="form-control bg-white" name="location" required>
                        <option selected disabled>Select state</option>
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


                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Area" id="price" name="address" required>
                </div>
            </div>
            <h5 class="h5 mb-2">Pricing Details</h5>
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Price" id="price" name="price" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Car name" id="price" name="car_name" required>
                </div>

            </div>
            <div class="form-check my-3">
                <input type="checkbox" class="form-check-input" id="installment" name="installment">
                <label class="form-check-label" for="installment">Installment Payment</label>
            </div>
            <h5 class="h5 mb-2">Property Info <span class="small">(Please tick the available ones for your
        property)</span></h5>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="deed" name="deed">
                <label class="form-check-label" for="deed">Deed</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="receipt" name="car_receipt">
                <label class="form-check-label" for="receipt">Car Receipt</label>
            </div>
            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" id="document" name="car_docs">
                <label class="form-check-label" for="document">Car Document</label>
            </div>
            <h5 class="h5 mb-2">Description</h5>
            <div class="form-group mb-5">
      <textarea name="desc" class="form-control textarea bg-white" placeholder="Describe Your Property..."
                id="about-organization" cols="30" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="images[]"  class="form-control p-5  border-0" id="businessImage" multiple required>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="button" id="saveButton" class="btn border-primary text-primary m-2 px-sm-4">Save</button>
                <button type="button" id="submitButton" class="btn btn-primary m-2 px-sm-4">Submit</button>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var categoryId = $(this).val(); // Get the selected category ID
                if (categoryId) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('admin/get-subcategories/') }}/' + categoryId,
                        success: function(data) {
                            $('#subcategory').empty(); // Clear the existing options
                            $('#subcategory').append('<option selected disabled>Sub Category</option>');
                            $.each(data, function(key, value) {
                                $('#subcategory').append('<option value="' + key + '" >' + value + '</option>');

                            });
                        }
                    });
                } else {
                    $('#subcategory').empty(); // Clear the subcategory select box if no category is selected
                    $('#subcategory').append('<option selected disabled>Sub Category</option>');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function submitForm(event) {
                event.preventDefault();

                var form = document.getElementById('vehicleForm');
                var formData = new FormData(form);
                var submitBtn = event.target;

                // Check if all fields are filled
                var formFields = form.querySelectorAll('input, textarea, select');
                var isValid = true;

                formFields.forEach(function(field) {
                    if (field.required && !field.value.trim()) {
                        isValid = false;
                    }
                });

                if (!isValid) {
                    toastr.error('Please fill in all fields.');
                    return
                }

                // Change button text to 'Processing...' and disable it
                submitBtn.innerHTML = 'Processing...';
                submitBtn.disabled = true;

                fetch("{{ route('create_product_admin') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            toastr.success('Blog post uploaded successfully.');
                            form.reset();
                        } else {
                            toastr.error('An error occurred while uploading the blog post.');
                        }
                    })
                    .catch(error => {
                        toastr.error('An error occurred: ' + error.message);
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        // Reset button text to 'Submit' and enable it
                        submitBtn.innerHTML = 'Submit';
                        submitBtn.disabled = false;
                    });
            }

            document.getElementById('saveButton').addEventListener('click', submitForm);
            document.getElementById('submitButton').addEventListener('click', submitForm);
        });
    </script>






@endsection
