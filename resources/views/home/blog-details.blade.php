<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blod Deatails . {{$blog->title}}</title>
  <link rel="stylesheet" href="/home/css/blog.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .preserve-whitespace {
            white-space: pre-wrap; /* Preserve white spaces and line breaks */
        }
    </style>

</head>

<body>
@include('home.includes.nav')

  <header class="hero">
      <h1 style="padding-bottom: 3px;">Today's Interesting News</h1>
      <p style="font-size: 20px;">{{$blog->title}}</p>
      <small><em>Posted by: {{$blog->user->name}} <br> Date posted: {{$blog->created_at->diffForHumans()}}</em></small>
      <br><br>
    <div class="card-group">
        <div class="card" style="background: url('{{ $blog->image }}'); background-position: center important; background-size: cover !important; background-repeat: no-repeat !important;">

        </div>
        <div class="card">
            <h3>Similar Post</h3>
            <ul>
                @foreach($unrelatedBlogs as $blogss)
                    <li>
                        <a href="#">
                            {!! nl2br(Str::limit($blogss['desc'], 100))!!}
                            @if (strlen($blog['desc']) > 100)
                                <a href="{{route('show.blog.id', $blogss->id)}}">Read more</a>
                            @endif
                        </a>
                    </li>


                @endforeach
            </ul>
        </div>
    </div><br>
    <p>
        {!! nl2br($blog->desc) !!}
    </p>
  </header>
  <main>
    <div class="blog">
        <h3>Other Post</h3>
        <div class="blog-group">
            @forelse ($otherBlogs as $blog)
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
