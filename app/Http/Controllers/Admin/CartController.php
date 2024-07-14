<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\DataTables\CartDataTable;
use App\Http\Requests\CartCreateRequest;
use App\Http\Requests\CartUpdateRequest;

use Auth;
class CartController extends Controller
{
    // login user id 
     public $user_id;

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('permission:cart-list', ['only' => ['index','show']]);
        $this->middleware('permission:cart-create', ['only' => ['create','store']]);
        $this->middleware('permission:cart-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:cart-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CartDataTable $dataTable)
    {
        return $dataTable->render('admin.cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $products=Product::all();
        return view('admin.cart.create',compact('users','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartCreateRequest $request)
    {
        $validater=$request->validated();
        $cart=new Cart;
        $cart->user_id=$request->user_id;
        $cart->product_id=$request->product_id;
        $cart->quantity=$request->quantity;
        $cart->created_by = $this->user_id;
        $cart->save();
        return redirect()->route('admin.marketing.cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)){
            return view('admin.cart.show', compact('cart'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form  for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Cart::find($id);
        $users=User::all();
        $products=Product::all();
        if(!is_null($cart)){
            return view('admin.cart.edit', compact('cart','users','products'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request,$id)
    {
        $validater=$request->validated();
        $cart=Cart::find($id);
        $cart->user_id=$request->user_id;
        $cart->product_id=$request->product_id;
        $cart->quantity=$request->quantity;
        $cart->updated_by = $this->user_id;
        $cart->save();
        return redirect()->route('admin.marketing.cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->delete();
            return redirect()->route('admin.marketing.cart.index');
        }else{
            abort(404);
        }
            
    }
}