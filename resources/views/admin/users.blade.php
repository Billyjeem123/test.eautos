@extends('admin.layouts.master')




@section('page.content')

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add New User</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-download fa-sm text-white-50"></i>List of Users</a>
    </div>

    <!-- Content Row -->
    <div class="container py-3 bg-gray-200">
      <form action="{{ route('admin.users.create') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="firstName">Full Name</label>
            <input type="text" class="form-control" id="firstName" name="firstname">
          </div>
         
         
        </div>
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email"  name="email">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Password</label>
            <input type="password" class="form-control" id="inputEmail4"  name="pword">
          </div>

         
         
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="type">Type of User</label>
            <select id="type" class="form-control bg-white" name="type">
              <option selected disabled="">Select Type</option>
              <option>user</option>
              <option>dealer</option>
              <option>admin</option>
            </select>
          </div>

        </div>

        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>

    <!-- Content Row -->

  </div>
  <!-- /.container-fluid -->
    
@endsection