<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Exception;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function __construct(){
        $this->middleware('permission:user-list', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
         
            $roles = Role::where('status', 'A')->get();
            return view('admin.user.create', compact('roles'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error fetching users and roles: ' . $e->getMessage());
            // Optionally, you can redirect to a different page or show an error message
            return redirect()->back()->with('error', 'An error occurred while fetching users and roles. Please try again later.');
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
            // dd($request);
            $request->validate([
                'role' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'mobile' => 'required',
                // 'email' => 'required',
                'password' => 'required',
                'status' => 'required',
            ]);
            $user = $request->all();
            $profile = "null";
            if ($request->image){
                $image = new ImageController;
                $profile = $image->profile($request);
                // dd($profile);
            }
            // dd($profile);
            $user['image'] = $profile;
            if($request->status == "A"){
                $user['status']= "A";
            }else{
                $user['status'] = "D";
            }
            $user['password'] = Hash::make($request->password);
          $user = User::create($user);
          $user->roles()->attach($request->role);
            return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.user.create')->with('error', 'Failed to create user : ' . $e->getMessage());
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
            $user = User::findOrFail($id);
            return view('admin.user.show', compact('user'));
        } catch (Exception $e) {
            return redirect()->route('admin.expense.index')->with('error', 'Failed to fetch Expense details: ' . $e->getMessage());
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
            $user = User::findOrFail($id);
            $roles = Role::where('status', 'A')->get();
            return view('admin.user.edit', compact('user','roles'));
        } catch (Exception $e) {
            return redirect()->route('admin.user.index')->with('error', 'Failed to fetch User details: '. $e->getMessage());
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
        // try {
            $request->validate([
                'role' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                // 'password' => 'required',
                'status' => 'required',
            ]);
            $user = User::findOrFail($id);
            $data =  $request->all();
            $profile = "null";
            if ($request->image){
                $image = new ImageController;
                $profile = $image->profile($request);
                $data['image'] = $profile;
            }
            if($request->status == "A"){
                $data['status']= "A";
            }else{
                $data['status'] = "D";
            }
            $data['password'] = Hash::make($request->password);
            $user->update($data);
            $user->roles()->sync($request->role);
            return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
        // } catch (Exception $e) {
        //     return redirect()->route('admin.user.edit', $id)->with('error', 'Failed to update User: ' . $e->getMessage());
        // }  
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
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.user.index')->with('error', 'Failed to delete Product: ' . $e->getMessage());
        }
    }
}
