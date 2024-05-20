<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/home/css/signUp_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Include Select2 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Include jQuery and Select2 JS via CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</head>

<body>

@include('home.includes.nav')


<main>
    <div class="form-control">
        <div>
            <h2>Sign Up</h2>
            <h4>Enter Your Credentials to Sign Up</h4>
            <form action="{{ route('save.register.dealer') }}" method="POST">
                @csrf


                <input type="text" name="name" placeholder="Name">
                <input type="text" name="experience" placeholder="Experience">
                <input type="text" name="phone" placeholder="Phone">
                <input type="text" name="business_name" placeholder="Business Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="pword" placeholder="Password">
                <select class="form-multi-select" id="frameworks" name="frameworks[]" multiple="multiple">
                    <option value="0">Angular</option>
                    <option value="1">Bootstrap</option>
                    <option value="2">React.js</option>
                    <option value="3">Vue.js</option>
                    <optgroup label="backend">
                        <option value="4">Django</option>
                        <option value="5">Laravel</option>
                        <option value="6">Node.js</option>
                    </optgroup>
                </select>

                <span><a href="{{ route('login') }}" class="f_p">Have an account? Log In</a></span><br>



                <button id="login" type="submit">Sign Up</button>
            </form>

        </div>
    </div>

</main>



@include('home.includes.footer')


<script>
    function refreshCsrfToken() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/refresh-csrf', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                var csrfToken = response.csrf_token;
                var csrfInputs = document.querySelectorAll('input[name="_token"]');
                csrfInputs.forEach(function(input) {
                    input.value = csrfToken;
                });
            }
        };
        xhr.send();
    }

    // Refresh CSRF token every 10 minutes (600,000 milliseconds)
    setInterval(refreshCsrfToken, 600000);

    // Initial call to ensure the CSRF token is up-to-date on page load
    document.addEventListener('DOMContentLoaded', function() {
        refreshCsrfToken();
    });
</script>

<script>
    $(document).ready(function() {
        $('#frameworks').select2({
            placeholder: "Select frameworks",
            allowClear: true,
            width: '100%' // Make sure it fits within the Bootstrap form-control
        });
    });
</script>
