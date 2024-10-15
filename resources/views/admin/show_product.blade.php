<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
    .center {
        margin: auto;
        width: 80%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .font_size {
        font-size: 40px;
        text-align: center;
        padding-top: 20px;
    }

    .img_size {
        width: 210px;
        height: 180px;
    }

    .th_color {
        background: #F0B991;
    }

    .th_deg {
        padding: 15px;
        color: black;
    }

    .btn-warning {
        margin-bottom: 20px;
    }

    /* Responsive two-column layout for smaller screens */
    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        /* Hide the table header */
        thead {
            display: none;
        }

        /* Each product is treated as a block with label-value pairs */
        tbody tr {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }

        /* Make the label on the left and value on the right for each item */
        td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            text-align: left; /* Align text to the left */
        
        }

        /* The label part (left side) */
        td::before {
            content: attr(data-label);
            font-weight: bold;
            text-align: left;
            color: #333;
            padding-right: 20px; /* Add spacing between label and value */
            flex-shrink: 0; /* Ensure label does not shrink */
            color: #F0B991;
        }

        /* Adjust image size for smaller screens */
        .img_size {
            width: 100px;
            height: 90px;
        }
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{ session()->get('message') }}
            </div>
          @endif

          <h2 class="font_size">ALL PRODUCTS</h2>
          <table class="center">
            <thead>
              <tr class="th_color">
                <th class="th_deg">Product Image</th>
                <th class="th_deg">Category</th>
                <th class="th_deg">Product Name</th>
                <th class="th_deg">Description</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($product as $product)
              <tr>
                <td data-label="Product Image">
                  <img class="img_size" src="/product/{{ $product->image }}" alt="">
                </td>
                <td data-label="Category">{{ $product->category }}</td>
                <td data-label="Product Name">{{ $product->product_name }}</td>
                <td data-label="Description">{{ $product->description }}</td>
                <td data-label="Price">₱{{ $product->price }}</td>
                <td data-label="Action">
                  <a class="btn btn-warning" href="{{ url('edit_product', $product->id) }}">EDIT</a>
                  <a class="btn btn-danger" onclick="return confirm('Are you sure to Delete this Product?')" href="{{ url('delete_product', $product->id) }}">DELETE</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- container-scroller -->
      @include('admin.script')
    </div>
  </body>
</html>
