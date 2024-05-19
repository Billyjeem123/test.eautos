<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Details</title>
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
                <h5 class="modal-title" id="exampleModalLabel">Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='{{ route('sold.all.admin')}}';"></button>
            </div>


            <div class="modal-body">
                <div class="form-group">
                    <label>Item Purchased</label>
                    <input type="text" class="form-control" value="{{$solditem->item_name}}">
                </div>

                <div class="form-group">
                    <label>Price Purchased</label>
                    <input type="text" class="form-control" value="{{$solditem->price}}">
                </div>

                <div class="form-group">
                    <label>Buyer Name</label>
                    <input type="text" class="form-control" value="{{$solditem->buyer_details->name}}">
                </div>



                <div class="form-group">
                    <label>Poster Name</label>
                    <input type="text" class="form-control" value="{{$solditem->owner_details->name}}">
                </div>


                <div class="form-group">
                    <label>Poster Phone Number</label>
                    <input type="text" class="form-control" value="{{$solditem->owner_details->phone}}">
                </div>



                <div class="form-group">
                    <label>Date Purchased</label>
                    <input type="email" class="form-control" value="{{$solditem->created_at->diffForHumans()}}" disabled>
                </div>

                <div class="form-group">
                    <label>Viewed By Admin</label>
                    <h4>{{$solditem->is_viewed === 0 ? "Pending" : "Seen"}}</h4>


                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('sold.all.admin')}}" class="btn btn-primary">Back</a>
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
