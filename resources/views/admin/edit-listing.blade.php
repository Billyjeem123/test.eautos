@extends('admin.layouts.master')

@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h1 class="h3 text-gray-800">Edit Listing</h1>
            <span class="py-2 px-4 bg-white text-dark rounded">Edit Record</span>
        </div>
        <form class="p-3"   method="POST"   enctype="multipart/form-data"  action="{{route('admin.vehicle.update')}}">
            @csrf
            <div class="d-flex justify-content-start align-items-center">
                <h5 class="h5">Property Record</h5>

            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <select id="category" class="form-control bg-white" name="category_id">
                        <option  selected>Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $item->catname }}
                                </option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <select id="subcategory" class="form-control bg-white" name="sub_category_id">
                        <!-- Subcategory options will be populated dynamically -->
                    </select>
                </div>


            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-6">

                    <select id="brand" class="form-control bg-white" name="brand_id">
                        <option  selected>Select Brand  </option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $product->brand_id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>


                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Model" id="year" name="model" value="{{$product->id}}">
                </div>

            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control bg-white" placeholder="Mileage" id="mileage"  name="mileage" value="{{$product->mileage}}">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control bg-white" placeholder="Cylinders" name="cylinder" value="{{$product->cylinder}}">
                </div>
                <div class="form-group col-md-5 d-flex">
                    <select id="color" class="form-control bg-white" name="color">
                        <option value="" selected>Select color</option>
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                        <option value="Silver">Silver</option>
                        <option value="Ash">Ash</option>
                        <option value="Gray">Gray</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                        <option value="Purple">Purple</option>
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
                        <!-- Add all other color options here -->
                    </select>
                </div>

                <script>
                    // Set the product's color
                    var productColor = "{{ $product->color }}";

                    // Function to set the selected option based on the product's color
                    function setProductColor() {
                        var colorSelect = document.getElementById("color");
                        for (var i = 0; i < colorSelect.options.length; i++) {
                            if (colorSelect.options[i].value === productColor) {
                                colorSelect.selectedIndex = i;
                                break;
                            }
                        }
                    }

                    // Call the function to set the product's color
                    setProductColor();
                </script>

            </div>
            <h5 class="h5 mb-2">Address Details</h5>

            <div class="form-row justify-content-between mb-3">
                <div class="form-group col-md-6">
                    <select id="state" class="form-control bg-white" name="location">
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


                    <script>
                        // Set the selected state
                        var selectedState = "{{ $product->location }}";

                        // Function to set the selected option based on the selected state
                        function setSelectedState() {
                            var stateSelect = document.getElementById("state");
                            for (var i = 0; i < stateSelect.options.length; i++) {
                                if (stateSelect.options[i].value === selectedState) {
                                    stateSelect.selectedIndex = i;
                                    break;
                                }
                            }
                        }

                        // Call the function to set the selected state
                        setSelectedState();
                    </script>
                </div>




                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Area" id="price" name="address" value="{{$product->address}}">
                </div>
            </div>



            <h5 class="h5 mb-2">Pricing Details</h5>
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Price" id="price" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Car name" id="price" name="car_name" value="{{$product->car_name}}">
                </div>

            </div>
            <div class="form-check my-3">
                <input type="checkbox" class="form-check-input" id="installment" name="installment" {{ $product->is_installemt == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="installment">Installment Payment</label>
            </div>

            <h5 class="h5 mb-2">Property Info <span class="small">(Please tick the available ones for your
        property)</span></h5>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="deed" name="deed" {{ $product->deed == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="deed">Deed</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="receipt" name="car_receipt"  {{ $product->car_receipt == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="receipt">Car Receipt</label>
            </div>
            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" id="document" name="car_docs" {{ $product->car_docs == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="document">Car Document</label>
            </div>
            <h5 class="h5 mb-2">Description</h5>
            <div class="form-group mb-5">
      <textarea name="desc" class="form-control textarea bg-white" placeholder="Describe Your Property..."
                id="about-organization" cols="30" rows="5">{{$product->desc}}</textarea>
            </div>
            <div class="form-group">
                <input type="file" name="images[]"  class="form-control p-5  border-0" id="businessImage" multiple>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn border-primary text-primary m-2 px-sm-4">Save</button>
                <button type="submit" class="btn btn-primary m-2 px-sm-4">Submit</button>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Trigger change event when the document is ready
            $('#category').trigger('change');
            alert("shoe it")

            $('#category').change(function() {
                var categoryId = $(this).val(); // Get the selected category ID
                if (categoryId) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('admin/get-subcategories/') }}/' + categoryId,
                        success: function(data) {
                            $('#subcategory').empty(); // Clear the existing options
                            $('#stubcategory').append('<option selected disabled>Sub Category</option>');
                            $.each(data, function(key, value) {
                                $('#subcategory').append('<option value="' + key + '">' + value + '</option>');
                            });

                            // Select the appropriate subcategory based on $product->sub_cateory_id
                            var subcategoryId = "{{ $product->sub_category_id }}";
                            if (subcategoryId) {
                                $('#subcategory').val(subcategoryId).trigger('change');
                            }
                        }
                    });
                } else {
                    $('#subcategory').empty(); // Clear the subcategory select box if no category is selected
                    $('#subcategory').append('<option selected disabled>Sub Category</option>');
                }
            });
        });
    </script>


@endsection
