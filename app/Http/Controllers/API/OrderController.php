<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::all();
            return response()->json($orders);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch orders', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'party_id' => 'required|integer',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'date' => 'required|date',
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

            $order = Order::create($validatedData);
            return response()->json($order, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create order', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            return response()->json($order);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Order not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch order', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'party_id' => 'required|integer',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'date' => 'required|date',
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

            $order = Order::findOrFail($id);
            $order->update($validatedData);
            return response()->json($order);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Order not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update order', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Order not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete order', 'message' => $e->getMessage()], 500);
        }
    }
}