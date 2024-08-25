@extends('users.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h1 class="h3 text-gray-800">Request Verification</h1>
        </div>

        <form class="p-4" action="{{route('user.verify.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Informative Note -->
            <div class="alert alert-info" role="alert">
                <strong>Note:</strong> Upon successful verification, a badge will be added to your profile.
            </div>

            <!-- Form Header -->
            <h3 class="mb-4 text-primary">User Verification Form</h3>

            <!-- Personal Information Section -->
            <h5 class="mb-3">Primary Information</h5>
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Full Name" id="fullName" name="full_name" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="National Identity Number (NIN)" id="nin" name="nin" required>
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Tax Identification Number (TIN)" id="tin" name="tin" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control bg-white" placeholder="Business Registration Number" id="businessReg" name="business_reg" required>
                </div>
            </div>

            <!-- File Upload Section -->
            <h5 class="mb-3">Document Upload</h5>
            <div class="form-group mb-4">
                <label for="ninDocument">Upload National Identity Card:</label>
                <input type="file" name="nin_document" class="form-control p-2 border-0" id="ninDocument" required>
            </div>
            <div class="form-group mb-4">
                <label for="tinDocument">Upload Tax Identification Certificate:</label>
                <input type="file" name="tin_document" class="form-control p-2 border-0" id="tinDocument" required>
            </div>
            <div class="form-group mb-4">
                <label for="businessCert">Upload Business Registration Certificate:</label>
                <input type="file" name="business_certificate" class="form-control p-2 border-0" id="businessCert" required>
            </div>

            <!-- Optional Description Section -->
            <h5 class="mb-3">Additional Information</h5>
            <div class="form-group mb-4">
                <textarea name="description" class="form-control bg-white" placeholder="Provide any additional information (optional)..." id="additionalInfo" cols="30" rows="4"></textarea>
            </div>

            <!-- Submit Buttons -->
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn border-primary text-primary m-2 px-sm-4">Save</button>
                <button type="submit" class="btn btn-primary m-2 px-sm-4">Submit for Verification</button>
            </div>
        </form>


    </div>
    <!-- /.container-fluid -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



@endsection
