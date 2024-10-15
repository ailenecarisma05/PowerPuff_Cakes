<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img width="130" src="{{ asset('home/logo/logo.png') }}" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('all_products') }}">Products</a>
               </li>
                <li class="nav-item" style="padding-top: 5px; ">
                  <a class="nav-link1" href="{{ url('cakes') }}"> <span class="nav111">Cakes<span class="caret"></span></a>
               </li>
               <li class="nav-item" style="padding-top: 5px; ">
                  <a class="nav-link1" href="{{ url('bread') }}"> <span class="nav111">Breads <span class="caret"></span></a>
               </li>
               <li class="nav-item" style="padding-top: 5px; ">
                  <a class="nav-link1" href="{{ url('cookies') }}"> <span class="nav111">Cookies <span class="caret"></span></a>
               </li>

               
               <li class="nav-item" style="padding-top: 5px;">
                  <a class="nav-link1" href="{{ url('show_cart') }}">
                     <i class="fa-solid fa-shopping-cart"></i>
                     <span class="nav111"></span>
                     <span class="caret"></span>
                  </a>
               </li>
               <li class="nav-item" style="padding-top: 0px; display: flex; align-items: flex-start;">
               <a class="nav-link1" href="{{ url('custom_order') }}" style="display: flex; flex-direction: column; align-items: center;">
                  <img src="{{ asset('home/images/custom.png') }}" alt="Orders Icon" style="width: 30px; height: 24px;">
                  <span class="nav111"></span>
                  <span class="caret"></span>
               </a>
               </li>
               <li class="nav-item" style="padding-top: 0px; display: flex; align-items: flex-start;">
               <a class="nav-link1" href="{{ url('order') }}" style="display: flex; flex-direction: column; align-items: center;">
                  <img src="{{ asset('home/images/icon-order-1.png') }}" alt="Orders Icon" style="width: 25px; height: 25px;">
                  <span class="nav111"></span>
                  <span class="caret"></span>
               </a>
               </li>
               
               @if (Route::has('login'))
               @auth
                  <li class="nav-item">
                  <x-app-layout>

                  </x-app-layout>
                  </li>
               @else
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>
               @endauth
               @endif
             </ul>
          </div>
       </nav>
    </div>
 </header>
 <script src="https://kit.fontawesome.com/7375c99873.js" crossorigin="anonymous"></script>
 