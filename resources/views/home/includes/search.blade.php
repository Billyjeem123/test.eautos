<header class="hero" style="background: url('{{ !empty($category->cat_image) || !empty($categoryImage) ? (empty($category->cat_image) ? $categoryImage : $category->cat_image) : '/home/images/cars/landing.jpg' }}') no-repeat center center / cover;">

<div class="form_group">
        <form action="{{ route('search') }}" method="GET">
            <div class="form_control">
                <div class="select_wrapper">
                    <label for="brand"></label>
                    <select id="brand" class="form-control bg-white" name="brand_id">
                        <option selected>Select Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="select_wrapper">
                    <label for="model"></label>
                    <select name="category_id" id="model">
                        <option selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->catname }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="select_wrapper">
                    <label for="year"></label>
                    <select name="year" id="year">
                        <option value="" selected disabled>Enter Year</option>
                        @for ($year = 2000; $year <= 2024; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form_control">
                <div class="min-max">
                    <label for="min" class="for_min"><span><small>Minimum price</small><strong>No Min₦</strong></span></label>
                    <select name="min_price" id="min">
                        <option value="" disabled selected>No Min</option>
                        @for ($price = 1000000; $price <= 5000000; $price += 1000000)
                            <option style="display: flex; flex-direction: row-reverse;" value="{{ $price }}"> {{ number_format($price) }}</option>
                        @endfor
                    </select>
                    <label for="max" class="for_max"><span><small>Maximum price</small><strong>No Max₦</strong></span></label>
                    <select name="max_price" id="max">
                        @for ($price = 10000000; $price <= 50000000; $price += 10000000)
                            <option value="{{ $price }}">₦ {{ number_format($price) }}</option>
                        @endfor
                    </select>
                </div>

                <div class="hero_button">
                    <button id="filter" style="display: none"><strong style="color: #363636;">Filter</strong></button>
                    <button id="search" type="submit">Search</button>
                </div>
            </div>
        </form>

    </div>
</header>
