@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Bidders List</h1>
        <div class="">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Bidder Name</th>
                    <th>Contact Number</th>
                    <th>Contact Email</th>
                    <th>Bid Amount</th>
                    <th>Bidded Asset</th>
                    <th>Bid Date</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($bids as $product)
                    <tr>
                        <td>{{$product->user->name}}</td>
                        <td>{{$product->user->phone}}</td>
                        <td>{{$product->user->email}}</td>
                        <td>₦{{ number_format($product->price, 2) }}</td>
                        <td>{{$product->auction->model}}</td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <form action="{{ route('admin.bid.delete', $product->id) }}" method="POST">
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
