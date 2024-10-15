<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/7375c99873.js" crossorigin="anonymous"></script>
<head>
  @include('admin.css')
  <style type="text/css">
    /* Container for the receipt */
    .receipt-container {
      width: 90%;
      max-width: 700px;
      margin: auto;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      background-color: #f0b991;
    }

    /* Flexbox for the header with arrow, title, and logo */
    .receipt-header {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }

    .receipt-header h2 {
      margin: 0;
      flex-grow: 1;
      text-align: center;
      font-size: 24px;
    }

    .back-arrow {
      font-size: 20px;
    }

    .logo1 img {
      width: 70px;
    }

    .profile-info, .order-info {
      margin-bottom: 20px;
    }

    .info-section {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #fff;
      text-align: center;
    }

    .info-section h4 {
      margin-bottom: 15px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th, table td {
      padding: 12px;
      text-align: left;
      border: 1px solid #ddd;
    }

    table th {
      background-color: #f0b991;
    }

    .total {
      text-align: center;
      font-weight: bold;
      font-size: 20px;
    }

    p {
      padding-left: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 600px) {
      .receipt-header {
        flex-direction: column;
        align-items: center;
      }

      .receipt-header h2 {
        text-align: center;
        font-size: 18px;
        margin: 10px 0;
      }

      .logo1 img {
        margin-bottom: 10px;
      }

      .profile-info, .order-info {
        width: 95%;
      }

      table {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container-scroller">

  
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="receipt-container">
          
          <!-- Header with back arrow, title, and logo -->
          <div class="receipt-header">
            <div class="back-arrow">
              <a href="{{ url('allorder_table') }}">
                <i class="fa-solid fa-chevron-left"></i>
              </a>
            </div>
            <h2>Order Receipt</h2>
            <div class="logo1">
              <img src="{{ asset('home/logo/logo.png') }}" alt="Logo">
            </div>
          </div>

          <!-- Profile Information -->
          <div class="profile-info info-section">
            <h4>Customer Profile</h4>
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
          </div>

          <!-- Order Details with Product Image -->
          <div class="info-section">
            <h4>Order Details</h4>
            
            <!-- Display Product Image -->
            <div class="product-image">
              <img src="{{ asset('product/' . $order->image) }}" alt="Product Image" style="width: 100px; height: 100px; margin-bottom: 15px;">
            </div>
            
            <p><strong>Product Name:</strong> {{ $order->product_name }}</p>
            <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
            <p><strong>Size:</strong> {{ $order->size }}</p>
            <p><strong>Flavor:</strong> {{ $order->flavor }}</p>
            <p><strong>Filling:</strong> {{ $order->filling }}</p>
            <p><strong>Icing:</strong> {{ $order->icing }}</p>
            <p><strong>Price:</strong> ₱{{ $order->price }}</p>
          </div>

          <!-- Additional Information -->
          <div class="info-section">
            <h4>Additional Information</h4>
            <p><strong>Candles:</strong> {{ $order->candles }}</p>
            <p><strong>Celebrant Name:</strong> {{ $order->celebrant_name }}</p>
            <p><strong>Card Message:</strong> {{ $order->card_message }}</p>
            <p><strong>Delivery Date:</strong> {{ $order->delivery_date }}</p>
            <p><strong>Delivery Time:</strong> {{ $order->delivery_time }}</p>
            <p><strong>Payment Status:</strong> {{ $order->payment_status }}</p>
            <p><strong>Delivery Status:</strong> {{ $order->delivery_status }}</p>
          </div>

          <!-- Total Amount -->
          <div class="info-section total">
            <p>Total: ₱{{ $order->price * $order->quantity }}</p>
          </div>

        </div>
      </div>
    </div>
  
  </div>

  
</body>
</html>
