<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UserRoleDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Role;
use App\Models\Permission;
use Exception;
class UserRoleController extends Controller
{
    function __construct(){
        // $this->middleware('permission:user-role-list', ['only' => ['index','show']]);
        // $this->middleware('permission:user-role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:user-role-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:user-role-delete', ['only' => ['destroy']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRoleDataTable $dataTable)
    {
        return $dataTable->render('admin.user.role.index');
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
            $permissions = Permission::where('status', 'A')->get();
            DB::commit();
            return view('admin.user.role.create', compact('permissions'));
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
        // dd($request->permissions);
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $userRole = $request->all();
            if($request->status == "A"){
                $userRole['status']= "A";
            }else{
                $userRole['status'] = "D";
            }
            // $userRole['permissions'] = json_encode($request->permissions);
           $role = Role::create($userRole);
           $permission = $request->permissions;
            $role->permissions()->attach($permission);
            return redirect()->route('admin.user.role.index')->with('success', 'User Role created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.user.role.create')->with('error', 'Failed to create user Role : ' . $e->getMessage());
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
            $userRole = Role::findOrFail($id);
            return view('admin.user.role.show', compact('userRole'));
        } catch (Exception $e) {
            return redirect()->route('admin.user.role.index')->with('error', 'Failed to fetch User Role details: ' . $e->getMessage());
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
            $userRole = Role::findOrFail($id);
            $permissions = Permission::where('status', 'A')->get();
            return view('admin.user.role.edit', compact('userRole','permissions'));
        } catch (Exception $e) {
            return redirect()->route('admin.user.role.index')->with('error', 'Failed to fetch User Role details: '. $e->getMessage());
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
        // dd($request);
        // try {
            $request->validate([
                'name' => 'required',
            ]);
        
            $userRole = Role::findOrFail($id);
            $userRole->name = $request->name;
            $userRole->status = $request->status == "A" ? "A" : "D";
            $userRole->save();
        
            $permissions = $request->permissions;
            $userRole->permissions()->sync($permissions);
        
            return redirect()->route('admin.user.role.index')->with('success', 'User Role updated successfully.');
        // } catch (Exception $e) {
        //     return redirect()->route('admin.user.role.edit', $id)->with('error', 'Failed to update User Role: ' . $e->getMessage());
        // }
          return redirect()->route('admin.user.role.edit', $id)->with('error', 'Failed to update User Role: ' . $e->getMessage());   
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
            $userRole = Role::findOrFail($id);
            $userRole->delete();
            return redirect()->route('admin.user.role.index')->with('success', 'User Role deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.user.role.index')->with('error', 'Failed to delete User Role: ' . $e->getMessage());
        }
    }
}
