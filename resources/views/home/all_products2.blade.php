<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
  
          <div style="display: flex; align-items: center; margin-bottom: 30px;">
            <form action="{{ url('search_all_product') }}" method="get">
              @csrf
              <input type="text" name="search" style="width: 400px; color: black; margin-right: 10px;" placeholder="Search Products">
              <input type="submit" value="Search" class="btn btn-dark" style="height: 43px;">
            </form>
          </div>
          
  
      <div class="row">
        @foreach($product as $products)
        <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
          <div class="card w-100 my-2 shadow-2-strong">
            <a href="{{ url('product_details', $products->id) }}">
            <img src="/product/{{ $products->image }}" class="card-img-top" style="aspect-ratio: 2 / 2.5" /></a>
            <div class="card-body d-flex flex-column">
              <a href="{{ url('product_details', $products->id) }}">
              <h5 class="card-title" style="font-size: 20px" ><strong>{{ $products->product_name }}</strong></h5></a>
              <p class="card-text">₱{{ $products->price }}</p>
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
        {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}  
      </span>
    </div>
  </section>
  