<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
class AuthController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 // login user id 
 public $user_id;
    public function __construct()
    {
       $this->middleware(function ($request, $next) {
           if(Auth::user())
           {
               $this->user_id= Auth::user()->id;
           }
           return $next($request);
       });
    }
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $loginField = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $credentials = [
            $loginField => $request->email,
            'password' => $request->password,
        ];
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
    
        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
   
}
