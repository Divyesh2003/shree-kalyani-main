<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UserPermissionDataTable;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
class UserPermissionController extends Controller
{
    // function __construct(){
    //     $this->middleware('permission:user-permission-list', ['only' => ['index','show']]);
    //     $this->middleware('permission:user-permission-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:user-permission-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:user-permission-delete', ['only' => ['destroy']]);
    // } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserPermissionDataTable $dataTable)
    {
        return $dataTable->render('admin.user.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $roles = Role::where('status', 'A')->get();
            DB::commit();
            return view('admin.user.permission.create', compact('roles'));
        } catch (\Exception $e){
            DB::rollBack();
            Log::error('Error fetching users and Permission: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching users Permission. Please try again later.');
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
            $request->validate([
                'name' => 'required',
            ]);
            $blog = $request->all();
            if($request->status == "A"){
                $blog['status']= "A";
            }else{
                $blog['status'] = "D";
            }
            Permission::create($blog);
            return redirect()->route('admin.user.permission.index')->with('success', 'User Permission created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.user.permission.create')->with('error', 'Failed to create user Permission : ' . $e->getMessage());
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
            $userPermission = Permission::findOrFail($id);
            return view('admin.user.permission.show', compact('userPermission'));
        } catch (Exception $e) {
            return redirect()->route('admin.user.permission.index')->with('error', 'Failed to fetch User Permission details: ' . $e->getMessage());
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
            $userPermision = Permission::findOrFail($id);
            return view('admin.user.permission.edit', compact('userPermision'));
        } catch (Exception $e) {
            return redirect()->route('admin.user.permission.index')->with('error', 'Failed to fetch User Permission details: '. $e->getMessage());
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
            $request->validate([
                'name' => 'required',
            ]);

            $userPermisions = Permission::findOrFail($id);
            $userPermision =  $request->all();
            if($request->status == "A"){
                $userPermision['status']= "A";
            }else{
                $userPermision['status'] = "D";
            }
            $userPermisions->update($request->input());
            return redirect()->route('admin.user.permission.index')->with('success', 'User Permission updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.user.permission.edit', $id)->with('error', 'Failed to update User Permission: ' . $e->getMessage());
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
            $userPermisions = Permission::findOrFail($id);
            $userPermisions->delete();
            return redirect()->route('admin.user.permission.index')->with('success', 'User Permission deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.user.permission.index')->with('error', 'Failed to delete User Permission: ' . $e->getMessage());
        }
    }
}
