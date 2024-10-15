<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .p_n{
            color: black;
            padding-bottom: 20px;
            width: 40%;
        }
        label{
            display: inline-block;
            width: 20%;
        }
        .div_design{
            padding-bottom: 20px;
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
                
                <div class="div_center">
                    <h1 class="font_size">EDIT PRODUCT</h1>

                    <form action="{{ url('/edit_product_confirm', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                        <label>Product Category</label>
                        <select class="p_n" name="category" required="">
                            <option value="{{ $product->category }}" selected="">{{ $product->category }}</option>
                        

                        @foreach($category as $category)
                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="div_design">
                        <label>Product Name</label>
                        <input class="p_n" type="text" name="product_name" placeholder="Product Name" required="" value="{{ $product->product_name }}">
                        </div>
                        <div class="div_design">
                        <label>Product Description</label>
                        <input class="p_n" type="text" name="description" placeholder="Description" required="" value="{{ $product->description }}">
                        </div>
                        <div class="div_design">
                        <label>Product Price</label>
                        <input class="p_n" type="number" name="price" placeholder="Price" required="" value="{{ $product->price }}">
                        </div>
                        <div class="div_design">
                        <label>Product Quantity</label>
                        <input class="p_n" type="number" min="0" name="quantity" placeholder="Quantity" required="" value="{{ $product->quantity }}">
                        </div>

                        <div class="div_design">
                        <label>Current Product Image</label>
                        <img style="margin: auto;" height="150" width="150" src="/product/{{ $product->image }}">
                        </div>
                        

                        <div class="div_design">
                        <label>Change Product Image</label>
                        <input type="file" name="image">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="UPDATE PRODUCT" class="btn btn-primary" >
                        </div>
                   </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>