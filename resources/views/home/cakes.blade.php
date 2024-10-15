<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
      <title>PowerPuff Cakes - Birthday Cakes</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/7375c99873.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x</button>
            {{ session()->get('message') }}
            </div>
         @endif
         
      
         <section class="product_section layout_padding">
            <div class="container">
               <div class="heading_container heading_center">
                  <h2>
                    Cakes<span></span>
                  </h2>
          
              <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                  <div class="card w-100 my-2 shadow-2-strong">
                  <a href="{{ url('product_details',$product->id) }}">
                      <img src="/product/{{ $product->image }}" class="card-img-top" style="aspect-ratio: 2 / 2.5" />
                    </a>
                    <div class="card-body d-flex flex-column">
                      <a href="{{ url('product_details',$product->id) }}">
                        <h5 class="card-title" style="font-size: 20px"><strong>{{ $product->product_name }}</strong></h5>
                    </a>
                      <p class="card-text">₱{{ $product->price }}</p>
                      <div>
                        <input type="number" name="quantity" value="1" min="1" style="width: 80px; margin-top: 15px;">
                      </div>
                      <div>
                    </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
          
              <span style="padding-top: 30px">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}  
              </span>
            </div>
          </section>
          

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="#">PowerPuff Cakes</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">PowerPuff Cakes</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>