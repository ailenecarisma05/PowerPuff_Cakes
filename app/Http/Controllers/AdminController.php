<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\CustomOrder;

class AdminController extends Controller
{

    public function dashboardadmin() {
        $total_product = Product::count();
        $total_order = Order::count();
        $total_user = User::count();

        $orders = Order::all();
        $total_revenue = 0;
        foreach ($orders as $order) {
            $total_revenue += $order->price * $order->quantity;
        }
        $total_process = Order::where('delivery_status', 'processing')->count();
        $total_shipped = Order::where('delivery_status', 'shipped')->count();
        $total_delivered = Order::whereIn('delivery_status', ['delivered', 'order received'])->count();

        return view('admin.dashboardadmin', compact(
            'total_product', 'total_order', 'total_user', 
            'total_revenue', 'total_delivered', 'total_shipped', 
            'total_process'
        ));
    }
    
    
    
    public function view_category() {
        if(Auth::id()){
            $data = category::all();
            return view('admin.category', compact('data'));
        }else{
            return redirect('login');
        }
    }

    public function add_category(Request $request){
        $data = new category;
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Succcessfully');
    }

    public function delete_category($id){
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Succcessfully');

    }

    public function view_product(){
        $category = category::all();

        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request){
        $product = new product; 
        
        $product->category = $request->category;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image = $imagename;
        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
        
    }

    public function show_product(){
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }


    public function delete_product($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Succcessfully');
    }
    

    public function edit_product($id){
        $product = product::find($id);
        $category = category::all();
        return view('admin.edit_product', compact('product','category'));
    }
    

    public function edit_product_confirm(Request $request, $id){
        $product = product::find($id);
        $product->category = $request->category;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $image = $request->image;
        if ($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image = $imagename;
        }
        
        $product->save();
        return redirect()->back()->with('message', 'Product Updated Succcessfully');
    }

    public function allorder_table(){
        $order = order::all();
        return view('admin.allorder_table', compact('order'));
    }


    public function delivered($id, $type)
    {
        if ($type === 'order') {
            $order = Order::find($id);

            if (!$order) {
                return redirect()->back()->with('error', 'Order not found.');
            }

            $order->delivery_status = "Delivered";
            $order->payment_status = 'Paid';
        } elseif ($type === 'customorder') {
            $order = CustomOrder::find($id);

            if (!$order) {
                return redirect()->back()->with('error', 'Custom Order not found.');
            }
            $order->delivery_status = "Delivered";
        } else {
            return redirect()->back()->with('error', 'Invalid order type.');
        }
        $order->save();
        return redirect()->back()->with('success', 'Order marked as delivered.');
    }

    
    public function shipped($id, $type)
    {
        if ($type === 'order') {
            $order = Order::find($id);
        } elseif ($type === 'customorder') {
            $order = CustomOrder::find($id);
        } else {
            return redirect()->back()->with('error', 'Invalid order type.');
        }
    
        $order->delivery_status = "Shipped";
        $order->save();
    
        return redirect()->back();
    }
    

    public function searchdata(Request $request){
        $searchText = $request->search;
        $order = order::where('name', 'LIKE', "%$searchText%")
                      ->orWhere('phone', 'LIKE', "%$searchText%")
                      ->orWhere('email', 'LIKE', "%$searchText%")
                      ->orWhere('address', 'LIKE', "%$searchText%")
                      ->orWhere('product_name', 'LIKE', "%$searchText%")
                      ->get();
    
        return view('admin.allorder_table', compact('order'));
    }

    public function order_table()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        if ($orders->isEmpty()) {
            return redirect()->back()->with('error', 'You have no orders yet.');
        }
        return view('home.order', compact('orders'));
    }

 

   public function showOrderReceipt($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        return view('admin.order_receipt', compact('order'));
    }


    public function customized_order()
    {
        $user = Auth::user();
        $customorder = CustomOrder::where('user_id', $user->id)->get();
        return view('home.mycustom_order', compact('customorder'));
    }
    

    public function index()
    {
        $customorder = CustomOrder::all();
        return view('admin.customized_order', compact('customorder'));
    } 


    public function showCustomOrderReceipt($id)
    {
        $customorder = CustomOrder::find($id);
        if (!$customorder) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        return view('admin.custom_order_receipt', compact('customorder'));
    }

    
}

