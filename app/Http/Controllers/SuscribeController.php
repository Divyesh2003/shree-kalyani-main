<?php

namespace App\Http\Controllers;

use App\Models\Suscribe;
use App\Http\Requests\StoreSuscribeRequest;
use App\Http\Requests\UpdateSuscribeRequest;
use Illuminate\Http\Request;
use App\Mail\SuscribeMail;
use Illuminate\Support\Facades\Mail;
class SuscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->email;
        $subscribe = new Suscribe;
        $subscribe->email = $request->email;
        $subscribe->Save();
        Mail::to($subscribe->email)->send(new SuscribeMail($subscribe));
        return redirect()->back()->with('success', '');
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
     * @param  \App\Http\Requests\StoreSuscribeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuscribeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Suscribe $suscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscribe $suscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuscribeRequest  $request
     * @param  \App\Models\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuscribeRequest $request, Suscribe $suscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscribe $suscribe)
    {
        //
    }
}
