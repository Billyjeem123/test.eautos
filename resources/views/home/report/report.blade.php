<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
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
        <form action="{{ route('report.create') }}" method="POST">
            @csrf
            <input type="text" name="offender_name" placeholder="Name of Offender">
            <span class="form_group">
                <input type="text" name="business_name" placeholder="Business">
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
