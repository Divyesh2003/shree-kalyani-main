<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function index()
    {
        try {
            $orderItems = OrderItem::all();
            return response()->json($orderItems);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch order items', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'product_id' => 'required|integer',
                'order_id' => 'required|integer',
                'cost' => 'required|numeric',
                'qty' => 'required|integer',
                'shipment_mode' => 'nullable|string|max:255',
                'shipment_note' => 'nullable|string',
                'shipment_status' => 'nullable|string|max:255',
                'season' => 'nullable|string|max:255',
                'payment_terms' => 'nullable|string|max:255',
                'year' => 'nullable|integer',
                'total_qty' => 'required|integer',
                'total_value' => 'required|numeric',
                'payment_mode' => 'nullable|string|max:255',
                'remark' => 'nullable|string',
                'status' => 'required|boolean',
            ]);

            $orderItem = OrderItem::create($validatedData);
            return response()->json($orderItem, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create order item', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $orderItem = OrderItem::findOrFail($id);
            return response()->json($orderItem);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Order item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch order item', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'product_id' => 'required|integer',
                'order_id' => 'required|integer',
                'cost' => 'required|numeric',
                'qty' => 'required|integer',
                'shipment_mode' => 'nullable|string|max:255',
                'shipment_note' => 'nullable|string',
                'shipment_status' => 'nullable|string|max:255',
                'season' => 'nullable|string|max:255',
                'payment_terms' => 'nullable|string|max:255',
                'year' => 'nullable|integer',
                'total_qty' => 'required|integer',
                'total_value' => 'required|numeric',
                'payment_mode' => 'nullable|string|max:255',
                'remark' => 'nullable|string',
                'status' => 'required|boolean',
            ]);

            $orderItem = OrderItem::findOrFail($id);
            $orderItem->update($validatedData);
            return response()->json($orderItem);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Order item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update order item', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $orderItem = OrderItem::findOrFail($id);
            $orderItem->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Order item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete order item', 'message' => $e->getMessage()], 500);
        }
    }
}
