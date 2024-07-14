<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\InquiryDataTable;
use App\Models\Inquiry;
use App\Models\Product;
use Illuminate\View\View;
use Exception;

class InquiryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
          $this->middleware('permission:inquiry-list', ['only' => ['index','show']]);
          $this->middleware('permission:inquiry-create', ['only' => ['create','store']]);
          $this->middleware('permission:inquiry-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:inquiry-delete', ['only' => ['destroy']]);
     }

    public function index(InquiryDataTable $dataTable)
    {
        return $dataTable->render('admin.inquiry.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.inquiry.create');
        } catch (\Exception $e) {
            // Handle the exception, log the error, or show an error message
            return redirect()->back()->with('error', 'An error occurred while trying to load the page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);
            if($request->status == "A"){
                $data['status']= "A";
            }else{
                $data['status'] = "D";
            }
            $inquiry = Inquiry::create($data);
            return redirect()->route('admin.inquiry.index')->with('success', 'Inquiry created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.inquiry.create')->with('error', 'Failed to create Inquiry: ' . $e->getMessage());
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
            $inquiry = Inquiry::findOrFail($id);
            return view('admin.inquiry.show', compact('inquiry'));
        } catch (Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to fetch Inquiry details: ' . $e->getMessage());
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
            $inquiry = Inquiry::findOrFail($id);
            return view('admin.inquiry.edit', compact('inquiry'));
        } catch (Exception $e) {
            return redirect()->route('admin.inquiry.index')->with('error', 'Failed to fetch Inquiry details: '. $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquiry $inquiry)
{
    try {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        
        if($request->status == "A"){
            $data['status']= "A";
        }else{
            $data['status'] = "D";
        }
        $inquiry->update($data);
   
        return redirect()->route('admin.inquiry.index')->with('success', 'Inquiry updated successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.inquiry.edit', $inquiry)->with('error', 'Failed to update Inquiry: ' . $e->getMessage());
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
            $inquiry = Inquiry::findOrFail($id);
            $inquiry->delete();
            return redirect()->route('admin.inquiry.index')->with('success', 'Inquiry deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.inquiry.index')->with('error', 'Failed to delete Inquiry: ' . $e->getMessage());
        }
    }
}
