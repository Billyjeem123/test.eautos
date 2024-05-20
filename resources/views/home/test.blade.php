<!DOCTYPE html>
<html>
<head>
    <title>Multiple Select Example</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet">
    <!-- Include jQuery and Select2 JS via CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Select Frameworks</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('handle.form') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="frameworks">Select Frameworks:</label>
                    <select class="form-control" id="frameworks" name="frameworks[]" multiple="multiple">
                        <option value="0">Angular</option>
                        <option value="1">Bootstrap</option>
                        <option value="2">React.js</option>
                        <option value="3">Vue.js</option>
                        <optgroup label="Backend">
                            <option value="4">Django</option>
                            <option value="5">Laravel</option>
                            <option value="6">Node.js</option>
                        </optgroup>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#frameworks').select2({
            placeholder: "Select frameworks",
            allowClear: true,
            width: '100%' // Make sure it fits within the Bootstrap form-control
        });
    });
</script>
</body>
</html>
