<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/7375c99873.js" crossorigin="anonymous"></script>
<head>
  @include('admin.css')
  <style>
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
      justify-content: center;
    }

    p {
      padding-left: 20px;
    }

    /* Image container */
    .image-box {
        display: inline-block;
        margin: 10px;
        justify-content: center;
    }

    /* Ensures all images are square and the same size */
    .image-box img {
        width: 150px; /* Set a fixed width */
        height: 150px; /* Set a fixed height */
        object-fit: cover; /* Ensures the image covers the area while maintaining its aspect ratio */
        border-radius: 8px; /* Optional: Adds a border radius for rounded corners */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Optional: Adds a shadow for a more polished look */
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
              <a href="{{ url('customized_order') }}">
                <i class="fa-solid fa-chevron-left"></i>
              </a>
            </div>
            <h2>Customized Order Receipt #{{ $customorder->id }}</h2>
            <div class="logo1">
              <img src="{{ asset('home/logo/logo.png') }}" alt="Logo">
            </div>
          </div>

          <!-- Profile Information -->
          <div class="profile-info info-section">
            <h4>Customer Profile</h4>
            <p><strong>Name:</strong> {{ $customorder->name }}</p>
            <p><strong>Phone:</strong> {{ $customorder->phone }}</p>
            <p><strong>Email:</strong> {{ $customorder->email }}</p>
            <p><strong>Address:</strong> {{ $customorder->address }}</p>
          </div>

          <!-- Order Details with Product Image -->
          <div class="info-section">
            <h4>Order Details</h4>
            <p><strong>Cake Flavor:</strong> {{ $customorder->cake_flavor }}</p>
            <p><strong>Cake Filling:</strong> {{ $customorder->cake_filling }}</p>
            <p><strong>Cake Icing:</strong> {{ $customorder->cake_icing }}</p>
            <p><strong>Cake Shape:</strong> {{ $customorder->cake_shape}}</p>
            <p><strong>Cake Size (Width):</strong> {{ $customorder->cake_size_width }} inches</p>
            <p><strong>Cake Size (Height):</strong> {{ $customorder->cake_size_height }} inches</p>
            <p><strong>Number of Tiers:</strong> ₱{{ $customorder->tiers }}</p>
            <p><strong>Theme:</strong> {{ $customorder->theme }}</p>
            <p><strong>Number of Cupcakes:</strong> {{ $customorder->cupcakes }}</p>
            <p><strong>Number of Candles:</strong> {{ $customorder->candle_numbers }}</p>
            <p><strong>Pickup / Delivery:</strong> {{ $customorder->pickup_delivery }}</p>
            <p><strong>Delivery Date:</strong> {{ $customorder->delivery_date }}</p>
            <p><strong>Delivery Time:</strong> {{ $customorder->delivery_time }}</p>
            <p><strong>Additional Information:</strong> {{ $customorder->additional_info }}</p>
            <p><strong>Card Message:</strong> {{ $customorder->card_message }}</p>

            <h2>Uploaded Images</h2>
            <div class="uploaded-images">
              @if($customorder->image1)
                <div class="image-box">
                  <img src="{{ asset('storage/'.$customorder->image1) }}" alt="Uploaded Image 1">
                </div>
              @endif
              @if($customorder->image2)
                <div class="image-box">
                  <img src="{{ asset('storage/'.$customorder->image2) }}" alt="Uploaded Image 2">
                </div>
              @endif
              @if($customorder->image3)
                <div class="image-box">
                  <img src="{{ asset('storage/'.$customorder->image3) }}" alt="Uploaded Image 3">
                </div>
              @endif
            </div>
          </div>
 
          <!-- Total Amount -->
          <div class="info-section total">
            <p>Total: ₱{{ number_format($customorder->total_price, 2) }}</p>
          </div>

        </div>
      </div>
    </div>
  </div>

  @include('admin.script')
</body>
</html>
