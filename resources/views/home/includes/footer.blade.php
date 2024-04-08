

<footer>
  <div class="card_group">
    <div class="card">
      <h6>About</h6><br>
      <p>Lorem ipsum dolor sit amet consectetur. Ullamcorper bibendum diam sapien faucibus. Dolor in nibh malesuada
        pharetra aenean eu rhoncus. Non tortor sagittis metus vitae nunc. Varius congue faucibus lacus pharetra nisl
        risus. Bibendum integer fringilla id ante fusce varius eget.</p><br><br>
      <a href="#!">Learn More</a>
    </div>
    <div class="card">
      <h6>Services</h6>
      <nav class="footer_nav">
        <ul class="">
          <li><a href="cars/index.html">Cars</a></li>
          <li><a href="bikes/index.html">Bikes</a></li>
          <li><a href="trucks/index.html">Trucks</a></li>
          <li><a href="farm/index.html">Farms</a></li>
          <li><a href="plants/index.html">Plants</a></li>

          <li><a href="#!">Valuation</a></li>

          <li><a href="#!">Blacklist</a></li>
        </ul>
        <ul class="">
          <li><a href="#!">Privacy Police</a></li>
          <li><a href="#!">Terms and Conditions</a></li>
          <li><a href="#!">FAQs</a></li>
          <li><a href="#!">Contact Us</a></li>
        </ul>
      </nav>

    </div>
    <!-- <div class="card">

    </div> -->
    <div class="card">
      <h6>Follow us</h6>
      <div class="socials">
        <a href="#!"><i class="fab fa-facebook"></i></a>
        <a href="#!"><i class="fab fa-square-instagram"></i></a>
        <a href="#!"><i class="fab fa-linkedin"></i></a>
        <a href="#!"><i class="fab fa-square-x-twitter"></i></a>
      </div>
    </div>
  </div>
</footer>




<script src="/home/assets/fontawesome/js/all.min.js"></script>
<script src="/home/js/jquery.js"></script>
<script src="/home/js/index.js"></script>
 <!-- Add Toastr JavaScript -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


 @if(session('success'))
     <script>
         toastr.success('{{ session('success') }}', 'Success');
         // Unset the session immediately to avoid showing multiple times
         <?php session()->forget('success'); ?>
     </script>
 @endif

 @if($errors->has('error'))
     <script>
         toastr.error('{{ $errors->first('error') }}', 'Error');
         // Unset the session immediately to avoid showing multiple times
         <?php session()->forget('error'); ?>
     </script>
 @endif
</body>

</html>
