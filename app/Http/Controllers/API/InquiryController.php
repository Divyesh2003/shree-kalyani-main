<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        try {
            $inquiries = Inquiry::all();
            return response()->json($inquiries);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch inquiries', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'status' => 'required|boolean',
            ]);

            $inquiry = Inquiry::create($validatedData);
            return response()->json($inquiry, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create inquiry', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $inquiry = Inquiry::findOrFail($id);
            return response()->json($inquiry);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Inquiry not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch inquiry', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'status' => 'required|boolean',
            ]);

            $inquiry = Inquiry::findOrFail($id);
            $inquiry->update($validatedData);
            return response()->json($inquiry);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Inquiry not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update inquiry', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $inquiry = Inquiry::findOrFail($id);
            $inquiry->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Inquiry not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete inquiry', 'message' => $e->getMessage()], 500);
        }
    }
}
