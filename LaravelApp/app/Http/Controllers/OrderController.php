<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Order;
use App\Orderrows;
use Redirect;
use Illuminate\Support\Facades\Redis;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function checkout(){
        
        $list=json_decode(Redis::get("cart"));
        return view('pages.checkout',["cart_items" => sizeof($list),
            "products" => $list, "user" => Auth::user()
        ]);
    }
    public function delete($id){
        Order::where('orderID', '=', $id)->delete();
        $or=Order::join('users','orders.contactNumber','users.contactNumber')
        ->get();
        return Redirect::to('http://localhost:8000/ordini')->withInput(['order' => $or]);
    }
    public function order(){
        $order=Order::
        join('users','orders.contactNumber','users.contactNumber')
        ->where("users.contactNumber",Auth::user()->contactNumber)
        ->get();
        //
        $list=json_decode(Redis::get("cart"));
        return view('pages.order',["cart_items" => sizeof($list),
            "order" => $order, "user" => Auth::user()
        ]);
    }
    public function deleteItem(Request $request){
        $code=$request->input("code");
        $list=json_decode(Redis::get("cart"));
        $newarray=array();
        foreach($list as $p)
            if($p->code!=$code)
                array_push($newarray, $p);
         Redis::set("cart", json_encode($newarray));
         return back()->withInput(array("cart_items" => sizeof($newarray), 
             'products' => $newarray));
    }
    
    public function save(Request $request){
        $list=json_decode(Redis::get("cart"));
        $id=rand(1, 9999999);
        $contact=Auth::user()->contactNumber;
        
        $order = new Order;
        $order->contactNumber=$contact;
        $order->orderID=$id;
        $order->address=$request->input("address");
        $order->country=$request->input("country");
        $order->city=$request->input("city");
        $order->state=$request->input("state");
        $order->amount=12;
        $order->save();
        for($i=0; $i<sizeof($list); $i++){
            $orderRow=new Orderrows;
            $orderRow->productID=$list[$i]->code;
            $orderRow->orderID=$id;
            $orderRow->quantity=1;
            $orderRow->amount=$list[$i]->price;
            $orderRow->save();
        }
        return view('pages.successmessage',["cart_items" => sizeof($list)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function showCart(){
        $cart=json_decode(Redis::get("cart"));
        return view('pages.cart',["cart_items" => sizeof($cart),
            "products" => $cart
        ]);
    }
}
