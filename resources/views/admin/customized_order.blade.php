<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
  <style>
    .img_des {
      width: 50px;
      height: 40px;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    @include('admin.header')
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <h2 style="text-align: center; font-size: 25px; font-weight: bold; margin-bottom: 30px; color: white;">
          CUSTOMIZED CAKE ORDERS
        </h2>
        <div style="margin-bottom: 30px; margin-left: 60%">
          <!-- Make sure form is properly closed -->
          <form action="/search" method="GET">
            <input type="text" name="search" placeholder="Search products" style="width: 345px; color: black;">
            <input type="submit" value="Search" class="btn btn-primary" style="height: 43px;">
          </form>
        </div>
        <div style="overflow-x: auto;">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="background-color:#F0B991; color: black; text-align:center;">Name</th>
                <th style="background-color:#F0B991; color: black; text-align:center;">Phone</th>
                <th style="background-color:#F0B991; color: black; text-align:center;">Address</th>
                <th style="background-color:#F0B991; color: black; text-align:center;">Price</th>
                <th style="background-color:#F0B991; color: black; text-align:center;">Delivery Status</th>
                <th style="background-color:#F0B991; color: black; text-align:center;">Delivered</th>
              </tr>
            </thead>
            <tbody>
            @forelse($customorder as $customorder)
              <tr style="border: 1px white;">
              <td style="background-color:#fff; color: black; text-align:center;">
              <a href="{{ url('custom_order_receipt/' . $customorder->id) }}" style="color: black; text-decoration: none;">
                    {{ $customorder->name }}
                </a>
              </td>
                <td style="background-color:#fff; color: black; text-align:center;">{{ $customorder->phone }}</td>
                <td style="background-color:#fff; color: black; text-align:center;">{{ $customorder->address }}</td>
                <td style="background-color:#fff; color: black; text-align:center;">₱{{ number_format($customorder->total_price, 2) }}</td>
                <td style="background-color:#fff; color: black; text-align:center;">{{ $customorder->delivery_status }}</td>
                <td style="background-color:#fff; color: black; text-align:center;">
                  @if($customorder->delivery_status == 'Processing')
                    <a href="{{ url('shipped', [$customorder->id, 'customorder']) }}" class="btn btn-warning">Shipped</a>
                  @elseif($customorder->delivery_status == 'Shipped')
                    <a href="{{ url('delivered', [$customorder->id, 'customorder']) }}" 
                      onclick="return confirm('Are you sure this Product is Delivered?')" 
                      class="btn btn-success">Delivered</a>
                  @elseif ($customorder->delivery_status == 'Cancelled Order')
                    <p style="color: red">Cancelled</p>
                  @else
                    <p style="color: green">Delivered</p>
                  @endif
                </td>

              </tr>
            @empty
              <tr>
                <td colspan="6" style="text-align: center; color: white;">
                  No Data Found!
                </td>
              </tr>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Bootstrap JS scripts (jQuery and Popper.js are required for Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  @include('admin.script')
</body>
</html>
