<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\Cart;

use Barryvdh\DomPDF\Facade\Pdf;
class OrderController extends Controller
{
    public function orderProcess(Request $request){
        // Get the authenticated user
        $user = Auth::user();
        // Get the cart items for the user
        $cartItems = Cart::where('user_id', $user->id)->get();
         // Ensure there are items in the cart*
         if ($cartItems->isEmpty()) {
            return redirect()->route('checkout')->withErrors(['cart' => 'Your cart is empty.']);
        }
        $data = $request->input();
        $order = Order::create($data);
    
        $cartnumber = 0;
        $total_value = 0;
        $title = "";
        // Associate cart items with the order and delete the cart items
        foreach ($cartItems as $cartItem) {
                    $order->items()->create([
                        'user_id' => $cartItem->user_id,
                        'product_id' => $cartItem->product_id,
                        'order_id' => $order->id,
                        'cost' => $cartItem->price,
                        'qty' => $cartItem->quantity,
                        'sub_total' => $cartItem->quantity * $cartItem->price,
                        'info' => '',
                    ]);
                    $words = explode(' ', $cartItem->name);
                    $title .=  count($words) > 20 ? implode(' ', array_slice($words, 0, 2)) . '...,' : $cartItem->name . ',';
                    $cartnumber =  $cartnumber + $cartItem->quantity;
                    $total_value = $total_value + $cartItem->quantity * $cartItem->price;
                    // $cartItem->delete();
                }
                $order->title  = $title;
                $order->total_qty = $cartnumber;
                $order->total_value = $total_value;
                $order->status = 'Pending';
                $order->save();
                return redirect()->route('thankyou')->with('success', 'Order placed successfully.');
    }

    public function thankyou(){
        return view('thankyou');
    }

    public function singleOrder($id){
        $order = Order::find($id);
        return view('order.single',compact('order'));
    }
    public function singleOrderDownload($id){
        $order = Order::where('id',$id)->with('states')->first();
        $data = ['order' => $order];
        $pdf = PDF::loadView('order.pdf', $data);
        return $pdf->download('purchase.pdf');
    }
}
