<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Coupon;
use Auth;
use Cookie;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CartController extends Controller
{
    // login user id 
     public $user_id;

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
        $this->middleware(function ($request, $next) {
            if(Auth::user())
            {
                $this->user_id= Auth::user()->id;
            }
            return $next($request);
        });
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rproducts = array();
        if(Auth::user()){
            $uid = auth()->user()->id;
            $carts = Cart::where('user_id', $uid)->get();
            if($carts->count() <= 0)
            {
                return view('cart_empty');
            }
            else
            {
                $pid = array();
                foreach($carts as $cart)
                {
                    $id = Product::where('id', $cart->product_id)->first();
                    array_push($pid , $id->category_id);
                }
                $rproducts = Product::whereIn('category_id',$pid)->get();
                $countries = Country::all();
                $states = State::all();
                $cities = City::all();
                $name = 'Checkout';
                return view('cart',compact('carts','rproducts','name','countries','cities','states'));
            }
        }
        else {
            
            $id = json_decode($request->cookie('cart'));
            if(!is_null($id))
            {
                $carts = Cart::where('guest_id', $id->guest_id)->with('product')->get();
                if(count($carts) <= 0)
                {
                    return view('cart_empty');
                }
                $name = 'As a Guest Checkout';
                $countries = Country::all();
                $states = State::all();
                $cities = City::all();
                return view('cart',compact('carts','rproducts','name','countries','cities','states'));
            }
            return view('cart_empty');
        }
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
        echo "hii";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);
         if(!is_null($cart)){
            //
        } else {
           abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)){
        //
        } else {
        abort(404);
        }
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
    public function destroy(Request $request , $id)
    {
        if(Auth::user()){
            $cart = Cart::find($id);
            $cart->delete();
            return redirect()->route('cart.index');
        }
        else {         
            $minutes = 300;
            $cookie = json_decode(Cookie::get('cart'));
            $carts = Cart::find($id)->where('guest_id',$cookie->guest_id)->get();
            $key = array_search($carts->product_id, $cookie->product_id);
            // -------unseting key from array -------//
            if (array_key_exists($key,json_decode($cookie->product_id))) {
                unset($cookie->product_id[$key]);
                $ct = Cart::find($id);
                $ct->delete();//deleting from db cart
            }
            if (count($cookie->product_id)<=0) {
                Cookie::forget('cart');
            }else{
                Cookie::queue('cart', json_encode($cookie) , $minutes);
            }
            
            return redirect()->route('cart.index');
        }
    }

    public function addtocart(Request $request,$pid)
    {
        if(Auth::user())
        {
            //------------------Adding cart for auth------------------//
            $product = Product::find($pid);
            $user = Auth::user()->id;
                // -------adding product to db cart with user id-----//
            $cart = Cart::where('user_id',$user)->where('product_id',$pid)->first();
            if(!is_null($cart))
            {
                // if same product id in cart increase qty //
                $cart->quantity = $cart->quantity + $request->quantity;
                $cart->save();
            }
            else
            {
                //  product id in cart as new record //
                $cart = new Cart;
                $cart->product_id = $product->id;
                $cart->user_id = $user;
                $cart->quantity = $request->quantity;
                $cart->created_by = $user;
                $cart->save();
            } 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else
        {
            //-------------------adding product for guest-------------//
            $cookie = json_decode($request->cookie('cart'));
            if(!is_null($cookie) || !empty($cookie))
            {
                // -------adding product to db cart with guest id-----//
                $cart = Cart::where('guest_id', $cookie->guest_id)->where('product_id',$pid)->first();
                if(!is_null($cart))
                {
                    // if same product id in cart increase qty //
                    $cart->quantity = $cart->quantity + $request->quantity;
                    $cart->save();
                    return redirect()->back()->with('success', 'Product added to cart successfully!');
                }
                else
                {
                    // create new cookie and cart record //
                    $minutes = 600;
                    Cookie::queue('cart', json_encode($cookie), $minutes);
                    $cart = new Cart;
                    $cart->product_id = $pid;
                    $cart->guest_id = $cookie->guest_id;
                    $cart->quantity = $request->quantity;
                    $cart->created_by = 0;
                    $cart->save();
                    return redirect()->back()->with('success', 'Product added to cart successfully!');
                }
            }
            else
            {
                //---- creating totally new cookie table---//
                $minutes = 300;
                $guest_id = Str::random(10); //generate guest id
                $cookie = array('guest_id' => $guest_id, 'product_id' => array( $pid)); //create cookie array
                Cookie::queue(Cookie::make('cart', json_encode($cookie), $minutes)); // store cookie
                
                $cart = new Cart;
                $cart->guest_id = $guest_id;
                $cart->product_id = $pid;
                $cart->quantity = $request->quantity;
                $cart->save();
                return redirect()->back()->with('success', 'Product added to cart successfully!123');
            }
        }
    }

    public function updatecart(Request $request)
    {
        if(Auth::user())
        {
            $user = auth()->user()->id;
            foreach($request->item as $id1 => $qty)
            {
                $cart = Cart::Find($id1);
                $cart->quantity = $qty;
                $cart->updated_by = $user;
                $cart->save();
            }
            return redirect()->route('cart.index');
        }
        else
        {
            $cookie = json_decode($request->cookie('cart'));
            if(!is_null($cookie))
            {
                foreach($request->item as $id1 => $qty)
                {
                    $cart = Cart::Find($id1);
                    $cart->quantity = $qty;
                    // $cart->updated_by = $user;
                    $cart->save();
                }
                return redirect()->route('cart.index');
            }
        }

        // $cart = session()->get('cart');

        // dd($request->item);
        // print_r($cart);
        // dd($cart);
        // echo "<br><br>";

        // foreach($cart as $id => $details) {

        //     foreach($request->item as $id1 => $qty){

        //         if($id == $id1) {
        //             $details['quantity'] = $qty;
        //             $cart[$id]['quantity'] = $qty;
        //         }
        //     }  
        // }
        // session()->put('cart',$cart);
        // return redirect()->route('cart.index');
    }

    public function addcart($id)
    {
        // return 123;
    }
        
}
