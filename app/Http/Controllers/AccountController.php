<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Country;
use App\Models\User;
class AccountController extends Controller
{
     // login user id 
    public $user_id;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->user_id = Auth::user()->id;
            } else {
                return redirect()->route('login');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $coutries = Country::where('status','A')->get();
            $states = Country::where('status','A')->get();
            $orders = Order::where('user_id',$user->id)->paginate(10);
            // dd($orders);
            return view('account.index', compact('user','orders','coutries'));
        } else {
            return redirect()->route('login');
        }
    }
    public function update(Request $request){
        
        // $request->validate([
        //     'firstname' => 'required|string|max:255',
        //     'lastname' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        //     'current_password' => 'required|string',
        //     'new_password' => 'nullable|string|min:8|confirmed',
        // ]);
        $user = Auth::user();
        if($request->current_password && $request->password && $request->new_password){
        $request->validate([
                    'current_password' => 'required|string',
                    'new_password' => 'nullable|string|min:8|confirmed',
                ]);
                if (!Hash::check($request->input('current_password'), $user->password)) {
                    return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
                }
                if ($request->filled('new_password')) {
                    $user->password = Hash::make($request->input('new_password'));
                }
        }
        // Update name, email, and address
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->addaress_1 = $request->input('addaress_1');
        $user->addaress_2 = $request->input('addaress_2');
        // Update password if a new password is provided
        $user->save();
        return redirect()->route('account')->with('status', 'Account updated successfully!');
    }
    public function email_update(Request $request){
            // dd($request);
            $user = User::where('id', $request->user_id)->first();
            $user->email = $request->email;
            $user->save();
        return redirect()->route('home')->with('status', 'Account updated successfully!');
    }
}
