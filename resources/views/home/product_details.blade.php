<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Metas -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="Cakes, Bakery, PowerPuff" />
    <meta name="description" content="Delicious cakes from PowerPuff Cakes bakery" />
    <meta name="author" content="PowerPuff Cakes" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="image/x-icon">
    <title>PowerPuff Cakes</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- Font Awesome Style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles for this Template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive Style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/7375c99873.js" crossorigin="anonymous"></script>
    <style>
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product-container .col-lg-6 {
            flex-basis: 50%;
        }

        .img_design {
            width: 100%;
            height: auto;
            margin: 0 auto;
            padding-bottom: 30px;
        }

        .product-info {
            padding: 5px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .inline-form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Space between fields */
            margin-top: 20px;
        }

        .inline-form label {
            margin-right: 10px;
        }

        .inline-form input, 
        .inline-form select, 
        .inline-form textarea {
            flex: 1; /* Allows input fields to grow and fill space */
            min-width: 200px; /* Set a minimum width for the fields */
        }

        .inline-form .form-group {
            display: flex;
            flex-direction: column;
            flex-basis: 100%; /* Full width for label */
        }
        .btn-dark-white-font {
            background-color: black; 
            color: #fff; 
        }

        .btn-dark-white-font:hover { 
            color: black; 
            background-color: lightgray;  
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
            }
            .product-container .col-lg-6 {
                flex-basis: 100%;
            }
            .inline-form {
                flex-direction: column; /* Stack fields vertically on small screens */
            }
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Header Section Starts -->
        @include('home.header')

        <!-- Main Content Starts -->
        <div class="container mt-5">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
            @endif

            <!-- Product Section -->
            <div class="product-container row align-items-start">
                <!-- Product Image Section -->
                <div class="col-lg-6">
                    <a href="{{ url('all_products') }}">
                        <i class="fa-solid fa-arrow-left" style="font-size: 24px; margin-bottom: 20px;"></i>
                    </a>
                    <img class="img_design rounded" src="/product/{{ $product->image }}" alt="{{ $product->product_name }}">
                </div>

                <!-- Product Information Section -->
                <div class="col-lg-6">
                    <div class="product-info">
                        <!-- Common Information for All Categories -->
                        <h1 style="font-size: 50px; margin-bottom: 0;">{{ $product->product_name }}</h1>
                        <h2 style="font-size: 40px;">₱ {{ $product->price }}</h2>
                        <h3 class="mt-4" style="padding-top: 5%;">Product Category: {{ $product->category }}</h3>
                        <p style="padding-top: 5%;">{{ $product->description }}</p>
                        <h6 style="padding-top: 20px; margin-bottom: 20px;">Available Quantity: {{ $product->quantity }}</h6>

                        <!-- Conditional Form Based on Product Category -->
                        <form action="{{ url('add_cart', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">

                            <div class="inline-form">
                                <!-- Quantity Field - Common for All Categories -->
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                                </div>

                                <!-- Conditional Fields for "Cake" Category -->
                                @if($product->category == 'Cakes')
                                    <!-- Size of the Cake -->
                                    <div class="form-group">
                                        <label for="size">Size of the Cake:</label>
                                        <select id="size" name="size" required>
                                            <option value="">Select Size</option>
                                            <option value="6 inches">6 inches</option>
                                            <option value="8 inches">8 inches</option>
                                            <option value="10 inches">10 inches</option>
                                            <option value="12 inches">12 inches</option>
                                        </select>
                                    </div>

                                    <!-- Cake Flavor -->
                                    <div class="form-group">
                                        <label for="flavor">Cake Flavor:</label>
                                        <select id="flavor" name="flavor" required>
                                            <option value="">Select Flavor</option>
                                            <option value="choco-moist">Chocolate Moist</option>
                                            <option value="white-choco">White Chocolate</option>
                                            <option value="red-velvet">Red Velvet</option>
                                            <option value="vanilla">Vanilla</option>
                                            <option value="coffee-mocha">Coffee Mocha</option>
                                            <option value="strawberry">Strawberry Delight</option>
                                            <option value="ube">Ube (Purple Yam)</option>
                                        </select>
                                    </div>

                                    <!-- Cake Filling -->
                                    <div class="form-group">
                                        <label for="filling">Cake Filling:</label>
                                        <select id="filling" name="filling" required>
                                            <option value="">Select Filling</option>
                                            <option value="chocolate">Chocolate</option>
                                            <option value="cream-cheese">Cream Cheese</option>
                                            <option value="vanilla">Vanilla</option>
                                            <option value="butter-cream">Butter Cream</option>
                                            <option value="strawberry">Strawberry</option>
                                            <option value="mocha-butter">Mocha Butter Cream</option>
                                            <option value="leche-flan">Leche Flan</option>
                                        </select>
                                    </div>

                                    <!-- Cake Icing -->
                                    <div class="form-group">
                                        <label for="icing">Cake Icing:</label>
                                        <select id="icing" name="icing" required>
                                            <option value="">Select Icing</option>
                                            <option value="buttercream">Fondant</option>
                                            <option value="fondant">Butter Cream</option>
                                            <option value="buttercream">Vanilla</option>
                                            <option value="fondant">Cream Cheese</option>
                                            <option value="buttercream">Chocolate</option>
                                            <option value="fondant">Ube</option>
                                        </select>
                                    </div>

                                    <!-- Candles -->
                                    <div class="form-group">
                                        <label for="candles">Candles:</label>
                                        <input type="number" id="candles" name="candles" value="1" min="0">
                                    </div>

                                    <!-- Name of the Celebrant -->
                                    <div class="form-group">
                                        <label for="celebrant_name">Name of the Celebrant:</label>
                                        <input type="text" id="celebrant_name" name="celebrant_name" required>
                                    </div>

                                    <!-- Card Message -->
                                    <div class="form-group">
                                        <label for="card_message">Card Message:</label>
                                        <textarea id="card_message" name="card_message" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_date">Delivery Date:</label>
                                        <input type="date" id="delivery_date" name="delivery_date" required>
                                    </div>

                                    <!-- Delivery Time -->
                                    <div class="form-group">
                                        <label for="delivery_time">Delivery Time:</label>
                                        <input type="time" id="delivery_time" name="delivery_time" required>
                                    </div>
                                @elseif($product->category == 'Breads' || $product->category == 'Cookies')
                                    <!-- Delivery Date -->
                                    <div class="form-group">
                                        <label for="delivery_date">Delivery Date:</label>
                                        <input type="date" id="delivery_date" name="delivery_date" required>
                                    </div>

                                    <!-- Delivery Time -->
                                    <div class="form-group">
                                        <label for="delivery_time">Delivery Time:</label>
                                        <input type="time" id="delivery_time" name="delivery_time" required>
                                    </div>
                                @endif

                                <!-- Add to Cart Button -->
                                <div class="mt-3" style="width: 100%;">
                                    <button type="submit" class="btn btn-outline-dark-2 btn-block mb-3 btn-dark-white-font"
                                        style="width: 100%; margin-top: 20px; background-color: black; color: white;"
                                        onmouseover="this.style.backgroundColor='lightgray'; this.style.color='black';"
                                        onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                                    Add to Cart</button>
                                </div>
                            </div>
                        </form>

                        <!-- Customized Order Button (only for Cake category) -->
                        @if($product->category == 'Cake')
                            <a href="{{ url('custom_order') }}" class="btn btn-outline-dark-2 btn-block mb-3 btn-dark-white-font">
                                <span>Customized Order</span> <i class="icon-refresh"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="cpy_">
            <p class="mx-auto">© 2024 All Rights Reserved By <a href="#">PowerPuff Cakes</a><br> Distributed By <a href="https://themewagon.com/" target="_blank">PowerPuff Cakes</a></p>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>

</html>
