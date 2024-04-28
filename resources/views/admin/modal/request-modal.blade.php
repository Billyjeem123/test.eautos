<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details</title>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='{{ route('view.requests')}}';"></button>
            </div>


            <div class="modal-body">
                <div class="form-group">
                    <label>Request Brand</label>
                    <input type="text" class="form-control" value="{{$request->brand}}">
                </div>

                <div class="form-group">
                    <label>Requested Model</label>
                    <input type="text" class="form-control" value="{{$request->model}}">
                </div>

                <div class="form-group">
                    <label>Client Budget</label>
                    <input type="text" class="form-control" value="{{number_format($request->budget, 2)}}">
                </div>



                <div class="form-group">
                    <label>Client Country</label>
                    <input type="text" class="form-control" value="{{$request->country}}">
                </div>

                <div class="form-group">
                    <label>Client Phone Number</label>
                    <input type="text" class="form-control" value="{{$request->phone}}">
                </div>

                <div class="form-group">
                    <label>Client Full Name</label>
                    <input type="email" class="form-control" value="{{$request->user_name}}">
                </div>

                <div class="form-group">
                    <label>Date Applied</label>
                    <input type="email" class="form-control" value="{{$request->created_at->diffForHumans()}}" disabled>
                </div>

                <div class="form-group">
                    <label>Report Status</label>
                    <h4>{{$request->is_viewed === 0 ? "Pending" : "Seen"}}</h4>

                    <div class="form-group">
                        <label>Client Additinal Details</label>
                        <textarea class="form-control" rows="5">{{$request->body}}</textarea>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('view.requests')}}" class="btn btn-primary">Back</a>
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
