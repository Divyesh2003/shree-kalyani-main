<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        try {
            $expenses = Expense::all();
            return response()->json($expenses);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch expenses', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'amount' => 'required|numeric',
                'date' => 'required|date',
                'status' => 'required|boolean',
            ]);

            $expense = Expense::create($validatedData);
            return response()->json($expense, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create expense', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $expense = Expense::findOrFail($id);
            return response()->json($expense);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Expense not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch expense', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'amount' => 'required|numeric',
                'date' => 'required|date',
                'status' => 'required|boolean',
            ]);

            $expense = Expense::findOrFail($id);
            $expense->update($validatedData);
            return response()->json($expense);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Expense not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update expense', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $expense = Expense::findOrFail($id);
            $expense->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Expense not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete expense', 'message' => $e->getMessage()], 500);
        }
    }
}
