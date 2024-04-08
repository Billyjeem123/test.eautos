@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Users</h1>
        <div class="p-3 py-5 bg-gray-200 rounded">
        
        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
          <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name Of Offender</th>
                <th>Bussiness Name</th>
                <th>Reporter Name</th>
                <th>Date Reported</th>
                <th>Delete</th>


              </tr>
            </thead>
            <tbody>
              @foreach($reports as $report)
              <tr>
                  <td>{{$report->name_of_offender}}</td>
                  <td>{{$report->bussines_name}}</td>
                  <td>{{$report->reporter_name}}</td>
                  <td>{{$report->created_at->diffForHumans()}}</td>
                  <form action="{{ route('admin.reports.delete', $report->id) }}" method="POST">
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