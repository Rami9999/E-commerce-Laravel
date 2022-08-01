<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;
class ProductController extends Controller
{
    function index()
    {
        $data=product::all();
        return view('products',['products'=>$data]);
    }
    function detail($id){
        $data = product::find($id);
        return view('detail',['product'=>$data]);
    }
    function search(Request $req)
    {
        if(Session::has('user')){
            $data=product::where('name','like','%'.$req->input('query').'%')->get();
            return view('search',['products'=>$data]);}
        else{
            return view('login');
        }
            
    }
    function add_to_cart(Request $req)
    {
        $cart=new Cart;
        $cart->user_id =$req->session()->get('user')['id'] ;
        $cart->product_id = $req->product_id;
        $cart->save();
        return redirect('products');
    }
    static function getNemberOfCartItems(){
        if(Session::has('user')){
            $userID=Session::get('user')['id'];
            $data=Cart::where('user_id',$userID)->count();
            return $data;}
        else
            return 0;
    }

    function getCartItems(){
        $userID=Session::get('user')['id'];
        $products=DB::table('cart')->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userID)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('itemsInCart',['products'=>$products]);
    }
    function temp(){
        $userID=Session::get('user')['id'];
        $products=DB::table('cart')->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userID)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return $products;
    }
    function remove($id){
        if(Session::has('user')){
            Cart::destroy($id);
            return redirect('profile');
        }
        else
        return 0;
    }
    function orderNow(){
        $userID=Session::get('user')['id'];
        $total=DB::table('cart')->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userID)
        ->sum('products.price');
        return view('ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req){
        $userID=Session::get('user')['id'];
        $allcarts=Cart::where('user_id',$userID)->get();
        foreach($allcarts as $cart)
        {
            $order= new Order;
            $order->user=$userID;
            $order->product_id=$cart['product_id'];
            $order->status='pending';
            $order->Payment_Method=$req->Payment_Method;
            $order->address=$req->address;
            $order->Payment_Status='pending';
            $order->save();
        }
        Cart::where('user_id',$userID)->delete();
        return redirect('profile');
    }
    function myOrders(){
        $userID=Session::get('user')['id'];
        $orders=DB::table('products')->join('orders','orders.product_id','=','products.id')
        ->where('orders.user',$userID)
        ->get();
        return view('myorders',['orders'=>$orders]);
    }
    function recieve($id){
        DB::table('orders')->where('id',$id)
        ->update(['status'=>'recieved','Payment_Status'=>'Done']);
        $orders=DB::table('orders')->where('id',$id)->get();
        return redirect('myorders');
    }
}
