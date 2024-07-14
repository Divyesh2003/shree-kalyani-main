<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\BlogDataTable;
use App\Models\BlogCategory;
use App\Models\Blog;
use Exception;
class BlogController extends Controller
{
    function __construct(){
        $this->middleware('permission:blog-list', ['only' => ['index','show']]);
        $this->middleware('permission:blog-create', ['only' => ['create','store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::where('status','A')->with('parent')->get();
        // dd($categories);
        return view('admin.blog.create',compact('categories'));
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
                'item_type' => 'required',
                'name' => 'required',
                'slug' => 'required',
            ]);
            $blog = $request->all();
            if($request->status == "A"){
                $blog['status']= "A";
            }else{
                $blog['status'] = "D";
            }
            $myimage = "null";
            if ($request->image){
                $image = new ImageController;
                $myimage = $image->index($request);
            }
            $blog['image'] = $myimage;
            // dd($blog);
            Blog::create($blog);
            return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog.create')->with('error', 'Failed to create blog : ' . $e->getMessage());
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
            // dd($id);
            $blog = Blog::findOrFail($id);
            // dd($blog);
            return view('admin.blog.show', compact('blog'));
        } catch (Exception $e) {
            return redirect()->route('admin.blog.index')->with('error', 'Failed to fetch Blog details: ' . $e->getMessage());
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
            $blog = Blog::findOrFail($id);
        $blogCategory = BlogCategory::where('status','A')->with('parent')->get();
            return view('admin.blog.edit', compact('blog','blogCategory'));
        } catch (Exception $e) {
            return redirect()->route('admin.blog.index')->with('error', 'Failed to fetch Blog details: ' . $e->getMessage());
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
                // dd($request->image);
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
            ]);

            $category = Blog::findOrFail($id);
            $Blog = $request->all();
            $myimage = "null";
            if ($request->image) {
                $image = new ImageController;
                $myimage = $image->index($request);
                $Blog['image'] = $myimage;
            }

            if($request->status == "A"){
                $Blog['status']= "A";
            }else{
                $Blog['status'] = "D";
            }

            $category->update($Blog);
            return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog.edit', $id)->with('error', 'Failed to update Blog: ' . $e->getMessage());
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
        //
    }
}
