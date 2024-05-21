@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Blog Listings</h1>
        <div class="">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Uploaded By</th>
                    <th>Title</th>
                    <th>Views</th>
                    <th>Date Created</th>
                    <th>Edit</th>
                    <th>View Details</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->user->name}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->views}}</td>
                        <td>{{$blog->created_at->diffForHumans()}}</td>
                        <td><a class="btn btn-info btn-sm" href="{{ route('admin.products.details', $blog->id) }}">Edit </a></td>
                        <td><a class="btn btn-info btn-sm" href="{{ route('view_blog_details_admin', $blog->id) }}">View Details</a></td>
                        <form action="{{ route('delete_blog_admin', $blog->id) }}" method="POST">
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
