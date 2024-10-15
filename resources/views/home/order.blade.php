<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>PowerPuff Cakes - Order</title>
    <!-- Bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- Font Awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <style>
        .order-item {
            display: flex;
            flex-wrap: wrap; /* Allow wrapping of items */
            justify-content: space-between;
            align-items: flex-start; /* Align items at the start */
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: center; /* Center text in columns */
        }

        .order-item div {
            flex: 1; /* Flex-grow for responsive sizing */
            min-width: 120px; /* Minimum width for responsiveness */
            max-width: 200px; /* Maximum width for consistency */
            padding: 5px; /* Add padding */
            box-sizing: border-box; /* Include padding in width calculations */
        }

        .product-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn-danger {
            color: #ff6464; /* Super light red color for text */
            background-color: rgba(255, 100, 100, 0.1); /* Transparent red color for background */
            border-color: #ff6464;
        }

        .btn-danger:hover {
            background-color: rgba(255, 107, 107, 0.658);
        }

        .btn-success {
            color: #25e935; /* Super light red color for text */
            background-color: rgba(144, 255, 100, 0.1); /* Transparent red color for background */
            border-color: #25e935;
        }

        .btn-success:hover {
            background-color: rgb(124, 248, 75);
        }
        .btn-dark-white-font {
            background-color: black; 
            color: #fff; 
            width: 50%;
        }

        .btn-dark-white-font:hover { 
            color: black; 
            background-color: lightgray;  
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .order-item {
                flex-direction: column; /* Stack items vertically on small screens */
                align-items: center; /* Center align items */
                text-align: center; /* Center text */
            }

            .order-item img {
                width: 100%; /* Make images responsive */
                height: auto; /* Maintain aspect ratio */
            }
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Header section starts -->
        @include('home.header')
        <!-- End header section -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="order-item">
                        <div><strong>Product Image</strong></div>
                        <div><strong>Product Details</strong></div>
                        <div><strong>Payment Status</strong></div>
                        <div><strong>Delivery Status</strong></div>
                        <div><strong>Total</strong></div>
                        <div><strong>Action</strong></div>
                    </div>
                    @foreach($order as $order)
                    <div class="order-item">
                        <div>
                            <div class="product-item">
                                <img src="product/{{ $order->image }}" width="100%" height="auto" alt="{{ $order->product_name }}">
                            </div>
                        </div>
                        <div style="text-align: left; padding-left: 10px">
                            <strong>{{ $order->product_name }}</strong><br>
                            <h6>₱{{ $order->price }}</h6>
                            <h6>Quantity: {{ $order->quantity }}</h6>
                            <h6>Size: {{ $order->size }}</h6>
                            <h6>Flavor: {{ $order->flavor }}</h6>
                            <h6>Filling: {{ $order->filling }}</h6>
                            <h6>Icing: {{ $order->icing }}</h6>
                            <h6>Candles: {{ $order->candles }}</h6>
                            <h6>Celeb. Name: {{ $order->celebrant_name }}</h6>
                            <h6>Card Msg: {{ $order->card_message }}</h6>
                            <h6>Delivery Date: {{ $order->delivery_date }}</h6>
                            <h6>Delivery Time: {{ $order->delivery_time }}</h6>
                        </div>
                        <div>{{ $order->payment_status }}</div>
                        <div>{{ $order->delivery_status }}</div>
                        <div>₱{{ $order->price * $order->quantity + $order->shipping_fee }}</div>
                        <div>
                            @if ($order->delivery_status == 'Processing')
                                <a href="{{ url('cancel_order', $order->id) }}" onclick="return confirm('Are you sure you want to Cancel this Order?')" class="btn btn-danger" style="color: black;">Cancel Order</a>
                            @elseif ($order->delivery_status == 'Delivered')
                                <a href="{{ url('order_received', $order->id) }}" class="btn btn-success" style="color: black; margin-top: 20px;">Order Received</a>
                            @elseif ($order->delivery_status == 'Cancelled Order')
                                <p>Cancelled</p>
                            @elseif ($order->delivery_status == 'Order Received')
                                <p>Received</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div><!-- End .col-lg-12 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <!-- Footer start -->
        <!-- jQuery -->
        <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
        <!-- Popper js -->
        <script src="{{ asset('home/js/popper.min.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('home/js/bootstrap.js') }}"></script>
        <!-- Custom js -->
        <script src="{{ asset('home/js/custom.js') }}"></script>
    </div><!-- End .hero_area -->
</body>
</html>
