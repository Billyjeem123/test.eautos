@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Stolen Cars</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>List of Categories</a> -->
        </div>

        <!-- Content Row -->
        <div class="py-5 px-md-2">

            <div class="row justify-content-between">
                <div class="col-lg-12 bg-gray-200 p-3 rounded mb-3">
                    <h5 class="h4">Add Items</h5>
                    <form action="{{route('admin.stolen.create')}}" class="d-flex flex-column" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            @csrf

                            <div class="form-group col-md-12">
                                <input type="text" name="car_name" class="form-control bg-white" placeholder="Enter Car name" id="title" required>
                            </div>

                            <div class="form-group col-md-12">
                                <input type="text" name="last_seen" class="form-control bg-white" placeholder="Enter Last Address" id="title" required>
                            </div>

                            <div class="form-group col-md-12">
                                <input type="text" name="color" class="form-control bg-white" placeholder=" Enter Color" id="title" required>
                            </div>

                            <div class="form-group col-md-12">
                                <input type="file" name="image" id=""  required class="form-control">
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary ml-auto">Add</button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

@endsection
