@extends('users.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Reported Vendors</h1>

        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name Of Offender</th>
                    <th>Offender Bussiness Name</th>
                    <th>Report Staus</th>
                    <th>View Details</th>
                    <th>Date Reported</th>
{{--                    <th>Delete</th>--}}


                </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{$report->name_of_offender}}</td>
                        <td>{{$report->bussines_name}}</td>
                        <td><p>{{$report->is_viewed === 0 ? "Pending" : "Seen"}}</p></td>
                        <td><a href="{{route('user.complaint.details', $report->id)}}" class="btn btn-info btn-sm">View Complaint</a></td>
                        <td>{{$report->created_at->diffForHumans()}}</td>
{{--                        <form action="{{ route('users.reports.delete', $report->id) }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <td><button type="submit" class="btn btn-danger">Delete</button></td>--}}
{{--                        </form>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
