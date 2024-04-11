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
                <th>Category</th>
                <th>Model</th>
                <th>Price</th>
                <th>Views</th>
                <th>Active</th>
                <th>Approve</th>
                <th>Date Created</th>
                <th>View Info</th>
                <th>Delete</th>


              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                  <td>{{$product->categories->catname}}</td>
                  <td>{{$product->model}}</td>
                  <td>₦{{ number_format($product->price, 2) }}</td>
                  <td>{{$product->views}}</td>
                  <td>{{ $product->is_approved === 1 ? 'Approved' : ($product->is_approved === 2 ? 'Deactivated' : 'Pending') }}</td>
                  <form action="{{ route('admin.product.activate', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <td>
                      <button type="submit" class="btn btn-info btn-sm">
                          {{ $product->is_approved === 1 ? 'Deactivate'  : 'Activate' }}
                      </button>
                  </td>
                  </form>

                  <td>{{$product->created_at->diffForHumans()}}</td>
                  <td><a class="btn btn-info btn-sm" href="{{ route('admin.edit.product', $product->id) }}">View Details</a></td>


                  <form action="{{ route('admin.product.delete', $product->id) }}" method="POST">
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
