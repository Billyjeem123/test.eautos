<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Completion Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Adjust modal size and centering -->
        <div class="modal-content">
            <!-- Remove the modal header -->
            <!-- <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Profile Completion Required</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body">
                <h5 class="modal-title mb-4" id="exampleModalLabel">Profile Completion Required</h5>
                <p>Your profile must be at least 80% complete before accessing this page.</p>
                <p>Your current profile completion percentage is: <strong id="profilePercentage"></strong></p>
                <p>Please update your profile to meet the requirement.</p>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <!-- Button to redirect to profile update page -->
                <a href="{{route('admin.profile')}}" class="btn btn-primary">Update Profile</a>
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
