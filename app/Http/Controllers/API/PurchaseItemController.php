<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchaseItem;

class PurchaseItemController extends Controller
{
    public function index()
    {
        try {
            $purchaseItems = PurchaseItem::all();
            return response()->json($purchaseItems);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch purchase items', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'purchase_id' => 'required|exists:purchases,id',
                'cost' => 'required|numeric',
                'qty' => 'required|numeric',
                'sub_total' => 'required|numeric',
                'info' => 'nullable|string',
            ]);

            $purchaseItem = PurchaseItem::create($validatedData);
            return response()->json($purchaseItem, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create purchase item', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $purchaseItem = PurchaseItem::findOrFail($id);
            return response()->json($purchaseItem);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Purchase item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch purchase item', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'purchase_id' => 'required|exists:purchases,id',
                'cost' => 'required|numeric',
                'qty' => 'required|numeric',
                'sub_total' => 'required|numeric',
                'info' => 'nullable|string',
            ]);

            $purchaseItem = PurchaseItem::findOrFail($id);
            $purchaseItem->update($validatedData);
            return response()->json($purchaseItem);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Purchase item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update purchase item', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $purchaseItem = PurchaseItem::findOrFail($id);
            $purchaseItem->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Purchase item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete purchase item', 'message' => $e->getMessage()], 500);
        }
    }
}
