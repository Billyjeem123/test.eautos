<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Details</title>
  <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
  <link rel="stylesheet" href="/home/css/blog.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
@include('home.includes.nav')



  <header class="hero">
    <div class="card-group">
        <div class="card" style="background: url(/home/images/cars/landing.jpg); background-position: center important; background-size: cover !important; background-repeat: no-repeat !important;">

        </div>
        <div class="card">
            <h3>Trending News</h3>
            <ul>
                @foreach($unrelatedBlogs as $blogss)
                    <li>
                        <a href="#">
                            {!! nl2br(Str::limit($blogss['desc'], 100))!!}
                            @if (strlen($blogss['desc']) > 100)
                                <a href="{{route('show.blog.id', $blogss->id)}}">Read more</a>
                            @endif
                        </a>
                    </li>


                @endforeach
            </ul>
        </div>
    </div>

  </header>
  <main>

      <div class="blog">
          <h3>All Blogs</h3>
          <div class="blog-group">
              @forelse ($allBlogs as $blog)
                  <a href="{{route('show.blog.id', $blog->id)}}" class="card">
                      <div class="blog-img" style="background: url({{ $blog->image }}); background-position: center important; background-size: cover !important; background-repeat: no-repeat !important;"></div>
                      <h4>LatestNews</h4>
                      <p>{{ $blog->title }}</p>
                  </a>
              @empty
                  <p>No blog posts found.</p>
              @endforelse
          </div>
      </div>
  </main>


@include('home.includes.footer')

<script src="/home/assets/fontawesome/js/all.min.js"></script>
<script src="/home/js/jquery.js"></script>
<script src="/home/js/index.js"></script>
 <!-- Add Toastr JavaScript -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
