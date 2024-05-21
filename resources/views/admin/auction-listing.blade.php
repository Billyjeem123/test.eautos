@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Auction Listing</h1>
        <div class="">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Report Staus</th>
                    <th>Views</th>
                    <th>View Details</th>
                    <th>Date Created</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($auction as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Display auto-incremented ID -->
                        <td>{{$product->categories->catname}}</td>
                        <td>{{$product->model}}</td>
                        <td>{{$product->color}}</td>
                        <td>₦{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->is_approved === 1 ? 'Approved' : ($product->is_approved === 2 ? 'Deactivated' : 'Pending') }}</td>
                        <td>{{$product->views}}</td>
                        <td><a class="btn btn-info btn-sm" href="{{ route('admin.products.details', $product->id) }}">View Details</a></td>
                        <td>{{$product->created_at->diffForHumans()}}</td>

                        <form action="{{ route('admin.auction.delete', $product->id) }}" method="POST">
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
