@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">All Car Requests</h1>

        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>User FullName</th>
                    <th>Phone Number</th>
                    <th>Budget</th>
                    <th>Country</th>
                    <th>Date Reported</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{$request->brand}}</td>
                        <td>{{$request->model}}</td>
                        <td>{{$request->user_name}}</td>
                        <td>{{$request->phone}}</td>
                        <td>{{number_format($request->budget,2)}}</td>
                        <td>{{$request->country}}</td>
                        <td>{{$request->created_at->diffForHumans()}}</td>
                            @csrf
                            @method('DELETE')
                            <td><button type="submit" class="btn btn-danger">Delete</button></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
