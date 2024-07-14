<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderItem;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Http\Controllers\Controller;
use App\DataTables\OrderDataTable;
class OrderItemController extends Controller
{
    function __construct(){
        $this->middleware('permission:order-item-list', ['only' => ['index','show']]);
        $this->middleware('permission:order-item-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-item-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:order-item-delete', ['only' => ['destroy']]);
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
            return view('admin.order.create');
        } catch (\Exception $e) {
            // Log the exception or handle it accordingly
            return redirect()->back()->with('error', 'An error occurred while loading the page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderItemRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderItemRequest  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderItemRequest $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $orderItem)
    {
        //
    }
}
