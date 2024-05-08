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
                    <th>Car Name</th>
                    <th>Reported By</th>
                    <th>Brand</th>
                    <th>Last Seen</th>
                    <th>Views</th>
                    <th>Report Status</th>
                    <th>Active</th>
                    <th>Approve</th>
{{--                    <th>View Details</th>--}}
                    <th>Date Reported</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($stolens as $stolen)
                    <tr>
                        <td>{{$stolen->name}}</td>
                        <td>{{$stolen->user->name}}</td>
                        <td>{{$stolen->brand->name}}</td>
                        <td>{{$stolen->address}}</td>
                        <td>{{$stolen->views}}</td>
                        <td><p>{{$stolen->is_approved === 0 ? "Pending" : "Seen"}}</p></td>
                        <td>{{ $stolen->is_approved === 1 ? 'Approved' : ($stolen->is_approved === 2 ? 'Deactivated' : 'Pending') }}</td>
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <a href="{{ $stolen->active === 1 ? route('theft.approve', $stolen->id) : route('theft.unapprove', $stolen->id) }}"
                                   class="btn btn-info btn-sm">
                                    {{ $stolen->is_approved === 1 ? 'Unapprove' : ($stolen->is_approved === 0 ? 'Approve' : '') }}
                                </a>
                            </td>
                        </form>

                        <td>{{$stolen->created_at->diffForHumans()}}</td>

                        <form action="{{ route('admin.delete.stolen', $stolen->id) }}" method="POST">
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
