<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\CustomOrder;
use App\Notifications\NewOrderNotification;

use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(){
        $product = Product::paginate(12);
        return view('home.userpage',compact('product'));
    }

    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype == 1){
            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();
            $order = order::all();
            $total_revenue = 0;
            foreach($order as $order){
                $total_revenue = $total_revenue + $order->price * $order->quantity;
            }
            $total_process = order::where('delivery_status','=','processing')->get()->count();
            $total_shipped = order::where('delivery_status','=','shipped')->get()->count();
            $total_delivered = order::whereIn('delivery_status', ['delivered', 'order received'])->count();

            return view('admin.dashboardadmin', compact('total_product', 'total_order', 'total_user', 
            'total_revenue', 'total_delivered', 
            'total_shipped', 'total_process'));
        } else {
            $product = Product::paginate(12);
            return view('home.userpage',compact('product'));
        }
    }
    public function product_details($id){
        $product = product::find($id);
        
        return view('home.product_details', compact('product'));
    }
    public function product_details2($id){
        $product = product::find($id);
        
        return view('home.product_details2', compact('product'));
    }
        public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $product = product::find($id);

            $product_exist_id = cart::where('product_id', '=', $id)
                ->where('user_id', '=', $userid)
                ->get('id')
                ->first();

            if ($product_exist_id) {
                $cart = cart::find($product_exist_id)->first();
                $cart->quantity += $request->quantity;
                $cart->save();
                return redirect()->back()->with('message', 'Product Added Successfully');
            } else {
                $cart = new cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                $cart->product_name = $product->product_name;
                $cart->price = $product->price;
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;

                $cart->size = $request->size;
                $cart->flavor = $request->flavor;
                $cart->filling = $request->filling;
                $cart->icing = $request->icing;
                $cart->candles = $request->candles;
                $cart->celebrant_name = $request->celebrant_name;
                $cart->card_message = $request->card_message;
                $cart->delivery_date = $request->delivery_date;
                $cart->delivery_time = $request->delivery_time;

                $cart->save();
                return redirect()->back()->with('message', 'Product Added Successfully');
            }
        } else {
            return redirect('login');
        }
    }

    
    
    public function show_cart(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('cart'));
        } else{
            return redirect('login');
        }
    }
    public function remove_cart($id){
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function show_order(){
        if(Auth::check()){
            $user = Auth::user();
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('home.show_order', compact('user', 'cartItems'));
        } else{
            return redirect('/');
        }
    }

  
    public function order_table(Request $request)
    {
        $user = Auth::user();
        $userid = $user->id;

        $shippingFee = $request->input('shippingFee');
        $totalAmount = $request->input('totalAmount');
        $shippingMethod = $request->input('shippingMethod');
        $cartItems = json_decode($request->input('cartItems'));

        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        foreach ($cartItems as $cartItem) {
            $existingOrder = Order::where('product_id', $cartItem->product_id)
                                ->where('user_id', $userid)
                                ->first();

            if (!$existingOrder) 
            {
                $order = new Order;
                $order->name = $user->name;
                $order->email = $user->email;
                $order->phone = $user->phone;
                $order->address = $user->address;
                $order->user_id = $userid;

                $order->product_name = $cartItem->product_name;
                $order->size = $cartItem->size;
                $order->flavor = $cartItem->flavor;
                $order->filling = $cartItem->filling;
                $order->icing = $cartItem->icing;
                $order->candles = $cartItem->candles;
                $order->celebrant_name = $cartItem->celebrant_name;
                $order->card_message = $cartItem->card_message;
                $order->delivery_date = $cartItem->delivery_date;
                $order->delivery_time = $cartItem->delivery_time;
                $order->quantity = $cartItem->quantity;
                $order->price = $cartItem->price; 
                $order->image = $cartItem->image;
                $order->product_id = $cartItem->product_id;

                $order->payment_status = 'Cash on Delivery'; 
                $order->delivery_status = 'Processing';
                $order->shipping_fee = $shippingFee; 
                $order->total_price = $totalAmount; 

                $order->save();
            }

            Cart::where('id', $cartItem->id)->delete();
        }

        return redirect()->back()->with('message', 'Order Placed Successfully! Thank you for your purchase.');
    }

    
    public function order(){
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $order = order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }else{
            return redirect('login');
        }
    }
    
    public function cancel_order($id){
        $order = order::find($id);
        $order->delivery_status = 'Cancelled Order';
        $order->save();
        return redirect()->back();
    }

    public function order_received($id){
        $order = order::find($id);
        $order->delivery_status = 'Order Received';
        $order->save();
        return redirect()->back();
       
    }
   
    public function cakes()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $categoryName = "Cakes";
            $products = Product::where('category', $categoryName)->paginate(12);
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('home.cakes', compact('products', 'user', 'cartItems'));
        } else {
            return redirect('login');}
    }

    public function bread()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $categoryName = "Breads";
            $products = Product::where('category', $categoryName)->paginate(12);
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('home.bread', compact('products', 'user', 'cartItems'));
        } else {
            return redirect('login');}
    }

    public function cookies()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $categoryName = "Cookies";
            $products = Product::where('category', $categoryName)->paginate(12);
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('home.cookies', compact('products', 'user', 'cartItems'));
        } else {
            return redirect('login');}
    }

    

    public function product_search(Request $request){
        $search_text = $request->search;
        $product = product::where('product_name', 'LIKE', "%$search_text%")->
        orwhere('category', 'LIKE', "$search_text")->paginate(12);
        return view('home.userpage', compact('product'));
    }

    public function all_products(){
        $product = Product::paginate(12);
        return view('home.all_products',compact('product'));
    }

    public function search_all_product(Request $request){
        $search_text = $request->search;
        $product = product::where('product_name', 'LIKE', "%$search_text%")->
        orwhere('category', 'LIKE', "$search_text")->paginate(12);
        return view('home.all_products', compact('product'));
    }

    public function showOrder(Request $request)
    {
        $user = Auth::user();
        $selectedProductIds = explode(',', $request->input('ids'));
        $cartItems = Cart::whereIn('id', $selectedProductIds)->get();

        return view('home.show_order', compact('cartItems', 'user'));
    }

    public function custom_order(){
            return view('home.custom_order');
        }

    public function display_custom_order($id)
    {
        $custom_order = CustomOrder::findOrFail($id);
        return view('home.mycustom_order', compact('custom_order'));
    }

    public function display(){
        return view('home.mycustom_order');
    }

    public function showCustomOrder()
    {
        $user = Auth::user(); 

        $customOrders = CustomOrder::where('user_id', $user->id)->get();
    
        if ($customOrders->isEmpty()) {
            return redirect()->back()->with('message', 'No custom orders found!');
        }

        return view('home.mycustom_order', compact('customOrders'));
    }
    
   public function storeCustomOrder(Request $request)
    {
        $user = Auth::user();
        $customOrder = new CustomOrder();

        $customOrder->name = $user->name;
        $customOrder->email = $user->email;
        $customOrder->phone = $user->phone;
        $customOrder->address = $user->address;
        $customOrder->user_id = $user->id;

        $customOrder->cake_flavor = $request->input('cake-flavor');
        $customOrder->cake_filling = $request->input('cake-filling');
        $customOrder->cake_icing = $request->input('cake-icing');
        $customOrder->tiers = $request->input('tiers');
        $customOrder->cake_shape = $request->input('cake-shape');
        $customOrder->cake_size_width = $request->input('cake-size-width');
        $customOrder->cake_size_height = $request->input('cake-size-height');
        $customOrder->theme = $request->input('theme');
        $customOrder->cupcakes = $request->input('cupcakes');
        $customOrder->candles = $request->input('candles');
        $customOrder->candle_numbers = $request->input('candle-numbers');
        $customOrder->pickup_delivery = $request->input('pickup-delivery');

        if ($request->hasFile('image1')) {
            $filePath = $request->file('image1')->store('images', 'public');
            $customOrder->image1 = $filePath;
        }

        if ($request->hasFile('image2')) {
            $filePath = $request->file('image2')->store('images', 'public');
            $customOrder->image2 = $filePath;
        }

        if ($request->hasFile('image3')) {
            $filePath = $request->file('image3')->store('images', 'public');
            $customOrder->image3 = $filePath;
        }

        $customOrder->additional_info = $request->input('additional-info');
        $customOrder->card_message = $request->input('card-message');
        $customOrder->delivery_time = $request->input('delivery_time');
        $customOrder->delivery_date = $request->input('delivery-date');
        $totalPrice = $request->input('totalAmount');
        $customOrder->total_price = $totalPrice;
        $customOrder->save();

        return redirect()->back()->with('message', 'Custom Order Placed Successfully!');
    }

    
}
