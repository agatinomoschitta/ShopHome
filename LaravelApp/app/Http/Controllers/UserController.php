<?php
namespace App\Http\Controllers;
use Facade\FlareClient\View;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\Console\Input\Input;
use App\Order;
use App\Orderrows;
use App\Product;
use App\Categorie;
class UserController extends Controller
{
    
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
    public function create(){
        
        $items=array("1","2");
        return view('pages.registration', ['cart_items' => sizeof($items), 'user' => Auth::user()]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        
        $cart=json_decode(Redis::get("cart"));
        return view('pages.profile',["cart_items" => sizeof($cart)]);
    }
    public function showProfile()
    {
        $cart=json_decode(Redis::get("cart"));
        return view('pages.profile', ['cart_items' => sizeof($cart), 'user' => Auth::user()]);
    }
    
    public function showOrdini()
    {
        $order=Order::
        join('users','orders.contactNumber','users.contactNumber')
        ->get();
        
        return view('pages.dashboard_ordini', ['user' => Auth::user(),
            'order' => $order
        ]);
    }
    
    public function showCategory()
    {
        $order=Categorie::all();
        
        return view('pages.dashboard_category_delete', ['user' => Auth::user(),
            'categorie' => $order
        ]);
    }
    public function showDetails($id)
    {
        $or=Orderrows::
        join("products","orderrows.productID","products.code")
        ->orderBy('orderrows.created_at', 'DESC')
        ->get();
        $dd=array();
        for($i=0;$i<sizeof($or); $i++){
            if($or[$i]->orderID==$id)
                array_push($dd,$or[$i]);
        }
        return view('pages.dashboard_ordini_details', ['user' => Auth::user(),
            'rows' => $dd
        ]);
    }
    public function details($id)
    {
        $or=Orderrows::
        join("products","orderrows.productID","products.code")
        ->where("orderrows.orderID",$id)
        ->orderBy('orderrows.created_at', 'DESC')
        ->get();
        $dd=array();
        for($i=0;$i<sizeof($or); $i++){
            if($or[$i]->orderID==$id)
                array_push($dd,$or[$i]);
        }
        $cart=json_decode(Redis::get("cart"));
        return view('pages.orderdetail', ['user' => Auth::user(),
            'rows' => $dd, 'cart_items'=>sizeof($cart)
        ]);
    }
    public function showProdotti()
    {
        $or=Product::orderBy('created_at', 'DESC')->get();
        for($i=0; $i<sizeof($or); $i++)
            $or[$i]->price=str_replace(".",",",$or[$i]->price);
        return view('pages.dashboard_prodotti', ['user' => Auth::user(), 'rows'=> $or]);
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
    public function profilo(){
    }
    public function save(Request $request){
        $user = Auth::user();
        
        
        /**
         * Validate request/input
         **/
        
        /**
         * storing the input fields name & email in variable $input
         * type array
         **/
        $input = $request->except('contactNumber', 'password');
        
        
        
        /**
         * Accessing the update method and passing in $input array of data
         **/
        $user->update($input);
        
        /**
         * after everything is done return them pack to /profile/ uri
         **/
        return back();
    }
    
}
