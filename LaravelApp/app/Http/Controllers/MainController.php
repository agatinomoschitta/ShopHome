<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Product;
use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products=Product::orderBy('created_at', 'DESC')->get();

        $cart=json_decode(Redis::get("cart"));
        if(!is_array($cart)){
            $cart=array();
            Redis::set("cart", json_encode($cart));
        }
        if(!Auth::check())
            return view('pages.index',["cart_items" => sizeof($cart),
                "products" => $products
                //             "user" => $_SESSION['user']
            ]);
        $user = Auth::user();
        if($user -> role == 1 )           
            return view('pages.dashboard',["cart_items" => sizeof($cart),
                "products" => $products
            ]);
        else   
            return view('pages.index',["cart_items" => sizeof($cart),
                "products" => $products
                //             "user" => $_SESSION['user']
            ]);
    }
    public function search($title){
        $products=Product::where("title","LIKE", "%".$title."%")->orWhere("description","LIKE %",$title."%")->orderBy('created_at', 'DESC')->get();
        
        $cart=json_decode(Redis::get("cart"));
        if(!is_array($cart)){
            $cart=array();
            Redis::set("cart", json_encode($cart));
        }
        if(!Auth::check())
            return view('pages.filter',["cart_items" => sizeof($cart),
                "products" => $products, "category" => $title
                //             "user" => $_SESSION['user']
            ]);
            $user = Auth::user();
            if($user -> role == 1 )
                return view('pages.dashboard',["cart_items" => sizeof($cart),
                    "products" => $products
                ]);
                else
                    return view('pages.index',["cart_items" => sizeof($cart),
                        "products" => $products, "category" => $title
                    ]);
    }
    public function filter($category){
        $products=Product::where("category","=",$category)->orderBy('created_at', 'DESC')->get();
        
        $cart=json_decode(Redis::get("cart"));
        if(!is_array($cart)){
            $cart=array();
            Redis::set("cart", json_encode($cart));
        }
        if(!Auth::check())
            return view('pages.filter',["cart_items" => sizeof($cart),
                "products" => $products, "category" => $category
                //             "user" => $_SESSION['user']
            ]);
            $user = Auth::user();
            if($user -> role == 1 )
                return view('pages.dashboard',["cart_items" => sizeof($cart),
                    "products" => $products
                ]);
                else
                    return view('pages.index',["cart_items" => sizeof($cart),
                        "products" => $products, "category" => $category
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
}
