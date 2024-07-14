<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRole;

class UserRoleController extends Controller
{
    public function index()
    {
        try {
            $roles = UserRole::all();
            return response()->json($roles);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch user roles', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'permissions' => 'required|string',
                'status' => 'required|boolean',
            ]);

            $role = UserRole::create($validatedData);
            return response()->json($role, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create user role', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $role = UserRole::findOrFail($id);
            return response()->json($role);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'User role not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch user role', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'permissions' => 'required|string',
                'status' => 'required|boolean',
            ]);

            $role = UserRole::findOrFail($id);
            $role->update($validatedData);
            return response()->json($role);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'User role not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update user role', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $role = UserRole::findOrFail($id);
            $role->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'User role not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user role', 'message' => $e->getMessage()], 500);
        }
    }
}
