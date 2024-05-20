<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/home/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

@include('home.includes.nav')


<main>
    <div class="form-control">
        <div>
            <h2>Log In</h2>
            <h4>Enter Your Credentials to Login</h4>
            <form action="{{route('login.user')}}" method="POST">
                @csrf
                <input type="text" placeholder="User/ Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <span><a href="" class="f_p">Forget Password</a>
            <a href="{{ route('register') }}" class="f_p">Create new account</a></span><br>
                <button id="login" type="submit">Login</button>
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


