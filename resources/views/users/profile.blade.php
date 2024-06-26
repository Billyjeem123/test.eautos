@extends('users.layouts.master')

<style>
    body {
        overflow-y: scroll;
    }

</style>


@section('page.content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Hello {{$profile->name}}</h1>
        <h6 class="h6 mb-4 text-gray-800">Joined  {{$profile->created_at->format('M, Y')}}</h6>
        <div class="container bg-gray-200 py-4 rounded">
            <div class="d-flex justify-content-center py-3">
                <a class="btn rounded-0 px-sm-5 bg-primary" id="profileBtn" href="javascript:void(0)" style="color: #ffffff;">My
                    Profile</a>
                <a class="btn rounded-0 px-sm-5" href="javascript:void(0)" id="editProfileBtn" style="color: #000000;">Edit
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
            <form class="" id="editProfile" style="display: none;"  action="{{route('update.profile.user')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control bg-white" placeholder="First Name" name="name" value="{{$profile->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control bg-white" placeholder="Email" name="email"  value="{{$profile->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control bg-white" placeholder="Business Name" name="business_name" value="{{$profile->business_name}}">
                </div>
                <div class="form-group">
                    <label for="businessImage">Upload Business Image</label>
                    <input type="file" class="form-control border-0" name="profile_image">
                </div>

                <h3 class="h4 border-top border-bottom mb-3 py-2">Contact Information</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control bg-white" placeholder="Country" name="business_state" value="{{$profile->business_state}}">
                    </div>

                    <div class="form-group col-md-6">
                        <input type="text" class="form-control bg-white" placeholder="Phone Number" name="phone" value="{{$profile->phone}}">
                    </div>

                </div>

                <h3 class="h4 border-top border-bottom mb-3 py-2">About Your Organization</h3>
                <div class="form-group">
                <textarea name="about" class="form-control textarea bg-white" placeholder="About Your Organization"
                          id="about-organization" cols="30" rows="5">{{$profile->about}}</textarea>
                </div>


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
</script>





<script>
    document.addEventListener("DOMContentLoaded", function() {
        var addButton = document.getElementById("addButton");
        addButton.addEventListener("click", function() {
            var inputVal = document.getElementById("businessCategoryInput").value.trim();
            if (inputVal !== '') {
                // Append input value to the hidden input field as an array element
                var hiddenInput = document.getElementById("businessCategoryWords");
                var inputValue = document.createElement("input");
                inputValue.setAttribute("type", "hidden");
                inputValue.setAttribute("name", "businessCategoryWords[]");
                inputValue.setAttribute("value", inputVal);
                hiddenInput.appendChild(inputValue);

                // Create button for the entered word
                var newButton = document.createElement("button");
                newButton.setAttribute("type", "button");
                newButton.setAttribute("class", "btn btn-secondary mr-2");
                newButton.textContent = inputVal;

                // Create delete button
                var deleteButton = document.createElement("button");
                deleteButton.setAttribute("type", "button");
                deleteButton.setAttribute("class", "btn btn-danger ml-2");
                deleteButton.textContent = "Delete";
                deleteButton.addEventListener("click", function() {
                    this.parentNode.remove(); // Remove the parent (the button itself)
                    // Remove the deleted word from the hidden input field
                    hiddenInput.removeChild(inputValue);
                });

                // Create container for the buttons
                var buttonContainer = document.createElement("div");
                buttonContainer.setAttribute("class", "mb-2");
                buttonContainer.appendChild(newButton);
                buttonContainer.appendChild(deleteButton);

                var businessCategoryButtons = document.getElementById("businessCategoryButtons");
                businessCategoryButtons.appendChild(buttonContainer);

                document.getElementById("businessCategoryInput").value = ''; // Clear the input box
            }
        });
    });
</script>





