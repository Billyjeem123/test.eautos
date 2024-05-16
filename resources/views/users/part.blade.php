@extends('users.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h1 class="h3 text-gray-800">Upload Car Part</h1>
            <span class="py-2 px-4 bg-white text-dark rounded">Upload car part</span>
        </div>
        <form class="p-3" method="POST"   enctype="multipart/form-data"  action="{{route('save_parts')}}">
            @csrf


            <div class="form-row mb-6">
                <div class="form-group col-md-12">
                    <select id="state" class="form-control bg-white" name="part_category_id" required>
                        <option selected disabled>Select Category</option>
                        @foreach($partcategories as $categories)

                            <option value="{{$categories->id}}">{{$categories->part_category}}</option>

                        @endforeach

                    </select>

                </div>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control bg-white" placeholder="Enter Name or Title" id=""  name="part_name" required>
                </div>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control bg-white" placeholder="Enter Price" name="price" required>
                </div>

            </div>
            <div class="form-row justify-content-between mb-3">
                <div class="form-group col-md-12">
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


                <div class="form-group col-md-12">
                    <input type="file" class="form-control bg-white" placeholder="Area" id="price" name="image" required>
                </div>


                <div class="form-group col-md-12">
                    <textarea  id="" cols="30" rows="10" name="description" placeholder="Enter Part Description" class="form-control" required></textarea>
                </div>
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
            $('#category').change(function() {
                var categoryId = $(this).val(); // Get the selected category ID
                if (categoryId) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('users/get-subcategories/') }}/' + categoryId,
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



@endsection


