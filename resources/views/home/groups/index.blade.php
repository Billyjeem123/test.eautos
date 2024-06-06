<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Activities</title>
    <link rel="stylesheet" href="/home/css/groupsPosts.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Add Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

</head>

<style>
    .short-video-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        padding: 15px;
    }

    .short-video-item {
        background-color: #f5f5f5;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .short-video-item video {
        width: 100%;
        height: 350px;
    }

    .video-stats,
    .video-info {
        padding: 10px;
    }

    .video-stats div {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }

    .video-stats i {
        margin-right: 5px;
    }

    .pagination-section {
        margin-top: 20px;
        text-align: center;
        align-content: center;
    }

    .pagination-section ul.pagination {
        margin: 0;
    }

    .pagination-section ul.pagination li.page-item {
        display: inline-block;
        margin-right: 5px;
    }

    .pagination-section ul.pagination li.page-item a.page-link {
        color: #007bff;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #007bff;
        border-radius: 3px;
    }

    .pagination-section ul.pagination li.page-item a.page-link:hover {
        background-color: #007bff;
        color: #fff;
    }

    .pagination-section ul.pagination li.page-item.active a.page-link {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }



</style>

<style>
    .liked-icon {
        color: #007bff !important;
    }
</style>

<body>
@include('home.includes.nav')
<header class="hero">
    <div class="">
        <h3>About Group</h3><br>
        <p>{{$group->description}}</p>
    </div>

</header>
<main>
    <div class="main_nav">
        <ul>
            <li><a href="{{ route('groups', $group->id) }}">Post</a><a href="{{ route('groups_members', $group->id) }}">Members</a></li>
            @auth
                @php
                    $isMember = auth()->user()->groups->contains($group->id);
                @endphp
                <li>
                    @if ($isMember)
                        <a href="javascript:void(0)">Joined</a>
                    @else
                        <a href="{{ route('groups.join', $group->id) }}">Join</a>
                    @endif
                </li>
            @else
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">Pending</a>--}}
{{--                </li>--}}
            @endauth


        </ul>
    </div>
    <section>



        <aside class="aside1">
            <div class="post_nav">
                <span class="img" style="background-image: url('https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png');"></span>
                <form id="postForm" action="{{ route('create_posts_users') }}" method="POST">
                    @csrf
                    <input type="hidden" name="group_id" id="group_id" value="{{ $group->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">
                    <input type="text" id="contents" placeholder="Write Something..." name="contents" required><br>

                    <button type="button" id="anonymous"><span><i class="fa fa-user-secret"></i></span>&nbsp;Anonymous Post</button>
                    <button type="submit" id="post">Post</button>
                </form>




            </div>



            <div class="card_group">
                <!-- -------- -->
                @forelse ($posts as $post)
                    <div class="card">
                        <div class="card_header">
                            <p>
                                <span class="img" style="width: 35px; height: 35px; background-color: #979797; border-radius: 50px;"></span>
                                <span class="name"><strong>{{ $post->user->name ?? 'Anonymous' }}</strong><br><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></span>
                            </p>
                        </div>
                        <div class="card_details">
                            <p>{{ $post->content }}</p>
                        </div>
                        <div class="card_footer">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <form class="like-form"  method="POST" action="{{route('posts.like', $post->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary like-btn" data-post-id="{{ $post->id }}">
                                            <i class="far fa-thumbs-up" style="{{ $post->isLikedByUser() ? 'color: #007bff !important;' : '' }}"></i>
                                            <span> Like</span>
                                            <span class="like-count">{{ $post->likes->count() }}</span>
                                        </button>
                                    </form>
                                </li>


                                <li class="list-inline-item">
                                    <button class="btn btn-primary"><i class="far fa-comment"></i><span> Comment</span></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary"><i class="fas fa-share"></i><span> Share</span></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-secondary"><small>{{ $post->views }} Views</small></button>
                                </li>
                            </ul>
                            <a href="#">View more comments</a>
                        </div>
                        <!-- ----- -->

                        <div class="sub_footer">
                            @foreach($post->comments as $comment)
                                <div class="sub_footer_header">
                                    <p>
                                        <span class="img" style="width: 30px; height: 30px; background-color: #979797; border-radius: 50px;"></span>
                                        <span class="name"><strong>{{ $comment->user->name }}</strong><br><small>{{ $comment->created_at->format('g:i A') }}</small></span>
                                    </p>
                                </div>
                                <p class="sub_footer_comment">
                                    {{ $comment->body }}
                                </p>
                            @endforeach

                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <span style="width: 35px; height: 35px; background-color: #979797; border-radius: 50px;"></span>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="text" name="body" placeholder="Write Something...">
                                <button type="submit">Comment</button>
                            </form>
                        </div>

                        <!-- ----- -->
                    </div>
                @empty
                    <p>No posts available.</p>
                @endforelse
                <!-- ------------- -->
                @if($posts->count() > 0)

                    <!-- Pagination Section -->
                    <div class="pagination-section">
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center flex-wrap">
                                    @if ($posts->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link">Prev</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}">Prev</a></li>
                                    @endif

                                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                        <li class="page-item {{ ($page == $posts->currentPage()) ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    @if ($posts->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                @endif

            </div>

        </aside>
        <aside class="aside2">
            <div class="about">
                <h3>About Group</h3><br>
                <p>{{$group->description}}</p>
                <a href="javascript:void(0);" class="btn btn-primary" id="shareGroupButton" data-url="{{ route('groups', ['id' => $group->id]) }}">Share Group</a>

            </div>
            <div class="other_group">
                <h3>Other Groups</h3><br>
                <ul>
                    @forelse($otherGroups as $otherGroup)
                        <li>
                            <div class="image">
                                <!-- Placeholder for group image, if any -->
                            </div>
                            <div class="details">
                                <h4>{{ $otherGroup->title }}</h4>
                                <p><span>{{$group->getMembersCountAttribute()}} member</span> 0 posts today</p>
                                <a href="{{route('groups', $otherGroup->id)}}">View</a>
                            </div>
                        </li>
                    @empty
                        <p>No other groups found.</p>
                    @endforelse
                </ul>

            </div>
            <!-- Pagination Section -->

            @if($otherGroups->count() > 0)
                <div class="pagination-section">
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center flex-wrap">
                                @if ($otherGroups->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">Prev</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $otherGroups->previousPageUrl() }}">Prev</a></li>
                                @endif

                                @foreach ($otherGroups->getUrlRange(1, $otherGroups->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $otherGroups->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                @if ($otherGroups->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $otherGroups->nextPageUrl() }}">Next</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif



        </aside>
    </section>
</main>


<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const shareButton = document.getElementById('shareGroupButton');

        shareButton.addEventListener('click', function () {
            const groupUrl = shareButton.getAttribute('data-url');
            const tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = groupUrl;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Display success message
            toastr.success('Link group copied');
        });
    });
</script>




<script>
    document.getElementById('anonymous').addEventListener('click', function() {
        document.getElementById('user_id').value = '';
        document.getElementById('postForm').submit();
    });
</script>


<script>
    document.getElementById('post').addEventListener('click', function() {
        // Check if the user is logged in using Laravel's authentication system
        @auth
        // If logged in, submit the form
        document.getElementById('postForm').submit();
        @else
        // If not logged in, alert the user to log in
            toastr.error('You need to log in to post an article.');
        return false;
        @endauth
    });
</script>





@include('home.includes.footer')

</body>

</html>
