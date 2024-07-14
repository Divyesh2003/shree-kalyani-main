<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\ShippmentInfo;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\DataTables\OrderDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\SuscribeMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;
use App\Mail\OrderShipment;
class OrderController extends Controller
{
    function __construct(){
        $this->middleware('permission:order-list', ['only' => ['index','show']]);
        $this->middleware('permission:order-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $dataTable)
    {
        try {
            return $dataTable->render('admin.order.index');
        } catch (\Exception $e) {
            // Log the exception or handle it accordingly
            return redirect()->back()->with('error', 'An error occurred while rendering the DataTable.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $users = User::get();
            $products = Product::where('status','A')->get();
            return view('admin.order.create',compact('products','users'));
        } catch (\Exception $e) {
            // Log the exception or handle it accordingly
            return redirect()->back()->with('error', 'An error occurred while loading the page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        try {
            // $expense = Expense::findOrFail($id);
            return view('admin.order.show', compact('order'));
        } catch (\Exception $e) {
            return redirect()->route('admin.order.index')->with('error', 'Failed to fetch Expense details: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function tracking($id){
        try {
            $order = Order::findOrFail($id);
            // dd($order->status);
            if($order->status == "Approved"){
                return view('admin.order.tracking', compact('order'));
            }else{
                return redirect()->back()->with('error', 'Please Order Status Approved And After tracking the order.');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.order.index')->with('error', 'Failed to fetch Expense details: ' . $e->getMessage());
        }
    }
    public function status(Request $request){
        // try {
        $order =  Order::where('id',$request->id)->first();
        $order->status  = $request->status;
        $order->Save();
        // dd($order);
        if($order->status == "Approved"){
            // dd("hello");
            Mail::to($order->email)->send(new OrderStatusMail($order));
        }
        return redirect()->back()->with('sucess', 'An Sucess The order status');
    // } catch (\Exception $e) {
    //     return redirect()->back()->with('error', 'An error occurred while loading the page.');
    // }
        
    }
    public function shipment(Request $request){
        $now = Carbon::now();
        $year = $now->year;    // Current year
        $month = $now->month;  // Current month
        $day = $now->day;
        $orderShipment = new ShippmentInfo;
        $orderShipment->order_id = $request->order_id;
        $orderShipment->location = $request->location;
        $orderShipment->description = $request->details;
        $orderShipment->date = $day ." " . $now->format('F') ." " . $year;
        $orderShipment->time = $now->format('g:i A');
        $orderShipment->save();
        return redirect()->back()->with('error', 'An error occurred while loading the page.');
    }
}
