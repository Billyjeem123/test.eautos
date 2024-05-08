<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Adjust modal size to extra large and centering -->
        <div class="modal-content">
            <!-- Remove the modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='{{ route('admin.product.all')}}';"></button>
            </div>




            <div class="modal-body">
                <div class="form-group">
                    <label>Product Category</label>
                    <input type="text" class="form-control" value="{{$product->categories->catname}}" name="product_category">
                </div>

                <div class="form-group">
                    <label>Product Model</label>
                    <input type="text" class="form-control" value="{{$product->model}}"  name="product_model">
                </div>

                <div class="form-group">
                    <label>Color</label>
                    <input type="text" class="form-control" value="{{($product->color)}}" name="color">
                </div>


                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" value="{{number_format($product->price, 2)}}" name="price">
                </div>

                <div class="form-group">
                    <label>Product Address</label>
                    <input type="text" class="form-control" value="{{($product->address)}}"  name="address">
                </div>

                <div class="form-group">
                    <label>Product Brand</label>
                    <input type="text" class="form-control" value="{{($product->brand->name)}}"  name="brand">
                </div>



                <div class="form-group">
                    <label>Product Loacation</label>
                    <input type="text" class="form-control" value="{{$product->location}}"  name="location">
                </div>

                <div class="form-group">
                    <label>Product Mileage</label>
                    <input type="text" class="form-control" value="{{$product->mileage}}" name="mileage" dirname="mileage">
                </div>



                <div class="form-group">
                    <label>Product Cyliner</label>
                    <input type="text" class="form-control" value="{{$product->cylinder}}" name="cylinder">
                </div>

                <div class="form-group">
                    <label>Poster Details</label>
                    <input type="text" class="form-control" value="{{$product->user->name}}"  disabled>
                </div>


                <div class="form-group">
                    <label>Poster Phone Number</label>
                    <input type="text" class="form-control" value="{{$product->user->phone}}"  disabled>
                </div>

                <div class="form-group">
                    <label>Date Applied</label>
                    <input type="email" class="form-control" value="{{$product->created_at->diffForHumans()}}" disabled>
                </div>

                <div class="form-group">
                    <label>Report Status</label>
                    <h4>{{$product->is_viewed === 0 ? "Pending" : "Seen"}}</h4>

                    <div class="form-group">
                        <label>Product Details</label>
                        <textarea class="form-control" rows="5">{{$product->desc}}</textarea>
                    </div>

{{--                    <div class="form-group">--}}
{{--                        @foreach ($product->images as $image)--}}
{{--                            <img src="{{ $image->image }}" alt="Product Image">--}}
{{--                        @endforeach--}}
{{--                    </div>--}}


                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.product.all')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional, only if you need JavaScript features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Function to automatically launch the modal when the page loads
    window.onload = function() {
        var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();
    };
</script>

</body>
</html>
