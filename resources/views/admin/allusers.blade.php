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
                <th>Name</th>
                <th>Email</th>
                  <th>Feature status</th>
                <th>Role</th>
                <th>Block</th>
                  <th>Feature provider</th>
                <th>Date Joined</th>
                <th>Status</th>
                <th>Delete</th>


              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->is_featured == 1 ? 'yes' : 'no'}}</td>
                  <td>{{$user->role}}</td>
                  <td>{{ $user->is_active == 1 ? 'blocked' : 'active' }}</td>
                  <td>
                      <form action="{{ route('toggle_featured_user') }}" method="POST">
                          @csrf
                          <input type="hidden" name="user_id" value="{{ $user->id }}">
                          <button type="submit" class="btn btn-info btn-sm">
                              {{ $user->is_featured ? 'Unfeature' : 'Feature' }}
                          </button>
                      </form>
                  </td>
                  <td>{{$user->created_at->diffForHumans()}}</td>

                  <form action="{{ route('admin.users.block', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <td><button type="submit" class="btn btn-info">{{ $user->is_active === 1 ? 'Unblock' : 'Block' }}</button></td>
                  </form>

                  <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
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
