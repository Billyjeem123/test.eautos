
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
            <li>
                <a href="{{ route('value.vehicle') }}" class="{{ request()->routeIs('value.vehicle') ? 'active' : '' }}">Value Asset</a>
            </li>

    </ul>
    <span class="nav_form">
      <a href="{{route('register')}}"  class="signUp">Sign Up</a>
      <a href="{{route('login')}}" class="login" >Login</a>
    </span>
    <i class="fa fa-close" id="close_nav"></i>
    <i class="fa fa-bars" id="open_nav"></i>
  </nav>
