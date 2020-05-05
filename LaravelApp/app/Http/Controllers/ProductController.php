<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Product;
use App\Categorie;
use Redirect;
use Illuminate\Support\Facades\Auth;
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
    public function delete($id){
        Product::where('code', '=', $id)->delete();
        $or=Product::orderBy('created_at', 'DESC')->get();
        return Redirect::intended("http://localhost:8000/prodotti");
    }
    public function newproduct(){
        
        $category=Categorie::all();
        return view('pages.dashboard_prodotti_new', ['user' => Auth::user(), 'categorie'=>$category]);
    }
    public function categoryAdd(Request $request){
        $request->validate([
            'categoryID' => 'required|max:255',
            'description' => 'required'
        ]);
        $product =new Categorie;
        $product ->categoryID=$request->input("categoryID");
        $product ->description=$request->input("description");
        $product->save();
        return Redirect::intended("http://localhost:8000/prodotti");
    }
    public function newcategory(){
        
        $category=Categorie::all();
        return view('pages.dashboard_category_new', ['user' => Auth::user(), 'categorie'=>$category]);
    }
    public function edit($code){
        $product=Product::findOrFail($code);
        $product->price=str_replace(".",",",$product->price);
        $category=Categorie::all();
        return view('pages.dashboard_prodotti_edit', ['user' => Auth::user(), 'product'=>$product, 'categorie'=>$category]);
    }
    public function add(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        try{
            $file = $request->file('image');
            if($file){
                $hash = md5_file($file->path());
                $file->move(public_path('product_images'),$hash.".".$file->getClientOriginalExtension());
                $url="product_images/".$hash.".".$file->getClientOriginalExtension();
            }else $url="none";
        } catch (Exception $e) {
            $url="none";
        }
        $product =new Product;
        $product ->code= "ES".rand(1234,999)."-S";
        $product-> title=$request->input("title");
        $product-> description=$request->input("description");
        $product-> img_url=$url;
        $product-> category=$request->input("category");
        $product-> price=$request->input("price");
        $product-> quantity_in_stock=$request->input("quantity");
        $product->save();
        return Redirect::intended("http://localhost:8000/prodotti");
    }
    
    public function saveProduct(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        
        try{
            $file = $request->file('image');
            if($file){
                $date = new DateTime();
                $hashcode=md5($request->input("code"));
                $timestamp=md5($date->getTimestamp());
                $hash = md5_file($file->path());
                $file->move(public_path('product_images'),$hashcode.$timestamp.$hash.".".$file->getClientOriginalExtension());
                $url="product_images/".$hash.".".$file->getClientOriginalExtension();
            }else $url="none";
        } catch (Exception $e) {
           $url="none";
        }
        if($url=="none")
            Product::where('code', $request->input("code"))
            ->update(['title' => $request->input("title"),
                'description' => $request->input("description"),
                'category' => $request->input("category"),
                'price' => str_replace(',','.', $request->input("price")),
                'quantity_in_stock' => $request->input("quantity"),
            ]);
            else
                Product::where('code', $request->input("code"))
                ->update(['title' => $request->input("title"),
                    'description' => $request->input("description"),
                    'img_url' => $url,
                    'category' => $request->input("category"),
                    'price' => str_replace(',','.', $request->input("price")),
                    'quantity_in_stock' => $request->input("quantity"),
                ]);
        return Redirect::intended("http://localhost:8000/prodotti");
    }
    public function deletecategory(Request $request){
        Categorie::where('categoryID', '=', $request->input("category"))->delete();
        return Redirect::intended("http://localhost:8000/category");
        
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
