<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CategoryDataTable;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    function __construct(){
        $this->middleware('permission:category-list', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**category -list	category-list	
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }
    /**
     * Show the 0form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status','A')->with('parent')->get();

        return view('admin.category.create',compact('categories'));
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
        Category::create($category);
            return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.category.create')->with('error', 'Failed to create category: ' . $e->getMessage());
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
            $category = Category::findOrFail($id);
            // dd($category);
            return view('admin.category.show', compact('category'));
        } catch (Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to fetch category details: ' . $e->getMessage());
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
            $category = Category::findOrFail($id);
        $categories = Category::where('status','A')->with('parent')->get();
            return view('admin.category.edit', compact('category','categories'));
        } catch (Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to fetch category details: ' . $e->getMessage());
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

            $category = Category::findOrFail($id);
            $categori6 = $request->all();
            
            if($request->status == "A"){
                $category['status']= "A";
            }else{
                $category['status'] = "D";
            }
            $category->update($categori6);
            return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.category.edit', $id)->with('error', 'Failed to update category: ' . $e->getMessage());
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
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }
}
