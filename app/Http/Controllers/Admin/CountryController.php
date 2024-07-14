<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\DataTables\CountryDataTable;
use Exception;

class CountryController extends Controller
{
    function __construct(){
        $this->middleware('permission:country-list', ['only' => ['index','show']]);
        $this->middleware('permission:country-create', ['only' => ['create','store']]);
        $this->middleware('permission:country-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountryDataTable $dataTable)
    {
        try {
            return $dataTable->render('admin.setting.location.country.index');
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
            return view('admin.setting.location.country.create');
        } catch (\Exception $e) {
            // Handle the exception, log the error, or show an error message
            return redirect()->back()->with('error', 'An error occurred while trying to load the page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'code' => 'required',
            ]);
            $data = $request->all();
            if($request->status == "A"){
                $data['status']= "A";
            }else{
                $data['status'] = "D";
            }
            // dd($blog);
            Country::create($data);
            return redirect()->route('admin.country.index')->with('success', 'Country created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.country.create')->with('error', 'Failed to create Country : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $country = Country::findOrFail($id);
            return view('admin.setting.location.country.show', compact('country'));
        } catch (Exception $e) {
            return redirect()->route('admin.country.index')->with('error', 'Failed to fetch Expense details: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $country = Country::findOrFail($id);
            return view('admin.setting.location.country.edit', compact('country'));
        } catch (Exception $e) {
            return redirect()->route('admin.blog.index')->with('error', 'Failed to fetch Country details: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request,$id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'code' => 'required',
            ]);
            $country = Country::findOrFail($id);
            $data = $request->all();
            if($request->status == "A"){
                $data['status']= "A";
            }else{
                $data['status'] = "D";
            }
            $country->update($data);
            return redirect()->route('admin.country.index')->with('success', 'Country updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.country.edit', $id)->with('error', 'Failed to update Country: ' . $e->getMessage());
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          try {
            $country = Country::findOrFail($id);
            $country->delete();
            return redirect()->route('admin.country.index')->with('success', 'Country deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.country.index')->with('error', 'Failed to delete Country: ' . $e->getMessage());
        }
    }
}
