<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SupllierDataTable;
use App\Models\Supplier;

class SupllierController extends Controller
{
    // function __construct(){
    //     $this->middleware('permission:supllier-list', ['only' => ['index','show']]);
    //     $this->middleware('permission:supllier-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:supllier-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:supllier-delete', ['only' => ['destroy']]);
    // } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SupllierDataTable $dataTable)
    {
        return $dataTable->render('admin.supllier.index');
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.supllier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request);
        try {
            $purchase = new Supplier;
            $purchase->firstname = $request->firstname;
            $purchase->lastname = $request->lastname;
            $purchase->mobile = $request->mobile;
            $purchase->email = $request->email;
            $purchase->bank_details = $request->bank_details;
            $purchase->gst = $request->gst;
            $purchase->company = $request->company;
            $purchase->pan = $request->pan;
            $purchase->aadhar = $request->aadhar;
            $purchase->state = $request->state;
            $purchase->city = $request->city;
            $purchase->addaress = $request->address;
            $purchase->pincode = $request->pincode;
            $purchase->save();
            return redirect()->route('admin.supllier.index')->with('success', 'Supplier Created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'There was an error creating the purchase order: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            return view('admin.supllier.show',compact('supplier'));
        } catch (\Exception $e) {
            return redirect()->route('admin.supplier.index')->with('error', 'Failed to fetch Suplier details: ' . $e->getMessage());
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
        try {
            $supplier = Supplier::findOrFail($id);
            return view('admin.supllier.edit', compact('supplier'));
        } catch (\Exception $e) {
            return redirect()->route('admin.supplier.index')->with('error', 'Failed to fetch Purchase details: '. $e->getMessage());
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
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->firstname = $request->firstname;
            $supplier->lastname = $request->lastname;
            $supplier->mobile = $request->mobile;
            $supplier->email = $request->email;
            $supplier->bank_details = $request->bank_details;
            $supplier->gst = $request->gst;
            $supplier->company = $request->company;
            $supplier->pan = $request->pan;
            $supplier->aadhar = $request->aadhar;
            $supplier->state = $request->state;
            $supplier->city = $request->city;
            $supplier->addaress = $request->address;
            $supplier->pincode = $request->pincode;
            $supplier->save();
            
            return redirect()->route('admin.supllier.index')->with('success', 'Supplier Order Created successfully.');
            } catch (\Exception $e) {
                return redirect()->route('admin.supllier.index')->with('error', 'Failed to fetch Supplier details: ' . $e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $purchase = Supplier::findOrFail($id);
            $purchase->delete();
            return redirect()->route('admin.supllier.index')->with('success', 'Purchase deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.supllier.index')->with('error', 'Failed to delete Purchase: ' . $e->getMessage());
        }
    }

}
