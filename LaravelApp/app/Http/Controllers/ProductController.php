<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //hello
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $product = new Product;
        $product -> code = "SB587ZS-45";
        $product -> title = "Spaghetti barilla BIOLOGICI";
        $product -> category ="Pasta";
        $product -> description = "Spaghetti barilla bio, integrali, numero 7, 1 kg";
        $product -> img_url = "";
        $product -> price = 0.79;
        $product -> quantity_in_stock = 250;
       // $exist = Product::;
    //    if(!$exist) $product -> save();
        //$product = Redis::get('product');
     //   Redis::set('product', 'dd');
        Redis::set('product', $product -> title);
        return view('product_created');
    }
    public function addCart(Request $request){
        $code=$request->input("p_code");
        $product = Product::findOrFail($code);
        $productList = json_decode(Redis::get("cart"));
        
        if(!is_array($productList))
            $productList=array();
         array_push($productList, $product);
         Redis::set("cart", json_encode($productList));
        return "ok";
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
}
