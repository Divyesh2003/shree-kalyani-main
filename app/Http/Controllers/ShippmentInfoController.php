<?php

namespace App\Http\Controllers;

use App\Models\ShippmentInfo;
use App\Http\Requests\StoreShippmentInfoRequest;
use App\Http\Requests\UpdateShippmentInfoRequest;

class ShippmentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreShippmentInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShippmentInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippmentInfo  $shippmentInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ShippmentInfo $shippmentInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippmentInfo  $shippmentInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippmentInfo $shippmentInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShippmentInfoRequest  $request
     * @param  \App\Models\ShippmentInfo  $shippmentInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShippmentInfoRequest $request, ShippmentInfo $shippmentInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippmentInfo  $shippmentInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippmentInfo $shippmentInfo)
    {
        //
    }
}
