<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Meta Info -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>PowerPuff Cakes - Show Cart</title>
    <!-- Bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- Font Awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <style>
        .btn-danger {
            color: #ff6464; /* Super light red color for text */
            background-color: rgba(255, 100, 100, 0.1); /* Transparent red color for background */
            border-color: #ff6464;
        }
        .btn-danger:hover {
            background-color: rgba(255, 100, 100, 0.3);
        }
        .summary-cart {
            border: 1px solid #ddd;
            padding: 20px;
            width: 100%;
        }
        .btn-dark-white-font {
            background-color: black;
            color: #fff;
        }
        .btn-dark-white-font:hover {
            color: black;
            background-color: rgba(138, 134, 134, 0.808);
        }
        .product-checkbox{
            padding: 20px;

        }
        /* Flexbox for layout */
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd; /* Optional: add border to each item */
        }
        .cart-item img {
            margin-right: 20px;
            width: 200px; /* Adjust image size */
            height: auto; /* Maintain aspect ratio */
        }
        .product-info {
            flex-grow: .5; /* Take available space */
        }
        .product-quantity, .product-total, .product-remove {
            text-align: center; /* Center content */
            width: 190px; /* Fixed width for alignment */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column; /* Stack items vertically */
                align-items: center; /* Center align items */
                text-align: center; /* Center text */
            }
            .cart-item img {
                margin: 0 0 10px 0; /* Margin only at bottom */
            }
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Header section starts -->
        @include('home.header')
        <!-- End header section -->

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-items">
                        <?php $TotalPrice = 0; ?>
                        @foreach($cart as $item)
                        <div class="cart-item">
                            <div class="product-checkbox">
                                <input type="checkbox" class="select-product" data-id="{{ $item->id }}" data-price="{{ $item->price }}" data-quantity="{{ $item->quantity }}">
                            </div>
                            <div class="product-image">
                                <img src="/product/{{ $item->image }}" alt="{{ $item->product_name }}">
                            </div>
                            <div class="product-info">
                                <strong>{{ $item->product_name }}</strong><br>
                                <strong>₱{{ number_format($item->price, 2) }}</strong><br>
                                <ul>
                                    <li><strong>Size:</strong> {{ $item->size }}</li>
                                    <li><strong>Flavor:</strong> {{ $item->flavor }}</li>
                                    <li><strong>Filling:</strong> {{ $item->filling }}</li>
                                    <li><strong>Icing:</strong> {{ $item->icing }}</li>
                                    <li><strong>Candles:</strong> {{ $item->candles }}</li>
                                    <li><strong>Celebrant Name:</strong> {{ $item->celebrant_name }}</li>
                                    <li><strong>Card Message:</strong> {{ $item->card_message }}</li>
                                    <li><strong>Delivery Date:</strong> {{ $item->delivery_date }}</li>
                                    <li><strong>Delivery Time:</strong> {{ $item->delivery_time }}</li>
                                </ul>
                            </div>
                            <div class="product-quantity">{{ $item->quantity }}</div>
                            <div class="product-total">₱{{ number_format($item->price * $item->quantity, 2) }}</div>
                            <div class="product-remove">
                                <a href="{{ url('remove_cart', $item->id) }}" 
                                   onclick="return confirm('Are you sure you want to remove this product?')" 
                                   class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                        <?php $TotalPrice += $item->price * $item->quantity; ?>
                        @endforeach
                    </div>
                </div><!-- End .col-lg-12 -->

                <aside class="col-lg-12" style="padding-bottom: 20px;">
                    <div class="summary summary-cart">
                        <h3 class="summary-title" style="font-weight:bold;">Cart Total</h3><!-- End .summary-title -->
                        <table class="table table-summary">
                            <tbody>
                                <tr class="summary-subtotal">
                                    <td style="font-weight:bold;">Subtotal:</td>
                                    <td id="subtotal" style="text-align: right;">₱0.00</td> <!-- Subtotal initially set to 0 -->
                                </tr><!-- End .summary-subtotal -->
                                <tr class="summary-total">
                                    <td style="font-weight:bold;">Total:</td>
                                    <td id="total" style="text-align: right;">₱0.00</td> <!-- Total initially set to 0 -->
                                </tr><!-- End .summary-total -->
                            </tbody>
                        </table><!-- End .table table-summary -->

                        <!-- Checkout button -->
                        <button id="checkout-btn" class="btn btn-outline-primary-2 btn-order btn-block btn-dark-white-font" disabled>
                            PROCEED TO CHECKOUT
                        </button>
                        <a href="{{ url('/all_products') }}" class="btn btn-outline-dark-2 btn-block mb-3 btn-dark-white-font"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </div>
                </aside><!-- End .col-lg-12 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div>

    <div class="cpy_">
        <p class="mx-auto">© 2024 All Rights Reserved By <a href="#">PowerPuff Cakes</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">PowerPuff Cakes</a>
        </p>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- Custom JS -->
    <script>
        // JavaScript to calculate total for selected products and update subtotal/total
       // Existing JavaScript to update totals for selected products and handle checkout
        const checkboxes = document.querySelectorAll('.select-product');
        const checkoutBtn = document.getElementById('checkout-btn');
        const subtotalField = document.getElementById('subtotal');
        const totalField = document.getElementById('total');

        function updateTotals() {
            let subtotal = 0;
            let total = 0;
            let selectedCount = 0;

            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const price = parseFloat(checkbox.getAttribute('data-price'));
                    const quantity = parseInt(checkbox.getAttribute('data-quantity'));
                    const productTotal = price * quantity;
                    subtotal += productTotal;
                    total += productTotal;
                    selectedCount++;
                }
            });

            subtotalField.textContent = '₱' + subtotal.toFixed(2);
            totalField.textContent = '₱' + total.toFixed(2);
            checkoutBtn.disabled = selectedCount === 0; // Enable checkout if at least one product is selected
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateTotals);
        });

                checkoutBtn.addEventListener('click', function() {
            const selectedProducts = []; // Array to store selected product IDs
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedProducts.push(checkbox.getAttribute('data-id')); // Push selected product IDs to the array
                }
            });

            if (selectedProducts.length > 0) {
                const productIds = selectedProducts.join(','); // Join IDs as comma-separated string
                window.location.href = `/show_order?ids=${productIds}`;  // Redirect with selected product IDs in the query string
            }
        });

            checkoutBtn.addEventListener('click', function() {
            const selectedProducts = []; // Array to store selected product IDs
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedProducts.push(checkbox.getAttribute('data-id')); // Push selected product IDs to the array
                }
            });

            if (selectedProducts.length > 0) {
                const productIds = selectedProducts.join(','); // Join IDs as comma-separated string
                window.location.href = `/show_order?ids=${productIds}`;  // Redirect with selected product IDs in the query string
            }
        });


    </script>
</body>
</html>
