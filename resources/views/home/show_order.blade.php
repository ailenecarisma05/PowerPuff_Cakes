<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>PowerPuff Cakes - Show Order</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/7375c99873.js" crossorigin="anonymous"></script>
    <style>
        .summary { 
            border: 1px solid #000; 
            padding: 20px; 
            border-radius: 5px; 
            margin-bottom: 20px;
        }

        .btn-dark-white-font {
            background-color: black; 
            color: #fff; 
        }

        .btn-dark-white-font:hover { 
            color: black; 
            background-color: lightgray;  
        }
        .summary-title {
            font-weight: bold; 
            font-size: 20px;
            padding: 5px;
        }

        .profile-info, .order-details { 
            padding: 20px; 
            box-sizing: border-box; 
            border: 1px solid #ddd; 
            border-radius: 5px; 
        }

        /* New styles for aligning image and product details */
        .product-item {
            display: flex; /* Enables flexbox layout */
            align-items: flex-start; /* Aligns items to the start */
            margin-bottom: 20px;
        }

        .product-item img {
            margin-right: 15px; /* Space between image and text */
            border: 1px solid #ddd; /* Optional: adds a border around the image */
            border-radius: 5px;
        }

        .product-details {
            flex-grow: 1; /* Takes remaining width */
        }

        /* Media query for mobile view */
        @media (max-width: 768px) {
            .product-item {
                flex-direction: column; /* Stack image and details vertically */
                align-items: flex-start; /* Aligns items to the start */
            }

            .product-item img {
                margin-right: 0; /* Remove right margin for mobile view */
                margin-bottom: 10px; /* Space below the image */
            }
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')

        <div class="container mt-5">
            <div class="row">
                <!-- Profile Information Section (Left Column) -->
                <div class="col-lg-6 col-md-12">
                    <div class="profile-info summary">
                        <h3 class="summary-title">Profile Information</h3>
                        <h4 style="padding:10px;">Name: {{ $user->name }}</h4>
                        <h4 style="padding:10px;">Email: {{ $user->email }}</h4>
                        <h4 style="padding:10px;">Phone: {{ $user->phone }}</h4>
                        <h4 style="padding:10px;">Address: {{ $user->address }}</h4>

                        <h3 class="summary-title">Delivery/Pickup</h3>
                        <div class="custom-control custom-radio" style="padding:10px;">
                            <input type="radio" id="delivery" name="shipping" class="custom-control-input" onclick="updateShippingFee('delivery')" checked>
                            <label class="custom-control-label" for="delivery">Deliver (₱100.00)</label>
                        </div>
                        <div class="custom-control custom-radio" style="padding:10px;">
                            <input type="radio" id="pickup" name="shipping" class="custom-control-input" onclick="updateShippingFee('pickup')">
                            <label class="custom-control-label" for="pickup">Pick Up (₱0.00)</label>
                        </div>

                        <h3 class="summary-title">Payment Method</h3>
                        <div class="custom-control custom-radio" style="padding:15px;">
                            <input type="radio" id="payment" name="payment" class="custom-control-input" checked>
                            <label class="custom-control-label" for="payment">Cash On Delivery</label>
                        </div>
                    </div>
                </div>

                <!-- Order Details Section (Right Column) -->
                <div class="col-lg-6 col-md-12">
                    <div class="order-details summary">
                        <h3 class="summary-title">Your Order</h3>
                        <table class="table table-summary">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $TotalPrice = 0; ?>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td>
                                        <!-- Product Item with image and details aligned side by side -->
                                        <div class="product-item">
                                            <!-- Product Image -->
                                            <img src="/product/{{ $item->image }}" width="100" height="100">

                                            <!-- Product Details -->
                                            <div class="product-details">
                                                <strong>{{ $item->product_name }}</strong>
                                                <h6>Price: {{ $item->price }}</h6>
                                                <h6>Size: {{ $item->size }}</h6>
                                                <h6>Flavor: {{ $item->flavor }}</h6>
                                                <h6>Filling: {{ $item->filling }}</h6>
                                                <h6>Icing: {{ $item->icing }}</h6>
                                                <h6>Candles: {{ $item->candles }}</h6>
                                                <h6>Celeb. Name: {{ $item->celebrant_name }}</h6>
                                                <h6>Card Msg: {{ $item->card_message }}</h6>
                                                <h6>Delivery Date: {{ $item->delivery_date }}</h6>
                                                <h6>Delivery Time: {{ $item->delivery_time }}</h6>
                                                <h6>Quantity: {{ $item->quantity }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                <?php $TotalPrice += $item->price * $item->quantity; ?>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="summary-subtotal">
                            <hr>
                            Subtotal: <span class="float-right">₱{{ number_format($TotalPrice, 2) }}</span>
                        </div>
                        <div class="summary-total">
                            <hr>
                            Shipping Fee: <span id="shippingFeeElement" class="float-right">₱100.00</span>
                            <hr>
                            Total: <span id="total-amount" class="float-right">₱{{ number_format($TotalPrice + 100, 2) }}</span>
                        </div>

                        <!-- Form for placing the order -->
                        <form action="{{ url('order_table') }}" method="POST">
                            @csrf
                            <!-- Include hidden fields to capture all necessary data -->
                            <input type="hidden" name="totalPrice" value="{{ $TotalPrice }}">
                            <input type="hidden" name="shippingFee" id="hiddenShippingFee" value="100.00">
                            <input type="hidden" name="totalAmount" id="hiddenTotalAmount" value="{{ $TotalPrice + 100 }}">
                            <input type="hidden" name="userId" value="{{ $user->id }}">
                            <input type="hidden" name="cartItems" value="{{ json_encode($cartItems) }}">
                            <input type="hidden" name="shippingMethod" id="shippingMethod" value="delivery">

                            <!-- Place Order Button -->
                            <!-- Place Order Button with custom styles -->
                            <button type="submit" class="btn btn-outline-dark-2 btn-block mb-3 btn-dark-white-font2" 
                                style="margin-top: 20px; background-color: black; color: white;"
                                onmouseover="this.style.backgroundColor='lightgray'; this.style.color='black';"
                                onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                                PLACE ORDER
                            </button>


                        </form>
                        <a href="{{ url('show_cart') }}" class="btn btn-outline-dark-2 btn-block mb-3 btn-dark-white-font"><span>BACK TO CART</span><i class="icon-refresh"></i></a>
                        <a href="{{ url('/') }}" class="btn btn-outline-dark-2 btn-block mb-3 btn-dark-white-font"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initializing shipping fee and total price variables
        let shippingFee;
        let totalPrice = {{$TotalPrice}} ; // Subtotal of the items
        const shippingFeeElement = document.getElementById("shippingFeeElement");
        const totalAmountElement = document.getElementById("total-amount");

        // Function to update the shipping fee and total amount based on the selected option
        function updateShippingFee(shippingOption) {
            if (shippingOption === 'delivery') {
                shippingFee = 100.00;
            } else {
                shippingFee = 0.00;
            }

            // Update the displayed shipping fee
            shippingFeeElement.innerText = `₱${shippingFee.toFixed(2)}`;

            // Update hidden form fields for submission
            document.getElementById('hiddenShippingFee').value = shippingFee;
            document.getElementById('shippingMethod').value = shippingOption;

            // Calculate and display the new total amount
            const totalAmount = totalPrice + shippingFee;
            totalAmountElement.innerText = `₱${totalAmount.toFixed(2)}`;
            document.getElementById('hiddenTotalAmount').value = totalAmount;
        }
    </script>
</body>

</html>
