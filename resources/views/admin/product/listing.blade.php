@extends('admin.layouts.master')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


<style>
    .short-video-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        padding: 15px;
    }

    .short-video-item {
        background-color: #f5f5f5;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .short-video-item video {
        width: 100%;
        height: 350px;
    }

    .video-stats,
    .video-info {
        padding: 10px;
    }

    .video-stats div {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }

    .video-stats i {
        margin-right: 5px;
    }

    .pagination-section {
        margin-top: 20px;
        text-align: center;
        align-content: center;
    }

    .pagination-section ul.pagination {
        margin: 0;
    }

    .pagination-section ul.pagination li.page-item {
        display: inline-block;
        margin-right: 5px;
    }

    .pagination-section ul.pagination li.page-item a.page-link {
        color: #007bff;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #007bff;
        border-radius: 3px;
    }

    .pagination-section ul.pagination li.page-item a.page-link:hover {
        background-color: #007bff;
        color: #fff;
    }

    .pagination-section ul.pagination li.page-item.active a.page-link {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

</style>

@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Listing</h1>
        <div class="">

        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Category</th>
{{--                    <th>Model</th>--}}
                    <th>Price</th>
                    <th>Views</th>
                    <th>Report Staus</th>
                    <th>Active</th>
                    <th>Approval Status</th>
                    <th>Feature product</th>
                    <th>Disapprove</th>
                    <th>Date Created</th>
                    <th>View Info</th>
                    <th>Delete</th>


                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Display auto-incremented ID -->
                        <td>{{$product->categories->catname}}</td>
{{--                        <td>{{$product->model}}</td>--}}
                        <td>₦{{ number_format($product->price, 2) }}</td>
                        <td>{{$product->views}}</td>
                        <td><p>{{$product->is_viewed === 0 ? "Pending" : "Seen"}}</p></td>
                        <td>{{ $product->is_approved === 1 ? 'Approved' : ($product->is_approved === 2 ? 'Declined' : 'Pending') }}</td>
                        <form action="{{ route('approve_product_request') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <td>
                                <button type="submit" class="btn btn-info btn-sm">
                                    Approve
                                </button>
                            </td>
                        </form>
                        <td>
                            <form action="{{ route('toggle_featured') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-info btn-sm">
                                    {{ $product->is_featured ? 'Unfeature Product' : 'Feature Product' }}
                                </button>
                            </form>
                        </td>


                        <form id="declineForm" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#reasonModal" data-product-id="{{ $product->id }}">
                                    Decline
                                </button>
                            </td>
                        </form>

                        <td>{{$product->created_at->format('F d, Y')}}</td>
                        <td><a class="btn btn-info btn-sm" href="{{ route('admin.products.details', $product->id) }}">View Details</a></td>


                        <form action="{{ route('admin.product.delete', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td><button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>   </div>

    <!-- /.container-fluid -->




    <!-- Modal -->
    <div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" id="product-id" name="product_id" value="">
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













    @if($products->count() > 0 )

        <!-- Pagination Section -->
        <div class="pagination-section">
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center flex-wrap">
                        @if ($products->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Prev</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">Prev</a></li>
                        @endif

                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            <li class="page-item {{ ($page == $products->currentPage()) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($products->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    @endif

@endsection

<!-- Bootstrap JS (Optional, only if you need JavaScript features) -->

{{--Basically this code is dynamicaaly populating the given id of a  product--}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var reasonModal = document.getElementById('reasonModal');
        reasonModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var productId = button.getAttribute('data-product-id');

            var modalForm = reasonModal.querySelector('#declineForm');
            var productIdInput = modalForm.querySelector('#product-id');
            productIdInput.value = productId;

            modalForm.action = "{{ route('decline_product_request') }}";
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

