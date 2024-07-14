<?php

namespace App\Http\Controllers\API;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        try {
            $blogs = Blog::all();
            return response()->json($blogs);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch Blogs', 'message' => $e->getMessage()], 500);
        }
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'item_type' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blogs',
                'description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'status' => 'required|boolean',
            ]);
            $blog = $request->all();
            if($request->status == "A"){
                $blog['status']= "A";
            }else{
                $blog['status'] = "D";
            }
             Blog::create($blog);
            return response()->json($blog, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create blog', 'message' => $e->getMessage()], 500);
        }
    
    }

    // Display the specified resource.
    public function show($id)
    {
        try {
            $blog = Blog::with('blogcategory')->findOrFail($id);
            return response()->json($blog, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Blog not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the blog.'], 500);
        }
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'item_type' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blogs,slug,' . $id,
                'description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'status' => 'required|boolean',
            ]);
    
            $blog = Blog::findOrFail($id);
            $blog->update($validatedData);
            return response()->json($blog);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Blog not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update blog', 'message' => $e->getMessage()], 500);
        }   
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Blog not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete blog', 'message' => $e->getMessage()], 500);
        }
    }
}
