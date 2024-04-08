<header class="hero">

    <div class="form_group">
        <form action="">
            <div class="form_control">
                <div class="select_wrapper">
                    <label for="brand"><i class="fa fa-angle-down"></i></label>
                    <select id="brand" class="form-control bg-white" name="brand_id">
                        <option  selected>Select Brand  </option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>

                        @endforeach

                    </select>

                </div>
                <div class="select_wrapper">
                    <label for="model"><i class="fa fa-angle-down"></i></label>
                    <select name="model" id="model">
                        <option value="" selected disabled>Enter Model</option>
                        <option value="">C-class</option>
                        <option value="">E-class</option>
                        <option value="">AMG</option>
                    </select>
                </div>
                <div class="select_wrapper">
                    <label for="year"><i class="fa fa-angle-down"></i></label>
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
                    <label for="min" class="for_min"><i class="fa fa-angle-down"></i><span><small>Minimum
                  price</small><strong>No
                  Min</strong></span></label>
                    <select name="min" id="min">
                        <option value="">No Min</option>
                        @for ($price = 1000000; $price <= 5000000; $price += 1000000)
                            <option value="{{ $price }}">₦ {{ number_format($price) }}</option>
                        @endfor
                    </select>
                    <label for="max" class="for_max"><span><small>Maximum
                  price</small><strong>No
                  Max</strong></span><i class="fa fa-angle-down"></i></label>
                    <select name="max" id="max">
                        <!-- <option value="">999</option>
                        <option value="">999</option>
                        <option value="">999</option> -->
                    </select>

                </div>
                <div class="hero_button">
                    <button id="filter"><strong style="color: #363636;">Filter</strong></button>
                    <button id="search">Search</button>
                </div>

            </div>
        </form>
    </div>
</header>
