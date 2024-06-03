<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Members</title>
    <link rel="stylesheet" href="/home/css/groupMembers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Add Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">


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
</head>

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
            <ul>
                @foreach ($members as $user)
                    <li>
                        <div class="image" style="background-image: url('{{ $user['image'] ? $user['image'] : 'https://th.bing.com/th/id/OIP.JXInZBqHTGeu5UkUPwcZBAHaHa?pid=ImgDet&w=179&h=179&c=7&dpr=1.3' }}');"></div>
                        <div class="details">
                            <h4>{{ $user['name'] }}</h4>
                            <p>{{ $user['experience'] }}</p>
                            <a href="{{route('user.profile', $user->id)}}">Connect</a>
                        </div>
                    </li>
                @endforeach
            </ul>
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
                            <div class="image" style="background: url('{{ $otherGroup->image }}') no-repeat;">
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


@include('home.includes.footer')


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
</body>

</html>
