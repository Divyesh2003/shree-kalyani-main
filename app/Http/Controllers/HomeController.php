<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\State;
use App\Models\Review;
use App\Models\Inquiry;
use Exception;
use Auth;

class HomeController extends Controller
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //welcome Page
    public function index()
    {
        $products = Product::take(20)->get();
        $onsales = Product::take(9)->get();
        $latestArraivals = Product::take(9)->get();
        $topRateds = Product::take(9)->get();
        $blogs = Blog::take(9)->get();
        return view('welcome', compact('products', 'onsales', 'latestArraivals', 'topRateds', 'blogs'));
    }
    //Product List
    public function shop(Request $request)
    {
        // Get sort parameters from the request, default to relevance
        $sortOption = $request->input('sort_by', 'relevance');
        $sortColumn = 'created_at'; // default sort column
        $sortDirection = 'desc'; // default sort direction

        // Set sorting parameters based on the selected option
        switch ($sortOption) {
            case 'Name, A to Z':
                $sortColumn = 'name';
                $sortDirection = 'asc';
                break;
            case 'Name, Z to A':
                $sortColumn = 'name';
                $sortDirection = 'desc';
                break;
            case 'Price, low to high':
                $sortColumn = 'price';
                $sortDirection = 'asc';
                break;
            case 'Price, high to low':
                $sortColumn = 'price';
                $sortDirection = 'desc';
                break;
            default:
                $sortColumn = 'created_at';
                $sortDirection = 'desc';
                break;
        }

        // Fetch products with sorting and filtering
        $productsQuery = Product::with('category')->orderBy($sortColumn, $sortDirection);
        // Apply price filter if set
        if ($request->has('min_price') && $request->has('max_price')) {
            $productsQuery->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }
            $products = $productsQuery->paginate(15);
            $categories = Category::withCount('products')->get();
            $compares = session()->get('compare', []);
        return view('shop', compact('products','categories','compares'));
    }
    //Product single 
    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $relatedProducts  = Product::where('item_type', $product->item_type)->where('id', '!=', $product->id)->take(20)->get();
        $previousProduct = Product::where('id', '<',  $product->item_type)->orderBy('id', 'desc')->first();
        $nextProduct = Product::where('id', '>',  $product->item_type)->orderBy('id', 'asc')->first();
        $reviews = Review::where('product_id',$product->id)->get();
        return view('product_single', compact('product', 'relatedProducts', 'previousProduct', 'nextProduct','reviews'));
    }
    //About page
    public function about()
    {
        return view('about');
    }
    //Contact
    public function contact()
    {
        return view('contact');
    }

    //Blog list
    public function blog()
    {
        $blogs = Blog::with('parent')->paginate(15);
        $recentPosts = Blog::orderBy('created_at', 'desc')->take(5)->get();
        return view('blog', compact('blogs', 'recentPosts'));
    }
    //Blog single
    public function blogSingle($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $recentPosts = Blog::orderBy('created_at', 'desc')->take(5)->get();
        $relatedBlog = Blog::where('id', '!=', $blog->id)
            ->whereHas('parent', function ($query) use ($blog) {
                $query->whereIn('id', $blog->parent->pluck('id'));
            })
            ->take(3)
            ->get();
        return view('blog_single', compact('blog', 'recentPosts', 'relatedBlog'));
    }
    public function addCart(Request $request, Product $product)
    {
        try {
            if (Auth::check()) {
                // dd("hello");
                if ($request->qty != null) {
                    $qty = $request->qty;
                } else {
                    $qty = 1;
                }

                $userId = Auth::user()->id;
                $existingCartItem = Cart::where('user_id', $userId)->where('product_id', $product->id)->first();


                if ($existingCartItem) {
                    $existingCartItem->quantity += $qty;
                    $existingCartItem->save();
                    return redirect()->back()->with('success', 'Product quantity updated in cart successfully!');
                }

                $cart =  Cart::create([
                    'user_id' => $userId,
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'slug' => $product->slug,
                    'quantity' => $qty,
                    'price' => $product->price,
                ]);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            } else {
                if ($request->qty != null) {
                    $qty = $request->qty;
                } else {
                    $qty = 1;
                }
                $cart = session()->get('cart');
                if (!$cart) {
                    $cart = [
                        $product->id => [
                            'product_id' => $product->id,
                            'name' => $product->name,
                            'image' => $product->image,
                            'slug' => $product->slug,
                            'quantity' => $qty,
                            'price' => $product->price,
                        ]
                    ];
                    session()->put('cart', $cart);
                    return redirect()->back()->with('success', 'Product added to cart successfully!');
                }

                if (isset($cart[$product->id])) {
                    $cart[$product->id]['quantity'] = $cart[$product->id]['quantity'] + (int) $qty;
                    session()->put('cart', $cart);
                    return redirect()->back()->with('success', 'Product quantity updated in cart successfully!');
                }

                $cart[$product->id] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'slug' => $product->slug,
                    'quantity' => $qty,
                    'price' => $product->price,
                ];
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
        } catch (Exception $e) {
            // Handle the exception, log it, and return a response
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function checkout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $coutries = Country::where('status', 'A')->get();
            $states = State::where('status', 'A')->get();
            return view('checkout', compact('user', 'coutries', 'states'));
        }
    }

    public function removeProduct(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $productId = $request->input('product_id');
            // dd($request);
            $existingCartItem = Cart::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existingCartItem) {
                // If the item exists in the database for the authenticated user, remove it
                $existingCartItem->delete();
                return redirect()->back()->with('success', 'Product removed from cart');
            } else {
                // Handle case where the item does not exist for the authenticated user
                return redirect()->back()->with('error', 'Product not found in cart');
            }
        } else {
            $productId = $request->input('product_id');
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed from cart');
        }
    }
    public function cart(Request $request)
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            return view('cart', compact('carts'));
        } else {
            return view('cart');
        }
        // dd($carts);
    }
    public function whishlist(Request $request)
    {
        return view('whishlist');
    }
    public function getProductDetails($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 'success',
                'product' => $product
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ]);
        }
    }
    public function compare()
    {
        return view('compare');
    }
    public function autocomplete(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $results = Product::where('name', 'like', $keyword . '%')
                ->limit(6)
                ->get();
            $df = '';
            $df .= '<ul id="search-list">';
            foreach ($results as $result) {
                $df .= '<li><a href="/shop/' . $result->slug . '"><img class="me-2" src="/' . $result->image . '" width="45px">' . $result->name . ' </a></li>';
            }
            $df .= '</ul>';

            return response()->json($df);
        }
    }

    public function category($slug,Request $request)
    {
        // Get sort parameters from the request, default to relevance
        $sortOption = $request->input('sort_by', 'relevance');
        $sortColumn = 'created_at'; // default sort column
        $sortDirection = 'desc'; // default sort direction

        // Set sorting parameters based on the selected option
        switch ($sortOption) {
            case 'Name, A to Z':
                $sortColumn = 'name';
                $sortDirection = 'asc';
                break;
            case 'Name, Z to A':
                $sortColumn = 'name';
                $sortDirection = 'desc';
                break;
            case 'Price, low to high':
                $sortColumn = 'price';
                $sortDirection = 'asc';
                break;
            case 'Price, high to low':
                $sortColumn = 'price';
                $sortDirection = 'desc';
                break;
            default:
                $sortColumn = 'created_at';
                $sortDirection = 'desc';
                break;
        }
        $category = Category::where('slug', $slug)->first();
        $productsQuery = Product::where('item_type', $category->id)->with('category')->orderBy($sortColumn, $sortDirection);
        // Apply price filter if set
        if ($request->has('min_price') && $request->has('max_price')) {
            $productsQuery->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }
    $products = $productsQuery->paginate(15);
    $categories = Category::withCount('products')->get();
    $compares = session()->get('compare', []);
        // return view('shop', compact('products','categories','compares'));
        
        return view('category', compact('products','categories','compares','category'));
    }
    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }
    public function review(Request $request)
    {
        $review = new Review;
        $review->product_id = $request->product_id;
        $review->user_id = $request->user_id;
        $review->message = $request->message;
        $review->rating = $request->rating;
        $review->save();
        return redirect()->back()->with('success', 'Sucessfull Review');
    }
    public function test(){
        return view('mail.order');
    }

    public function shipping(){
        try {
            // Your normal function logic here
            return view('shipping');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function privacy(){
        try {
            // Your normal function logic here
            return view('policy');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function inquiry(Request $request){
            $inquiry = new Inquiry;
            $inquiry->name = $request->con_name;
            $inquiry->email = $request->con_email;
            $inquiry->subject = $request->subject;
            $inquiry->message = $request->con_message;
            $inquiry->status = 'A';
            $inquiry->save();
    }
    public function shipping_info(){
        try {
            // Your normal function logic here
            return view('shippinginfo');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function delivery_info(){
        try {
            // Your normal function logic here
            return view('deliveryinformation');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function arraival(Request $request){
        // Get sort parameters from the request, default to relevance
        $sortOption = $request->input('sort_by', 'relevance');
        $sortColumn = 'created_at'; // default sort column
        $sortDirection = 'desc'; // default sort direction

        // Set sorting parameters based on the selected option
        switch ($sortOption) {
            case 'Name, A to Z':
                $sortColumn = 'name';
                $sortDirection = 'asc';
                break;
            case 'Name, Z to A':
                $sortColumn = 'name';
                $sortDirection = 'desc';
                break;
            case 'Price, low to high':
                $sortColumn = 'price';
                $sortDirection = 'asc';
                break;
            case 'Price, high to low':
                $sortColumn = 'price';
                $sortDirection = 'desc';
                break;
            default:
                $sortColumn = 'created_at';
                $sortDirection = 'desc';
                break;
        }

        // Fetch products with sorting and filtering
        $productsQuery = Product::where('arraival','A')->with('category')->orderBy($sortColumn, $sortDirection);
        // Apply price filter if set
        if ($request->has('min_price') && $request->has('max_price')) {
            $productsQuery->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }
            $products = $productsQuery->paginate(15);
            $categories = Category::withCount('products')->get();
            $compares = session()->get('compare', []);
        return view('arraival', compact('products','categories','compares'));
    }
} 