<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\Expense;
use App\Models\Inquiry;
use App\Models\Order;
// use App\Models\Product;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function dashboard(){
        try {
            $total_category_count = Category::where('status','A')->count();
            $total_product_count = Product::where('status','A')->count();
            $total_blog_category_count = BlogCategory::where('status','A')->count();
            $total_blog_count = Blog::where('status','A')->count();
            $total_active_user = User::where('status','A')->count();
            $deactive_total = User::where('status','D')->count();
            $total_user = User::count();
            $expense = Expense::where('status','A')->sum('amount');
            $inquiry = Inquiry::where('status','A')->count();
            $total_order = Order::count();
            $total_approved_order = Order::where('status','Approved')->count();
            $total_pending_order = Order::where('status','Pending')->count();
            $total_canceled_order = Order::where('status','Canceled')->count();
            // dd($expense);
            return view('admin.dashboard',compact('total_approved_order','total_canceled_order','total_pending_order','total_order','inquiry','expense','total_category_count','total_product_count','total_blog_category_count','total_blog_count','total_active_user','deactive_total','total_user'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'Unable to fetch categories at this time.');
        }
    }


    public function profile(){
        $profile = User::where('id',auth()->guard('admin')->user()->id)->first();
        return view('admin.setting.profile',compact('profile'));
   }

   public function profileStore(Request $request){
    // dd($request);
       $myimage = "null";
       if ($request->image){
           $image = new ImageController;
           $myimage = $image->index($request);
        }
        $profile = User::where('id',$request->id)->first();
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->mobile = $request->mobile;
        $profile->email = $request->email;
        if($request->password != null){
            $profile->password = Hash::make($request->password);
        }
        if($myimage != 'null'){
            $profile->image = $myimage;
        }
        $profile->bank_details = $request->bank_details;
        $profile->save();
        // dd($request,$profile);
    // DD($profile);
    return redirect()->back()->with('success', 'Profile Updated successfully');
   }

   public function calculator(){
    return view('admin.setting.calculator');
   }
}
