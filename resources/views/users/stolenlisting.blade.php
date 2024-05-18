@extends('users.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Stolen Items Listing</h1>
        <div class="">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Reported By</th>
                    <th>Brand</th>
                    <th>Last Seen</th>
{{--                    <th>Report Status</th>--}}
                    <th>Approval Status</th>
                    <th>Date Reported</th>


                </tr>
                </thead>
                <tbody>
                @foreach($stolens as $stolen)
                    <tr>
                        <td>{{$stolen->name}}</td>
                        <td>{{$stolen->user->name}}</td>
                        <td>{{$stolen->brand->name}}</td>
                        <td>{{$stolen->address}}</td>
{{--                        <td>{{$stolen->views}}</td>--}}
                        <td>{{ $stolen->is_approved === 1 ? 'Approved' : ($stolen->is_approved === 2 ? 'Deactivated' : 'Pending') }}</td>


                        <td>{{$stolen->created_at->diffForHumans()}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
