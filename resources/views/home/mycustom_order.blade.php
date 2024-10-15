<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - Custom Cake Order</title>
    <link rel="stylesheet" href="{{ asset('home/css/mycustom.css') }}">
    <script src="https://kit.fontawesome.com/7375c99873.js" crossorigin="anonymous"></script>
    <style>/* Main container styling */
/* Main container styling */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 1200px;
            position: relative;
        }

        /* Header styles */
        h1, h2 {
            text-align: center;
            padding-top: 10px;
        }

        .order-summary {
            margin-top: 20px;
        }

        .order-summary .table-container {
            display: block; /* Allow the table to expand fully */
        }

        /* Table styles */
        .order-summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-summary th, .order-summary td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .order-summary th {
            background-color: #f8f8f8;
        }

        .receipt-footer {
            margin-top: 30px;
            text-align: center;
        }

        /* Image box styling */
        .image-box {
            display: inline-block;
            margin: 10px;
            justify-content: center;
        }

        .image-box img {
            max-width: 100px;
        }

        /* Total price style */
        .total-price {
            font-weight: bold;
            font-size: 18px;
        }

        /* Back arrow positioning */
        .back-arrow {
            position: absolute;
            top: 10px;
            left: 20px;
        }

        .back-arrow a {
            text-decoration: none;
            font-size: 18px;
            color: #000;
        }

        .back-arrow a:hover {
            color: #ff4a4a;
        }

        /* Swipe container and arrows */
        .swipe-container {
            overflow: hidden;
            white-space: nowrap;
            display: flex;
            position: relative;
        }

        /* Order container styling */
        .order-container {
            display: inline-block;
            white-space: normal;
            min-width: 100%;
            box-sizing: border-box;
        }

        /* Navigation arrows */
        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            cursor: pointer;
            z-index: 100;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 50%;
            padding: 10px;
            color: #555;
        }

        .nav-arrow:hover {
            background-color: #ff4a4a;
            color: #fff;
        }

        .nav-arrow.left {
            left: -30px;
        }

        .nav-arrow.right {
            right: -30px;
        }

        /* Responsive styles */
        @media only screen and (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            .order-summary table th, .order-summary table td {
                font-size: 14px;
                padding: 6px;
            }

            h1, h2 {
                font-size: 20px;
            }

            .total-price {
                font-size: 16px;
            }

            .image-box img {
                max-width: 80px;
            }

            .receipt-footer p {
                font-size: 12px;
            }
        }

        @media only screen and (max-width: 480px) {
            .order-summary table th, .order-summary table td {
                font-size: 12px;
                padding: 4px;
            }

            h1, h2 {
                font-size: 18px;
            }

            .total-price {
                font-size: 14px;
            }

            .image-box img {
                max-width: 60px;
            }

            .receipt-footer p {
                font-size: 10px;
            }

            .nav-arrow {
                font-size: 18px;
                padding: 8px;
            }
        }

</style>
</head>
<body>
    <div class="container">
        <div class="header-flex">
        <div class="back-arrow">
            <a href="{{ url('custom_order') }}"><i class="fa-solid fa-chevron-left"></i></a>
        </div>
        <h1 style="text-align: center;">Order Receipt</h1>
        <div class="logo">
            <img width="65" src="{{ asset('home/logo/logo.png') }}" alt="Logo">
        </div>
        
    </div>

        <div class="nav-arrow left">
            <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="nav-arrow right">
            <i class="fa-solid fa-chevron-right"></i>
        </div>

        <!-- Swipe container for orders -->
        <div class="order-summary">
            <div class="swipe-container">
                @foreach($customOrders as $customOrder)
                    <div class="order-container">
                        <!-- Split content into two columns -->
                        <div class="table-container">
                            <!-- First Column -->
                            <div class="column">
                                <table class="table">
                                    <tr>
                                        <th>Customer Name:</th>
                                        <td>{{ $customOrder->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $customOrder->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $customOrder->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $customOrder->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cake Flavor:</th>
                                        <td>{{ $customOrder->cake_flavor }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cake Filling:</th>
                                        <td>{{ $customOrder->cake_filling }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cake Icing:</th>
                                        <td>{{ $customOrder->cake_icing }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cake Shape:</th>
                                        <td>{{ $customOrder->cake_shape }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cake Size (Width):</th>
                                        <td>{{ $customOrder->cake_size_width }} inches</td>
                                    </tr>
                                    <tr>
                                        <th>Cake Size (Height):</th>
                                        <td>{{ $customOrder->cake_size_height }} inches</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Tiers:</th>
                                        <td>{{ $customOrder->tiers }}</td>
                                    </tr>
                                    <tr>
                                        <th>Theme:</th>
                                        <td>{{ $customOrder->theme }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Cupcakes:</th>
                                        <td>{{ $customOrder->cupcakes }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Candles:</th>
                                        <td>{{ $customOrder->candle_numbers }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pickup or Delivery:</th>
                                        <td>{{ $customOrder->pickup_delivery }}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Date:</th>
                                        <td>{{ $customOrder->delivery_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Time:</th>
                                        <td>{{ $customOrder->delivery_time }}</td>
                                    </tr>
                                    <th>Additional Information:</th>
                                    <td>{{ $customOrder->additional_info }}</td>
                                </tr>
                                <tr>
                                    <th>Card Message:</th>
                                    <td>{{ $customOrder->card_message }}</td>
                                </tr>
                                    <tr class="total-price">
                                        <th>Total Price:</th>
                                        <td>₱{{ number_format($customOrder->total_price, 2) }}</td>
                                    </tr>
                                </table> 
                                
                            </div>
                        </div>

                       
  
                        <h2>Uploaded Images</h2>
                        <div class="uploaded-images">
                            @if($customOrder->image1)
                                <div class="image-box">
                                    <img src="{{ asset('storage/'.$customOrder->image1) }}" alt="Uploaded Image 1">
                                </div>
                            @endif
                            @if($customOrder->image2)
                                <div class="image-box">
                                    <img src="{{ asset('storage/'.$customOrder->image2) }}" alt="Uploaded Image 2">
                                </div>
                            @endif
                            @if($customOrder->image3)
                                <div class="image-box">
                                    <img src="{{ asset('storage/'.$customOrder->image3) }}" alt="Uploaded Image 3">
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                    </div>
              
            </div>
        </div>
    </div>

    <script>
        // JavaScript for navigating between orders using arrows
        const leftArrow = document.querySelector('.nav-arrow.left');
        const rightArrow = document.querySelector('.nav-arrow.right');
        const swipeContainer = document.querySelector('.swipe-container');
        let currentIndex = 0;

        // Function to update the display based on the index
        function updateDisplay() {
            const orderWidth = swipeContainer.offsetWidth;
            swipeContainer.scrollTo({
                left: currentIndex * orderWidth,
                behavior: 'smooth'
            });
        }

        // Left arrow click event
        leftArrow.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateDisplay();
            }
        });

        // Right arrow click event
        rightArrow.addEventListener('click', () => {
            if (currentIndex < swipeContainer.children.length - 1) {
                currentIndex++;
                updateDisplay();
            }
        });
    </script>
</body>
</html>