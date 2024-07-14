<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $wishlist = session()->get('wishlist', []);
        if (!isset($wishlist[$product->id])) {
            $wishlist[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'slug' => $product->slug,
                'price' => $product->price,
            ];
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product added to wishlist successfully!');
        }

        return redirect()->back()->with('info', 'Product is already in your wishlist!');
    }

    public function remove(Product $product)
    {
        $wishlist = session()->get('wishlist', []);
        if (isset($wishlist[$product->id])) {
            unset($wishlist[$product->id]);
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product removed from wishlist successfully!');
        }
        return redirect()->back()->with('info', 'Product is not in your wishlist!');
    }

    public function index()
    {
        $wishlist = session()->get('wishlist', []);
        return view('wishlist.index', compact('wishlist'));
    }
}
