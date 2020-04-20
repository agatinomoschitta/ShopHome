<?php
namespace App\Http\Controllers;
use Facade\FlareClient\View;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
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
        
        $items=array("1","2");
        return view('pages.profile',["cart_items" => sizeof($items)]);
    }
    public function showProfile()
    {
        $items=array("1","2");
        return view('pages.profile', ['cart_items' => sizeof($items), 'user' => Auth::user()]);
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
