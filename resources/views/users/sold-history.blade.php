@extends('users.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Sold Items</h1>

        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Sold Item</th>
                    <th>Price</th>
                    <th>Date Purchased</th>

                    <th>View Details</th>

                </tr>
                </thead>
                <tbody>
                @foreach($solditems as $report)
                    <tr>
                        <td>{{$report->item_name}}</td>
                        <td>{{$report->price}}</td>
                        <td>{{$report->created_at->diffForHumans()}}</td>
                        <td><a href="{{route('sold_by_id', $report->id)}}" class="btn btn-info btn-sm">View Order</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
