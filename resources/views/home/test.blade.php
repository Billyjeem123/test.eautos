<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Activities</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
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
            <li><a href="groupsPosts.html">Post</a><a href="groupMembers.html">Members</a></li>
            <li><a href="groupMembers.html">Join</a></li>
        </ul>
    </div>
    <section>



        <aside class="aside1">
            <div class="post_nav">
                <span class="img" style="background-image: url(/home/images/people/smiling\ man.png);"></span>
                <form id="postForm">
                    <input type="hidden" id="group_id" value="{{ $group->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">

                    <input type="text" id="contents" placeholder="Write Something..."  name="contents" ><br>

                    <button id="anonymous"><span><i class="fa fa-user-secret"></i></span>&nbsp;Anonymous Post</button>
                    <button id="post">Post</button>
                </form>
            </div>



            <div class="card_group">
                <!-- -------- -->
                @forelse ($posts as $post)
                    <div class="card">
                        <div class="card_header">
                            <p>
                                <span class="img" style="width: 35px; height: 35px; background-color: #979797; border-radius: 50px;"></span>
                                <span class="name"><strong>{{ $post->user->name }}</strong><br><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></span>
                            </p>
                        </div>
                        <div class="card_details">
                            <p>{{ $post->content }}</p>
                        </div>
                        <div class="card_footer">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <button class="btn btn-primary like-btn" data-post-id="{{ $post->id }}">
                                        <i class="far fa-thumbs-up" style="{{ $post->isLikedByUser() ? 'color: #007bff !important;' : '' }}"></i>
                                        <span> Like</span>
                                        <span class="like-count">{{ $post->likes->count() }}</span>
                                    </button>
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

                        <!-- ----- -->
                    </div>
                @empty
                    <p>No posts available.</p>
                @endforelse
                <!-- ------------- -->

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
            </div>

        </aside>
        <aside class="aside2">
            <div class="about">
                <h3>About Group</h3><br>
                <p>{{$group->description}}</p>
                <a href="">Share Group</a>
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
                                <a href="">Join</a>
                            </div>
                        </li>
                    @empty
                        <p>No other groups found.</p>
                    @endforelse
                </ul>

            </div>
            <!-- Pagination Section -->
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
        </aside>
    </section>
</main>


<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('#postForm').on('submit', function(e) {
            e.preventDefault();

            const contents = $('#contents').val();
            const groupId = $('#group_id').val();
            const user_id = $('#user_id').val();
            const isAnonymous = $('#anonymous').hasClass('active');


            $.ajax({
                url: '{{route('create_posts_users')}}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    contents: contents,
                    group_id: groupId,
                    user_id:user_id,
                    anonymous: isAnonymous
                },
                success: function(response) {
                    toastr.success(response.message);
                    // Clear form fields
                    $('#contents').val('');
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        });

        $('#anonymous').on('click', function() {
            $(this).toggleClass('active');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.like-btn').click(function(e) {
            e.preventDefault();

            let button = $(this);
            let postId = button.data('post-id');
            let icon = button.find('i');

            $.ajax({
                type: 'POST',
                url: `/posts/${postId}/like`,
                success: function(response) {
                    if (response.message.includes('unliked')) {
                        // Remove color and force reflow
                        icon.css('color', '');
                        button.find('.like-count').text(response.likes_count); // Update like count
                        toastr.success(response.message);
                    } else {
                        // Change color to blue and force reflow
                        icon.css('color', '#007bff');
                        button.find('.like-count').text(response.likes_count); // Update like count
                        toastr.success(response.message);
                    }
                },
                error: function(response) {
                    toastr.error(response.responseJSON.message);
                }
            });
        });
    });
</script>


@include('home.includes.footer')

</body>

</html>




public function saveDealer(Request $request): \Illuminate\Http\RedirectResponse
{
// Validate the incoming request data

$messages  =  [
'name.required' => 'First name is required.',
'name.string' => 'First name must be a string.',
'name.max' => 'First name may not be greater than :max characters.',
'email.required' => 'Email is required.',
'email.email' => 'Invalid email format.',
'email.unique' => 'Email already exists.',
'pword.required' => 'Password is required.',
'pword.string' => 'Password must be a string.',
'pword.min' => 'Password must be at least :min characters long.',
'business_name' => 'Business name is required',
'phone.required' => 'Phone is required.',
'user_location.required' => "Location is required"
];

$validator = Validator::make($request->all(), [
'name' => 'required|string|max:255',
'phone' => 'required|string|max:255',
'email' => 'required|email|unique:users,email',
'user_location' => 'required',
'business_name' => 'required|unique:users,business_name',
'pword' => 'required|string|min:6', // Adjust the minimum password length as needed
], $messages);

// Check if validation fails
if ($validator->fails()) {
return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]); // Redirect back with input and error message
// return redirect()->back()->with(['error' => 'Category created successfully']);
}


// Create a new user instance and populate it with the validated data
$user = new User();
$user->name = $request->name;
$user->business_name = $request->business_name;
$user->experience = $request->experience;
$user->email = $request->email;
$user->phone = $request->phone;
$user->password = bcrypt($request->pword); // Hash the password for security
$user->is_active = 1;
$user->business_state = $request->user_location;
$user->role = 'dealer';

// Save the user to the database
$user->save();

$multiple_services =  $request->multiple_selection;

foreach ($multiple_services as $services) {
DB::table('business_services')->insert([
'user_id' => $user->id,
'bussiness_name' => $services,
'created_at' => now(),
'updated_at' => now(),
]);
}

// Authenticate and log in the user
Auth::login($user);

// Optionally, you can return a response or redirect to a different page
return redirect()->route('index')->with('success', 'Registration successful');

}
