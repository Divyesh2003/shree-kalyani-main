<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = BlogCategory::all();
            return response()->json($categories);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch categories', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
          
            $validatedData = $request->validate([
                'parent_id' => 'nullable|integer',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blog_categories',
                'description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
            ]);
            $data = $request->all();
            if($request->status == "A"){
                $data['status']= "A";
            }else{
                $data['status'] = "D";
            }
          $category = BlogCategory::create($data);
            return response()->json($category, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create category', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $category = BlogCategory::findOrFail($id);
            return response()->json($category);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch category', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
          
            $validatedData = $request->validate([
                'parent_id' => 'nullable|integer',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blog_categories,slug,' . $id,
                'description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
            ]);

            $category = BlogCategory::findOrFail($id);
            $category->update($validatedData);
            return response()->json($category);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update category', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $category = BlogCategory::findOrFail($id);
            $category->delete();
            return response()->json(['sucess' => 'Sucess Blog Category Deleted'], 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete category', 'message' => $e->getMessage()], 500);
        }
    }
}
