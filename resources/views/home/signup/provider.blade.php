<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/home/css/signUp_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

     <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.7.0/dist/multiple-select.min.css">
</head>

<body>

@include('home.includes.nav')


<main>
    <div class="form-control">
        <div>
            <h2>Sign Up</h2>
            <h4>Enter Your Credentials to Sign Up</h4>
            <form action="{{ route('save.register.user') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Phone">
                <input type="password" name="pword" placeholder="Password">
                <select  name="user_location">
                    <option disabled selected>Select State</option>
                    <option>Abia</option>
                    <option>Adamawa</option>
                    <option>Akwa Ibom</option>
                    <option>Anambra</option>
                    <option>Bauchi</option>
                    <option>Bayelsa</option>
                    <option>Benue</option>
                    <option>Borno</option>
                    <option>Cross River</option>
                    <option>Delta</option>
                    <option>Ebonyi</option>
                    <option>Edo</option>
                    <option>Ekiti</option>
                    <option>Enugu</option>
                    <option>Gombe</option>
                    <option>Imo</option>
                    <option>Jigawa</option>
                    <option>Kaduna</option>
                    <option>Kano</option>
                    <option>Katsina</option>
                    <option>Kebbi</option>
                    <option>Kogi</option>
                    <option>Kwara</option>
                    <option>Lagos</option>
                    <option>Nasarawa</option>
                    <option>Niger</option>
                    <option>Ogun</option>
                    <option>Ondo</option>
                    <option>Osun</option>
                    <option>Oyo</option>
                    <option>Plateau</option>
                    <option>Rivers</option>
                    <option>Sokoto</option>
                    <option>Taraba</option>
                    <option>Yobe</option>
                    <option>Zamfara</option>
                    <option>Federal Capital Territory (FCT)</option>
                </select>
                <label style="margin-top: 5px; text-align: start;">Select From The Option Below <i class="fa fa-arrow-down"></i></label>
                <select multiple="multiple" class="multiple-select" name="multiple_selection[]">
                    @foreach ($main_services as $service)
                        <option value="{{ $service->id }}">{{ $service->service_list }}</option>
                    @endforeach

                    <optgroup label="Advanced Services">
                        @foreach ($advanced_services as $service)
                            <option value="{{ $service->id }}">{{ $service->service_list }}</option>
                        @endforeach
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
<script src="https://unpkg.com/multiple-select@1.7.0/dist/multiple-select.min.js"></script>
<script>
  $(function() {
    $('.multiple-select').multipleSelect()
  })
</script>
