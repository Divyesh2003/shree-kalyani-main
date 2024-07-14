<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
class CompareController extends Controller
{
    // login user id 
    public $user_id;

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function add(Request $request, Product $product)
    {
        // dd($product);
        $compare = session()->get('compare', []);
        
        // Check if the product is already in the compare list
        if (isset($compare[$product->id])) {
            return redirect()->back()->with('info', 'Product is already in your compare list!');
        }

        // Check if there are already two products in the compare list
        if (count($compare) >= 3) {
            return redirect()->back()->with('error', 'You can only compare two products at a time.');
        }

        // Add the product to the compare list
        $compare[$product->id] = [
            'product_id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'supplier_code' => $product->supplier_code,
            'compitation_color' => $product->compitation_color,
            'material_composition' => $product->material_composition,
            'length' => $product->length,
            'blouse' => $product->blouse,
            'blouse_color' => $product->blouse_color,
            'blouse_work' => $product->blouse_work,
            'patterns' => $product->patterns,
            'item_weight' => $product->item_weight,
            'blouse_material' => $product->blouse_material,
            'image' => $product->image,
            'slug' => $product->slug,
            'price' => $product->price,
        ];

        session()->put('compare', $compare);
        return redirect()->back()->with('success', 'Product added to compare list successfully!');
    }

    public function remove(Product $product)
    {
        $compare = session()->get('compare', []);

        if (isset($compare[$product->id])) {
            unset($compare[$product->id]);
            session()->put('compare', $compare);
            return redirect()->back()->with('success', 'Product removed from compare list successfully!');
        }

        return redirect()->back()->with('info', 'Product is not in your compare list!');
    }


    public function index()
    {
        $compare = session()->get('compare', []);
        return view('compare', compact('compare'));
    }

    public function clearCompare()
    {
        // Clear compare products from session
        session()->forget('compare');
        
        return redirect()->route('shop')->with('success', 'Compare list cleared successfully.');
    }
}
