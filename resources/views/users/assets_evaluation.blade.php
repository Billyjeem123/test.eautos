@extends('users.layouts.master')




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
                    <th>Report status</th>
                    <th>Date Posted</th>
                    {{--                    <th>Status</th>--}}


                </tr>
                </thead>
                <tbody>
                @foreach($allAsset as $valuedAsset)
                    <tr>
                        <td>{{ $valuedAsset->asset_type . " Car" }}</td>
                        <td>{{$valuedAsset->brand}}</td>
                        <td>{{$valuedAsset->model}}</td>
                        <td>{{$valuedAsset->color}}</td>
                        <td>{{$valuedAsset->mileage}}</td>
                        <td>{{$valuedAsset->engine_type}}</td>
                        <td><p>{{$valuedAsset->is_seen === 0 ? "Pending" : "Seen"}}</p></td>
                        <td>{{$valuedAsset->created_at}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
