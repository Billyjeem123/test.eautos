@extends('admin.layouts.master')


@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="mb-4">
            <h1 class="h3 text-gray-800">Upload Blog Content</h1>
            <span class="py-2 px-4 bg-white text-dark rounded">Create E-autos Blog</span>
        </div>
        <form id="blogForm" class="p-3" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control bg-white" id="title" name="title" placeholder="Enter Blog Title" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Blog Description</label>
                <textarea name="description" class="form-control bg-white editor" id="editor" placeholder="Enter Blog Description" cols="30" rows="5" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="image">Blog Image</label>
                <input type="file" name="image" class="form-control bg-white" id="image" required>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="button" id="saveBtn" class="btn border-primary text-primary m-2 px-sm-4">Save</button>
                <button type="button" id="submitBtn" class="btn btn-primary m-2 px-sm-4">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection




<script>


    document.addEventListener('DOMContentLoaded', function() {
        function submitForm(event) {
            event.preventDefault();

            CKEDITOR.replace('editor');

            var form = document.getElementById('blogForm');
            var formData = new FormData(form);
            var submitBtn = event.target;

            // Check if all fields are filled
            var formFields = form.querySelectorAll('input, textarea, select');
            var isValid = true;

            formFields.forEach(function(field) {
                if (field.required && !field.value.trim()) {
                    isValid = false;
;
                }
            });

            if (!isValid) {
                toastr.error('Please fill in all fields.');
                return
            }

            // Change button text to 'Processing...' and disable it
            submitBtn.innerHTML = 'Processing...';
            submitBtn.disabled = true;

            formData.set('description', CKEDITOR.instances.editor.getData());

            fetch("{{ route('create_blog_admin') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);  // This will log the entire object in the console, which is useful for debugging

                    if (data.success) {
                        toastr.success('Blog post uploaded successfully.');
                        form.reset();
                    } else {
                        toastr.error(data.message);
                    }
                })

                .catch(error => {
                    toastr.error('An error occurred: ' + error.message);
                    console.error('Error:', error);
                })
                .finally(() => {
                    // Reset button text to 'Submit' and enable it
                    submitBtn.innerHTML = 'Submit';
                    submitBtn.disabled = false;
                });
        }

        document.getElementById('saveBtn').addEventListener('click', submitForm);
        document.getElementById('submitBtn').addEventListener('click', submitForm);
    });
</script>

