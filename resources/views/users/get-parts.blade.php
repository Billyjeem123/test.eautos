@extends('users.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Part Listing</h1>
        <div class="">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Part Name</th>
                    <th>Part Category</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>User Fullname</th>
                    <th>Approval Status</th>
                    <th>Date Created</th>
                    <th>View Details</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($parts as $part)
                    <tr>
                        <td>{{$part->part_name}}</td>
                        <td>{{$part->partcategories->part_category}}</td>
                        <td>₦{{ number_format($part->price, 2) }}</td>
                        <td>{{$part->location}}</td>
                        <td>{{$part->users->name}}</td>
                        <td>{{ $part->active === 1 ? 'Approved' : ($part->active === 2 ? '' : 'Pending') }}</td>

                        <td>{{$part->created_at->diffForHumans()}}</td>
                        <td><a class="btn btn-info btn-sm">View Details</a></td>
                        <form action="{{ route('users.parts.delete', $part->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td><button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
