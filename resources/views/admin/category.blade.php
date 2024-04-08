@extends('admin.layouts.master')




@section('page.content')

 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add New Category</h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-download fa-sm text-white-50"></i>List of Categories</a> -->
    </div>

    <!-- Content Row -->
    <div class="py-5 px-md-2">

      <div class="row justify-content-between">
        <div class="col-lg-3 bg-gray-200 p-3 rounded mb-3">
          <h5 class="h4">Add Category</h5>
          <form action="{{route('admin.category.create')}}" class="d-flex flex-column" method="POST">
            <div class="form-row">
              @csrf
              <div class="form-group col-md">
                <input type="text" name="catname" class="form-control bg-white" placeholder="Input Category" id="title">
              </div>
            </div>
            <button type="submit" class="btn btn-primary ml-auto">Add</button>
          </form>
          <h5 class="h6 pt-3">List of Categories</h5>
      
          <ol class="px-1 m-0">
            @forelse($categories as $category)
            <li class="p-0 my-1">
                <div class="d-flex justify-content-between">
                    <span class="">{{ $category->catname }}</span>
                    <span class="button-group" style="display: flex;align-items: center;">
                        <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-circle btn-sm btn-danger px-2"><i class="fa fa-trash"></i></button>
                        </form>
                        <button class="btn-circle btn-sm btn-success px-2 edit-btn" data-toggle="collapse"
                            data-target="#collapse_{{ $category->id }}" data-category="{{ $category->catname }}" aria-expanded="false"><i class="far fa-edit"></i></button>
                    </span>
                </div>
                <div id="collapse_{{ $category->id }}" class="collapse col-12">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group p-0 m-0 d-flex">
                                <input type="text" name="catname" class="form-control bg-white edit-input" placeholder="Edit Category">
                                <button type="submit" class="btn-sm btn-primary"><i class="fa fa-check"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
            @empty
            <li class="p-0 my-1">No categories found.</li>
            @endforelse
        </ol>
        
        <script>
          // Populate input field with category name when edit button is clicked
          document.querySelectorAll('.edit-btn').forEach(function(editBtn) {
              editBtn.addEventListener('click', function() {
                  var categoryName = this.getAttribute('data-category');
                  var inputField = this.closest('li').querySelector('.edit-input');
                  inputField.value = categoryName;
              });
          });
      </script>
        
        
        </div>
        <div class="col-lg-8 bg-gray-200 p-3 rounded mb-3">
          <h5 class="h4">Add Sub Category</h5>
          <form action="{{route('admin.subcategory.create')}}"  method="POST" class="d-flex flex-column">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <select id="append"  name="category_name" class="form-control bg-white">
                  <option selected disabled>Select Category</option>
                  @foreach($categories as $category)
                      <option>{{ $category->catname }}</option>
                  @endforeach
              </select>
              
              </div>
              <div class="form-group col-md-6">
                <input type="text" name="subcategory_name" class="form-control bg-white" placeholder="Input Sub Category" id="title">
              </div>
            </div>
            <button class="btn btn-primary ml-auto">Add</button>
          </form>
          <div class="table-responsive table-sm bg-gray-100 p-2 py-4">
            <table class="table" width="100%" cellspacing="0">
              <!-- <thead> -->

              <!-- </thead> -->
        
              <tbody>
                @foreach($categories as $category)
                    @if($category->subcategories->isNotEmpty())
                        <tr>
                            <th>{{ $category->catname }}</th>
                            @foreach($category->subcategories as $subcategory)
                                <td>
                                    <span>{{ $subcategory->name }}</span>
                                    <span>
                                        <form action="{{ route('admin.subcategory.delete', $subcategory->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-circle btn-sm btn-danger py-1 px-2"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </span>
                                </td>
                            @endforeach
                        </tr>
                    @endif
                @endforeach
            </tbody>
            
            
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

  </div>
  <!-- /.container-fluid -->
    
@endsection