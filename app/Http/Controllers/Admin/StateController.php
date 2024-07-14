<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Http\Controllers\Controller;
use App\DataTables\StateDataTable;
use Exception;
class StateController extends Controller
{

    function __construct(){
        $this->middleware('permission:state-list', ['only' => ['index','show']]);
        $this->middleware('permission:state-create', ['only' => ['create','store']]);
        $this->middleware('permission:state-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:state-delete', ['only' => ['destroy']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StateDataTable $dataTable)
    {
        // dd("hello");
        try {
            return $dataTable->render('admin.setting.location.state.index');
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
            $countries = Country::where('status','A')->get();
            return view('admin.setting.location.state.create',compact('countries'));
        } catch (\Exception $e) {
            // Handle the exception, log the error, or show an error message
            return redirect()->back()->with('error', 'An error occurred while trying to load the page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateRequest $request)
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
            State::create($data);
            return redirect()->route('admin.state.index')->with('success', 'State created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.state.create')->with('error', 'Failed to create State : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $countries = Country::where('status','A')->get();
            $state = State::findOrFail($id);
            return view('admin.setting.location.state.show', compact('state','countries'));
        } catch (Exception $e) {
            return redirect()->route('admin.state.index')->with('error', 'Failed to fetch State details: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $countries = Country::where('status','A')->get();
            $state = State::findOrFail($id);
            return view('admin.setting.location.state.edit', compact('state','countries'));
        } catch (Exception $e) {
            return redirect()->route('admin.state.index')->with('error', 'Failed to fetch State details: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStateRequest  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStateRequest $request,$id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'code' => 'required',
            ]);
            $state = State::findOrFail($id);
            $data = $request->all();
            if($request->status == "A"){
                $data['status']= "A";
            }else{
                $data['status'] = "D";
            }
            $state->update($data);
            return redirect()->route('admin.state.index')->with('success', 'State updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.state.edit', $id)->with('error', 'Failed to update State: ' . $e->getMessage());
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $state = State::findOrFail($id);
            $state->delete();
            return redirect()->route('admin.state.index')->with('success', 'State deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.state.index')->with('error', 'Failed to delete State: ' . $e->getMessage());
        }
    }
}
