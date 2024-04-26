@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Carpart Category  </h1>
        <div class="container text-center mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('admin.parts.category') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="part_category_name" placeholder="Enter Category" aria-label="Enter brand name" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable">
                <thead>
                <tr>
                    <th style="width: 80%;">Category Name</th>
                    <th style="width: 20%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partcategories as $partcategory)
                    <tr>
                        <td>{{ $partcategory->part_category }}</td>
                        <td>
                            <!-- Add delete button -->
                            <form action="{{ route('admin.brand.delete', $partcategory->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
