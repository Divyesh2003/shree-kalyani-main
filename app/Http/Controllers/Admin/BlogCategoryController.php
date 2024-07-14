<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\BlogCategoryDataTable;
use App\Models\BlogCategory;
use Exception;
class BlogCategoryController extends Controller
{
        function __construct(){
                $this->middleware('permission:blog-category-list', ['only' => ['index','show']]);
                $this->middleware('permission:blog-category-create', ['only' => ['create','store']]);
                $this->middleware('permission:blog-category-edit', ['only' => ['edit','update']]);
                $this->middleware('permission:blog-category-delete', ['only' => ['destroy']]);
            }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::where('status','A')->with('parent')->get();
        
        return view('admin.blog.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
            ]);
            $category = $request->all();
            if($request->status == "A"){
                $category['status']= "A";
            }else{
                $category['status'] = "D";
            }
            // dd($category);
            BlogCategory::create($category);
            return redirect()->route('admin.blog.category.index')->with('success', 'Blog Category created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog.category.create')->with('error', 'Failed to create blog category: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $category = BlogCategory::findOrFail($id);
            // dd($category);
            return view('admin.blog.category.show', compact('category'));
        } catch (Exception $e) {
            return redirect()->route('admin.blog.category.index')->with('error', 'Failed to fetch category details: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = BlogCategory::findOrFail($id);
        $categories = BlogCategory::where('status','A')->with('parent')->get();
            return view('admin.blog.category.edit', compact('category','categories'));
        } catch (Exception $e) {
            return redirect()->route('admin.blog.category.index')->with('error', 'Failed to fetch category details: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'name' => 'required',
                'slug' => 'required',
            ]);

            $category = BlogCategory::findOrFail($id);
            $categori6 = $request->all();
            
            if($request->status == "A"){
                $category['status']= "A";
            }else{
                $category['status'] = "D";
            }
            $category->update($categori6);
            return redirect()->route('admin.blog.category.index')->with('success', 'Blog Category updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog.category.edit', $id)->with('error', 'Failed to update category: ' . $e->getMessage());
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = BlogCategory::findOrFail($id);
            $category->delete();
            return redirect()->route('admin.blog.category.index')->with('success', 'Category deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog.category.index')->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }
}
