<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/signUp_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                <input type="text" name="business_name" placeholder="Business Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="pword" placeholder="Password">
{{--                <input type="password" name="password_confirmation" placeholder="Confirm Password">--}}
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
