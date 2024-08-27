<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare</title>
    <link rel="icon" type="image/x-icon" href="/home/images/logo2.png">
    <link rel="stylesheet" href="/home/css/cars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<style>
    .comment-section {
        margin-top: 20px;
    }

    .comment-section h4 {
        margin-bottom: 10px;
    }

    .comment-section textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical;
        margin-bottom: 10px;
    }

    .comment-section button {
        background-color: #394293;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .comment-section button:hover {
        background-color: #0056b3;
    }



</style>

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
    .hero {
        width: 100%;
        min-height: 30vh;
        background: url(images/cars/Optimized-dima-panyukov-6bzyGhyVg6M-unsplash.jpg) no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
        color: #ffffff;
    }

    .compare {
        width: 100%;
    }

    .c-row {
        max-width: 1200px;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: stretch;
        gap: 10px;
    }

    .c-row div {
        background-color: #f7f7f7;
        width: 35%;
        display: flex;
        justify-content: start;
        align-items: center;
        flex-direction: column;
        color: #000000;
        padding: 10px;
    }

    .add {
        height: 100px;
        justify-content: center !important;
        align-items: center;
        text-align: center;
    }

    .add a {
        padding: 10px 30px;
        background-color: #363636;
        text-decoration: none;
        color: #ffffff;
        border-radius: 5px;
    }

    #remove {
        margin-left: auto;
        padding: 5px 10px;
        background-color: #a80000;
        color: #fff;
        cursor: pointer;
        font-size: 10px;
    }

    .details-wrap {
        max-width: 1200px;
        margin: auto;
    }

    .compare .details {
        display: flex;
        justify-content: start;
        align-items: center;
        gap: 10px;
        padding: 1rem;
    }

    .compare .details div {
        background-color: #f7f7f7;
        width: 35%;
        min-height: 50px;
        display: flex;
        justify-content: start;
        align-items: center;
        color: #000000;
        padding: 10px;
    }

    .compare .details .title {
        font-weight: bold;
    }

    .add-modal {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        min-height: 100vh;
        background-color: #00000051;
        z-index: 99999;
        padding: 2rem 0;
        overflow-y: auto;
        display: none;
    }

    .modal {
        background-color: #ffffff;
        max-width: 1200px;
        padding: 2rem 1rem;
        margin: auto;
        position: relative;
    }

    .close-add-modal {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 5px 10px;
        background-color: red;
        color: #fff;
        cursor: pointer;
        font-weight: bolder;
        font-size: 13px;
    }
</style>

<body>

@include('home.includes.nav')

<header class="hero">
    <h1>Compare</h1>
</header>
<main>

    <br><br>

    <div class="compare">
        <div class="c-row">
            <div class="add">
                <a id="open-add-modal" style="cursor: pointer;"><i class="fa fa-add"></i>&nbsp; Add</a>
            </div>
            <!-- Dynamically added compare items will be displayed here -->
        </div>

        <div class="details-wrap">
            <!-- Dynamic price and other details comparison will be inserted here -->
        </div>
    </div>

</main>
<div class="add-modal" style="display: none;"> <!-- Initially hidden -->
    <div class="modal">
        <a class="close-add-modal"><i class="fa-solid fa-x"></i></a>
        <div class="latest" style="margin: auto;">
            <div>
                <h3 style="text-align: center;">Select to compare</h3><br>
                <form action="" style="display: flex; border-radius: 50px; justify-content: space-between;
         padding: 5px 10px; align-items: center; max-width: 300px; background-color: #ececec; margin: auto;">
                    <input type="text" placeholder="search"
                           style="width: 85%; padding: 5px 10px;  border: none !important; outline: none !important; background-color: transparent;">
                    <button style="padding: 10px; border: none !important; outline: none !important; cursor: pointer;"><i
                            class="fa fa-magnifying-glass"></i></button>
                </form>
            </div>
            <br>
            <div class="card_group">
                @foreach ($products as $product)
                    <div class="card">
                        <a href="{{route('product.show', $product->id)}}" class="card_link">
                            <div class="card_img" style="background: url('{{ $product->images[0]['image'] }}') no-repeat;"></div>
                        </a>
                        <div class="card_text">
                            <h5>{{ $product->car_name }}</h5>
                            <div class="details">
                                <ul>
                                    <li>New</li>
                                    <li>{{ $product->cylinder }}</li>
                                    <li style="background-color: {{ $product->color }}; border: 1px solid; color: #000;">{{ $product->color }}</li>
                                    <li>Fuel</li>
                                </ul>
                                <h5>₦{{ number_format($product->price, 2) }}</h5>
                                <p>{{ $product->location }} ({{ $product->mileage }})</p>
                            </div>
                        </div>
                        <div class="card_footer">
                            <a href="javascript:void(0)" style="text-decoration: none; padding: 10px 25px; background: #d6d6d6; color: #000000; font-size: 13px; font-weight: bold;"
                               onclick="addToCompare({{ $product->id }}, '{{ $product->car_name }}', '{{ number_format($product->price, 2) }}', '{{ $product->images[0]['image'] }}', '{{ $product->cylinder }}', '{{ $product->color }}', 'Fuel', '{{ $product->location }}', '{{ $product->mileage }}')">
                                Compare
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination Section here -->
        </div>
    </div>
