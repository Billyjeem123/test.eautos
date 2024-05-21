<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details</title>
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
        .form-control-plaintext {
            border: 1px solid #ced4da;
            padding: 10px;
            background-color: #f8f9fa;
        }
        .blog-image {
            max-width: 100%;
            max-height: 400px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='{{ route('get_all_blogs_admin') }}';"></button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Blog Title</label>
                    <input type="text" class="form-control-plaintext" readonly value="{{$blog->title}}">
                </div>

                <div class="form-group">
                    <label>Blog Description</label>
                    <textarea name="desc" class="form-control-plaintext" readonly cols="30" rows="10">{{$blog->desc}}</textarea>
                </div>

                <div class="form-group">
                    <label>Blog Image</label>
                    <div>
                        <img src="{{$blog->image}}" alt="Blog Image" class="img-fluid blog-image">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ route('get_all_blogs_admin') }}" class="btn btn-primary">Back</a>
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
