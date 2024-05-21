<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


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
            max-height: 200px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='{{ route('get_all_blogs_admin') }}';"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="blog-title" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" id="blog-title" value="{{$blog->title}}">
                </div>

                <div class="mb-3">
                    <label for="blog-desc" class="form-label">Blog Description</label>
                    <textarea name="desc" class="form-control" id="blog-desc" rows="5">{{$blog->desc}}</textarea>
                </div>

                <div class="mb-3 text-center">
                    <label for="blog-image" class="form-label">Blog Image</label>
                    <div>
                        <img src="{{$blog->image}}" alt="Blog Image" class="img-fluid blog-image" id="blog-image-preview">
                    </div>
                    <input type="file" name="image" id="blog-image" class="form-control mt-2">
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-primary" id="update-blog-button">Update Blog</button>
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ route('get_all_blogs_admin') }}" class="btn btn-secondary">Back</a>
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


<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#update-blog-button').click(function() {
        // Change button text to 'Updating...'
        $(this).html('Updating...');

        var formData = new FormData();
        formData.append('title', $('#blog-title').val());
        formData.append('desc', $('#blog-desc').val());

        var imageFile = $('#blog-image')[0].files[0];
        if (imageFile) {
            formData.append('image', imageFile);
        }

        $.ajax({
            url: '/admin/update-blog/{{$blog->id}}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.success) {
                    toastr.success('Blog post updated successfully.');
                    // Optionally update the UI or close the modal here

                    // Revert button text to 'Update Blog'
                    $('#update-blog-button').html('Update Blog');
                } else {
                    toastr.error('Failed to update blog.');

                    // Revert button text to 'Update Blog'
                    $('#update-blog-button').html('Update Blog');
                }
            },
            error: function(xhr) {
                alert('An error occurred while updating the blog.');

                // Revert button text to 'Update Blog'
                $('#update-blog-button').html('Update Blog');
            }
        });
    });
</script>


</body>
</html>