</div>


<script>
    let compareArray = [];

    function addToCompare(id, name, price, image, cylinder, color, fuel, location, mileage) {
        if (compareArray.length >= 2) {
            alert("You can only compare 2 items at a time.");
            return;
        }

        if (compareArray.some(product => product.id === id)) {
            alert("This product is already in the comparison list.");
            return;
        }

        compareArray.push({ id, name, price, image, cylinder, color, fuel, location, mileage });
        updateCompareSection();
    }

    function removeFromCompare(id) {
        compareArray = compareArray.filter(product => product.id !== id);
        updateCompareSection();
    }

    function updateCompareSection() {
        const compareSection = document.querySelector('.compare .c-row');
        compareSection.innerHTML = `
        <div class="add">
            <a id="open-add-modal" style="cursor: pointer;"><i class="fa fa-add"></i>&nbsp; Add</a>
        </div>
        ${compareArray.map(product => `
            <div>
                <a href="#" onclick="removeFromCompare(${product.id})"><i class="fa fa-x"></i></a>
                <img src="${product.image}" width="100%" alt=""><br>
                <h3>${product.name}</h3>
            </div>
        `).join('')}
    `;

        const detailsSection = document.querySelector('.compare .details-wrap');
        if (compareArray.length === 2) {
            detailsSection.innerHTML = `
            <div class="details">
                <div class="title"><p>Price</p></div>
                <div>₦${compareArray[0].price}</div>
                <div>₦${compareArray[1].price}</div>
            </div>
            <div class="details">
                <div class="title"><p>Cylinder</p></div>
                <div>${compareArray[0].cylinder}</div>
                <div>${compareArray[1].cylinder}</div>
            </div>
            <div class="details">
                <div class="title"><p>Color</p></div>
                <div>${compareArray[0].color}</div>
                <div>${compareArray[1].color}</div>
            </div>
            <div class="details">
                <div class="title"><p>Fuel Type</p></div>
                <div>${compareArray[0].fuel}</div>
                <div>${compareArray[1].fuel}</div>
            </div>
            <div class="details">
                <div class="title"><p>Location</p></div>
                <div>${compareArray[0].location}</div>
                <div>${compareArray[1].location}</div>
            </div>
            <div class="details">
                <div class="title"><p>Mileage</p></div>
                <div>${compareArray[0].mileage}</div>
                <div>${compareArray[1].mileage}</div>
            </div>
        `;
        } else {
            detailsSection.innerHTML = '';
        }

        reapplyEventListeners();
    }
    function reapplyEventListeners() {
        const addModalButton = document.getElementById('open-add-modal');
        if (addModalButton) {
            addModalButton.addEventListener('click', function () {
                openAddModal();
            });
        }

        const removeButtons = document.querySelectorAll('.compare .c-row a[onclick^="removeFromCompare"]');
        removeButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const productId = parseInt(button.getAttribute('onclick').match(/\d+/)[0]);
                removeFromCompare(productId);
            });
        });

        const closeAddModalButton = document.querySelector('.close-add-modal');
        if (closeAddModalButton) {
            closeAddModalButton.addEventListener('click', function () {
                closeAddModal();
            });
        }

        window.addEventListener('click', function (event) {
            const modal = document.querySelector('.add-modal');
            if (event.target === modal) {
                closeAddModal();
            }
        });
    }

    function openAddModal() {
        const modal = document.querySelector('.add-modal');
        modal.style.display = 'block';
    }

    function closeAddModal() {
        const modal = document.querySelector('.add-modal');
        modal.style.display = 'none';
    }

    // Initialize event listeners on page load
    document.addEventListener('DOMContentLoaded', function () {
        reapplyEventListeners();
    });

</script>

@include('home.includes.footer')

<script>
    $(document).ready(function () {
        state = true;
        $(".aside_hide").on("click", function () {
            if (state) {
                $(".aside").css({
                    display: "block",
                    "z-index": "999",
                });
                $(".aside_hide").css("display", "none");
            }
        });

        $(".close_aside").on("click", function () {
            if ($(state)) {
                $(".aside").css({
                    display: "none",
                });
                $(".aside_hide").css("display", "flex");
            }
        });

        // -------------------------------------
        $height = $(".car_type_nav").height() + $(".navbar").height();
        $(window).scroll(function () {
            if ($(window).scrollTop() > $height) {
                $(".car_type_nav").css({
                    position: "fixed",
                    top: "3.9rem",
                    left: "0",
                    "z-index": "999",
                });
            } else {
                $(".car_type_nav").css({
                    position: "normal",
                    top: "inherit",
                    "z-index": "999",
                });
                $(".hero").css("padding-top", "5rem");
            }
        });
        // ---------------------------------------------------------------------------
        $("#open-add-modal").on("click", function () {
            $(".add-modal").css({
                display: "block",
                "z-index": "99999",
            });
        });
        $(".close-add-modal").on("click", function () {
            $(".add-modal").css({
                display: "none",
                "z-index": "0",
            });
        });
        // ---------------------------------------------------------------------------
    });

</script>


</body>
</html>
