@extends('admin.layouts.master')

@section('page.content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Group Listings</h1>
    <div class="">

    </div>
    <div class="table-responsive bg-gray-100 p-2 py-4">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Group Name</th>
                <th>Group Desc</th>
                <th>Date Created</th>
                <th>Members</th>
                <th>Delete</th>


            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
            <tr>
                <td>{{$group->title}}</td>
                <td>{{$group->description}}</td>
                <td>{{$group->created_at->diffForHumans()}}</td>
                <td>0</td>

                <form action="{{ route('delete_group', $group->id) }}" method="POST">
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
