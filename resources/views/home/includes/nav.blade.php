
<style>
    .active-link {
        /* Define the styles for the active link */
        color: #ff0000; /* For example, change the text color to red */
        font-weight: bold; /* For example, make the text bold */
        background-color: red;
        /* Add any other styles you want for the active link */
    }

</style>
<nav class="navbar">
    <a href="{{route('index')}}" class="logo">Logo</a>
    <ul>
        @foreach($categories as $category)
            @if($category->subcategories->count() > 0)
                <li>
                    <a href="{{ route('category.product', $category->id) }}"
                           class="{{ isset($categoryName) && $categoryName == $category->catname ? 'active' : '' }}
">
                        {{ $category->catname }}
                    </a>
                </li>
            @endif
        @endforeach


        <li><a href="javascript:void(0)">Car Service</a></li>
      <li><a href="javascript:void(0)">Scrapyard</a></li>
    </ul>
    <span class="nav_form">
      <a href="{{route('register')}}" target="_blank" class="signUp">Sign Up</a>
      <a href="{{route('login')}}" class="login" target="_blank">Login</a>
    </span>
    <i class="fa fa-close" id="close_nav"></i>
    <i class="fa fa-bars" id="open_nav"></i>
  </nav>
