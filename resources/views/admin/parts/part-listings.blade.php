@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Listing</h1>
        <div class="">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Part Name</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>User Fullname</th>
                    <th>Approval</th>
                    <th>Date Created</th>
                    <th>View Image</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($parts as $part)
                    <tr>
                        <td>{{$parts->part_name}}</td>
                        <td>₦{{ number_format($parts->price, 2) }}</td>
                        <td>{{$parts->location}}</td>
                        <td>{{$parts->user->name}}</td>
                        <td>{{ $parts->active === 1 ? 'Approved' : ($product->is_approved === 2 ? '' : 'Pending') }}</td>
                        <td>{{$parts->created_at->diffForHumans()}}</td>
                        <td><a class="btn btn-info">View Image</a></td>
                        <form action="{{ route('admin.product.activate', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <button type="submit" class="btn btn-info btn-sm">
                                    {{ $parts->is_approved === 1 ? 'Deactivate'  : 'Activate' }}
                                </button>
                            </td>
                        </form>

                        <td><a class="btn btn-info btn-sm" href="{{ route('admin.edit.product', $parts->id) }}">View Details</a></td>


                        <form action="{{ route('admin.parts.delete', $parts->id) }}" method="POST">
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
