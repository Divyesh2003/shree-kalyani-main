<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPermission;

class UserPermissionController extends Controller
{
    public function index()
    {
        try {
            $permissions = UserPermission::all();
            return response()->json($permissions);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch user permissions', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|boolean',
            ]);

            $permission = UserPermission::create($validatedData);
            return response()->json($permission, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create user permission', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $permission = UserPermission::findOrFail($id);
            return response()->json($permission);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'User permission not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch user permission', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|boolean',
            ]);

            $permission = UserPermission::findOrFail($id);
            $permission->update($validatedData);
            return response()->json($permission);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'User permission not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update user permission', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $permission = UserPermission::findOrFail($id);
            $permission->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'User permission not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user permission', 'message' => $e->getMessage()], 500);
        }
    }
}
