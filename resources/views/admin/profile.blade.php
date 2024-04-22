@extends('admin.layouts.master')




@section('page.content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Hello {{$profile->name}}</h1>
        <h6 class="h6 mb-4 text-gray-800">Joined  {{$profile->created_at->format('M, Y')}}</h6>
        <div class="container bg-gray-200 py-4 rounded">
            <div class="d-flex justify-content-center py-3">
                <a class="btn rounded-0 px-sm-5 bg-primary" id="profileBtn" href="#" style="color: #ffffff;">My
                    Profile</a>
                <a class="btn rounded-0 px-sm-5" href="#" id="editProfileBtn" style="color: #000000;">Edit
                    Profile</a>
            </div>
            <h3 class="h4 border-top border-bottom mb-3 py-2">My Profile</h3>
            <div class=" justify-content-center p-4 bg-white rounded" id="myProfile"
                 style="display: flex; width: fit-content;">
                <img src="{{ $profile->image == "" || empty($profile->image) ? "/img/undraw_profile.svg" : $profile->image }}" alt="" width="150px">

                <div class="px-3 font-weight-bold">
                    <p class="p-0 m-1 h5" style="color: #000000;">{{$profile->name}}</p>
                    <p class="p-0 m-1 h5" style="color: #000000;">{{$profile->phone}}</p>
                    <p class="p-0 m-1 h5" style="color: #000000;">Dial Code: 234</p>
                    <p class="p-0 m-1 h5" style="color: #000000;">{{$profile->email}}</p>
                </div>
            </div>
            <form class="" id="editProfile" style="display: none;">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control bg-white" placeholder="First Name" name="name" value="{{$profile->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control bg-white" placeholder="Email" name="email" disabled value="{{$profile->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control bg-white" placeholder="Business Name" name="bussiness_name" value="{{ $profile->name == NULL ? "" : $profile->name }}">
                </div>
                <div class="form-group">
                    <label for="businessImage">Upload Business Image</label>
                    <input type="file" class="form-control border-0" name="profile_image">
                </div>

                <h3 class="h4 border-top border-bottom mb-3 py-2">Contact Information</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <select id="country-code" class="form-control bg-white">
                            <option >Country Code</option>
                            <option selected>Nigeria</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control bg-white" placeholder="Phone Number" name="phone" value="{{$profile->phone}}">
                    </div>

                </div>

                <h3 class="h4 border-top border-bottom mb-3 py-2">About Your Organization</h3>
                <div class="form-group">
                <textarea name="about" class="form-control textarea bg-white" placeholder="About Your Organization"
                          id="about-organization" cols="30" rows="5" required></textarea>
                </div>
                <div class="form-group">
                <textarea name="organisation_services" class="form-control textarea bg-white"
                          placeholder="Services Your Organization Provides" id="services" cols="30" rows="5"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control bg-white" placeholder="Enter Bussiness State" name="bussiness_state" >
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control bg-white" placeholder="Address" name="address" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="businessCategoryInput" placeholder="Business Category">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="addButton">Add</button>
                        </div>
                    </div>
                </div>
                <div id="businessCategoryButtons"></div>


                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn border-primary text-primary m-2 px-sm-4">Cancel</button>
                    <button type="submit" class="btn btn-primary m-2 px-sm-4">Submit</button>
                </div>
            </form>

        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>

<!-- Custom scripts for all pages-->
<script src="/js/sb-admin-2.min.js"></script>
<script>
    $(document).ready(function () {
        $("#profileBtn").click(function () {
            $(this).addClass("bg-primary");
            $(this).css("color", "white");
            $("#editProfileBtn").css("color", "black");
            $("#editProfileBtn").removeClass("bg-primary");
            $("#editProfile").css("display", "none");
            $("#myProfile").css("display", "flex");
        });
        $("#editProfileBtn").click(function () {
            $(this).addClass("bg-primary");
            $(this).css("color", "white");
            $("#profileBtn").removeClass("bg-primary");
            $("#profileBtn").css("color", "black");
            $("#myProfile").css("display", "none");
            $("#editProfile").css("display", "block");
        });
    })

    document.addEventListener("DOMContentLoaded", function() {
        var addButton = document.getElementById("addButton");
        addButton.addEventListener("click", function() {
            var inputVal = document.getElementById("businessCategoryInput").value.trim();
            if (inputVal !== '') {
                var newButton = document.createElement("button");
                newButton.setAttribute("type", "button");
                newButton.setAttribute("class", "btn btn-secondary mr-2");
                newButton.textContent = inputVal;

                var businessCategoryButtons = document.getElementById("businessCategoryButtons");
                businessCategoryButtons.appendChild(newButton);

                document.getElementById("businessCategoryInput").value = ''; // Clear the input box
            }
        });
    });

</script>
