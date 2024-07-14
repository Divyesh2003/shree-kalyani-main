<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        try {
            $purchases = Purchase::all();
            return response()->json($purchases);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch purchases', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'date' => 'required|date',
                'due_date' => 'required|date',
                'vendor_name' => 'required|string|max:255',
                'vendor_address' => 'required|string',
                'vendor_phone' => 'required|string|max',
                'tax' => 'required|numeric',
                'total' => 'required|numeric',
            ]);

            $purchase = Purchase::create($validatedData);
            return response()->json($purchase, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create purchase', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $purchase = Purchase::findOrFail($id);
            return response()->json($purchase);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Purchase not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch purchase', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'date' => 'required|date',
                'due_date' => 'required|date',
                'vendor_name' => 'required|string|max:255',
                'vendor_address' => 'required|string',
                'vendor_phone' => 'required|string|max:20',
                'vendor_email' => 'required|email|max:255',
                'sub_totals' => 'required|numeric',
                'tax' => 'required|numeric',
                'total' => 'required|numeric',
            ]);

            $purchase = Purchase::findOrFail($id);
            $purchase->update($validatedData);
            return response()->json($purchase);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Purchase not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update purchase', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $purchase = Purchase::findOrFail($id);
            $purchase->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Purchase not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete purchase', 'message' => $e->getMessage()], 500);
        }
    }
}
