@extends('admin.layouts.master')


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Part Listing</h1>
        <div class="">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td>id</td>
                    <th>Part Name</th>
                    <th>Part Category</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>User Name</th>
                    <th>Approval Status</th>
                    <th>Approve</th>
                    <th>Decline</th>
                    <th>Date Created</th>
                    <th>View Image</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($parts as $part)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Display auto-incremented ID -->
                        <td>{{$part->part_name}}</td>
                        <td>{{$part->partcategories->part_category}}</td>
                        <td>₦{{ number_format($part->price, 2) }}</td>
                        <td>{{$part->location}}</td>
                        <td>{{$part->users->name}}</td>
                        <td>{{ $part->active === 1 ? 'Approved' : ($part->active === 2 ? 'Declined' : 'Pending') }}</td>
                        <form action="{{ route('approve_part_request') }}" method="POST">
                            @csrf
                            <input type="hidden" name="part_id" value="{{ $part->id }}">
                            <td>
                                <button type="submit" class="btn btn-info btn-sm">
                                    Approve
                                </button>
                            </td>
                        </form>

                        <form id="declineForm" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#resonModals" data-product-id="{{ $part->id }}">
                                    Decline
                                </button>
                            </td>
                        </form>
                        <td>{{$part->created_at->diffForHumans()}}</td>
                        <td><a class="btn btn-info btn-sm">View Image</a></td>
                        <form action="{{ route('admin.parts.delete', $part->id) }}" method="POST">
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



    <!-- Modal -->
    <div class="modal fade" id="resonModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Decline Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="declineForm" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" id="product-id" name="part_id" >
                        <div class="form-group">
                            <label for="reason">Reason:</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection




{{--Basically this code is dynamicaaly populating the given id of a  product--}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var resonModals = document.getElementById('resonModals');
        resonModals.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var productId = button.getAttribute('data-product-id');

            var modalForm = resonModals.querySelector('#declineForm');
            var productIdInput = modalForm.querySelector('#product-id');
            productIdInput.value = productId;

            modalForm.action = "{{ route('decline_part_request') }}";
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

