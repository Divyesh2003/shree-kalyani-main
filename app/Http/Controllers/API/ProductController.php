<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch products', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'item_type' => 'required|integer',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:products',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'supplier_code' => 'nullable|string|max:255',
                'item_code' => 'nullable|string|max:255',
                'hsn_code' => 'nullable|string|max:255',
                'image' => 'nullable|string|max:255',
                'gallery' => 'nullable|string',
                'video' => 'nullable|string|max:255',
                'image_code' => 'nullable|string|max:255',
                'design_code' => 'nullable|string|max:255',
                'febric' => 'nullable|string|max:255',
                'base_color' => 'nullable|string|max:255',
                'compitation_color' => 'nullable|string|max:255',
                'material_composition' => 'nullable|string|max:255',
                'length' => 'nullable|numeric',
                'blouse' => 'nullable|string|max:255',
                'blouse_color' => 'nullable|string|max:255',
                'blouse_material' => 'nullable|string|max:255',
                'blouse_work' => 'nullable|string|max:255',
                'chuni' => 'nullable|string|max:255',
                'chuni_color' => 'nullable|string|max:255',
                'chuni_material' => 'nullable|string|max:255',
                'chuni_work' => 'nullable|string|max:255',
                'decdoration' => 'nullable|string|max:255',
                'extra_work' => 'nullable|string|max:255',
                'irate' => 'nullable|numeric',
                'rate' => 'nullable|numeric',
                'discount' => 'nullable|numeric',
                'patterns' => 'nullable|string|max:255',
                'occasion_type' => 'nullable|string|max:255',
                'washing_instruction' => 'nullable|string|max:255',
                'item_weight' => 'nullable|numeric',
                'weave_type' => 'nullable|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_descipriton' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'status' => 'required|boolean',
            ]);

            $product = Product::create($validatedData);
            return response()->json($product, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create product', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json($product);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch product', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'item_type' => 'required|integer',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:products,slug,' . $id,
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'supplier_code' => 'nullable|string|max:255',
                'item_code' => 'nullable|string|max:255',
                'hsn_code' => 'nullable|string|max:255',
                'image' => 'nullable|string|max:255',
                'gallery' => 'nullable|string',
                'video' => 'nullable|string|max:255',
                'image_code' => 'nullable|string|max:255',
                'design_code' => 'nullable|string|max:255',
                'febric' => 'nullable|string|max:255',
                'base_color' => 'nullable|string|max:255',
                'compitation_color' => 'nullable|string|max:255',
                'material_composition' => 'nullable|string|max:255',
                'length' => 'nullable|numeric',
                'blouse' => 'nullable|string|max:255',
                'blouse_color' => 'nullable|string|max:255',
                'blouse_material' => 'nullable|string|max:255',
                'blouse_work' => 'nullable|string|max:255',
                'chuni' => 'nullable|string|max:255',
                'chuni_color' => 'nullable|string|max:255',
                'chuni_material' => 'nullable|string|max:255',
                'chuni_work' => 'nullable|string|max:255',
                'decdoration' => 'nullable|string|max:255',
                'extra_work' => 'nullable|string|max:255',
                'irate' => 'nullable|numeric',
                'rate' => 'nullable|numeric',
                'discount' => 'nullable|numeric',
                'patterns' => 'nullable|string|max:255',
                'occasion_type' => 'nullable|string|max:255',
                'washing_instruction' => 'nullable|string|max:255',
                'item_weight' => 'nullable|numeric',
                'weave_type' => 'nullable|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_descipriton' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'status' => 'required|boolean',
            ]);

            $product = Product::findOrFail($id);
            $product->update($validatedData);
            return response()->json($product);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update product', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete product', 'message' => $e->getMessage()], 500);
        }
    }
}
