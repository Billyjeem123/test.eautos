@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Asset Evaluation List</h1>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Asset Type</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>Mileage</th>
                    <th>Engine Type</th>
                    <th>Credentials</th>
                    <th>Date Posted</th>
                    <th>Status</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($valueAssets as $valuedAsset)
                    <tr>
                        <td>{{$valuedAsset->user_id}}</td>
                        <td>{{$valuedAsset->asset_type}}</td>
                        <td>{{$valuedAsset->brand}}</td>
                        <td>{{$valuedAsset->model}}</td>
                        <td>{{$valuedAsset->color}}</td>
                        <td>{{$valuedAsset->mileage}}</td>
                        <td>{{$valuedAsset->engine_type}}</td>
                        <td>{{$valuedAsset->created_at}}</td>
                        <td><a href="" class="btn btn-info">View Credentials</a></td>
                        <form action="{{ route('admin.users.delete', $valuedAsset->id) }}" method="POST">
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
