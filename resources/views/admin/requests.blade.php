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
                        <td>{{$report->brand}}</td>
                        <td>{{$report->model}}</td>
                        <td>{{$report->user_name}}</td>
                        <td>{{$report->phone}}</td>
                        <td>{{number_format($report->budget,2)}}</td>
                        <td>{{$report->country}}</td>
                        <td>{{$report->created_at->diffForHumans()}}</td>
                        <form action="{{ route('admin.requests.delete', $report->id) }}" method="POST">
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
