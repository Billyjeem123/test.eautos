<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
  <link rel="stylesheet" href="/home/css/report.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body>
    @include('home.includes.nav')

  <main>
    <div class="form-control">
      <h2>REPORT FORM</h2>
      <div>
        <form action="{{ route('report.save') }}" method="POST">
            @csrf
            <input type="text" name="offender_name" placeholder="Name of Offender">
            <span class="form_group">
                <input type="text"  id="business_email"  name="business_name" placeholder="Business Email">
                <p id="emailMessage" class="error"></p>
                <input type="text" name="location" placeholder="Location">
            </span>
            <textarea name="complain" cols="30" rows="5" placeholder="Complain"></textarea>
            <h2>...</h2>
            <input type="text" name="name" placeholder="Name" value="{{ auth()->check() ? auth()->user()->name : '' }}">

            <span class="form_group">
                <input type="text" name="country" placeholder="Country">
                <input type="text" name="phone_number" placeholder="Phone Number">
                <input type="text" name="email" placeholder="Email Address">
            </span>
            @if(auth()->check())
                <button type="submit">Send Report</button>
            @else
                <button type="submit">Login to continue</button>
            @endif

        </form>

      </div>
    </div>

  </main>

  @include('home.includes.footer')

    <!-- Include jQuery (if not already included) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {

            // Function to check email existence
            function checkEmailExists() {
                var input = $('#business_email').val();

                if (input.length >= 3) {
                    $.ajax({
                        url: "{{ route('suggest.emails') }}",
                        method: 'GET',
                        data: { email: input },
                        success: function(response) {
                            if (response.exists) {
                                // Email found, set the value of business_name input
                                $('input[name="business_name"]').val(response.business_name);
                                toastr.success('User Found.');
                                $('#emailMessage').removeClass('error').text('');
                            } else {
                                // Email not found
                                $('input[name="business_name"]').val('');
                                toastr.error('Email not found.');

                            }
                        }
                    });
                } else {
                    // Clear suggestions if input length is less than 3
                    $('#emailMessage').removeClass('error').text('');
                }
            }

            // Trigger email check when user switches input fields
            $('#business_email').on('blur', function() {
                checkEmailExists();
            });
        });
    </script>


