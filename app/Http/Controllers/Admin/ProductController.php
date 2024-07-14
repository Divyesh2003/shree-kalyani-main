<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Exception;
use Log;
use App\Http\Controllers\Admin\ImageController;

class ProductController extends Controller
{
    function __construct(){
        $this->middleware('permission:product-list', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        try {
            return $dataTable->render('admin.product.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while rendering the DataTable.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = Category::where('status', 'A')->with('parent')->get();
            $supplieres = Supplier::get();
            return view('admin.product.create', compact('categories','supplieres'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching categories.');
        }
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
            $product = $request->all();
            if($request->status == "A"){
                $product['status']= "A";
            }else{
                $product['status'] = "D";
            }
            if($request->arraival == "A"){
                $product['arraival']= "A";
            }else{
                $product['arraival'] = "D";
            }
            $myimage = "null";
            if ($request->image){
                $image = new ImageController;
                $myimage = $image->index($request);
            }
            $myvideo = "null";

            if ($request->video){
                $image = new ImageController;
                $myvideo = $image->video($request);
            }
           
            $product['image'] = $myimage;
            $product['video'] = $myvideo;
             //<--------------- multiple images--------------->
        $i = array();
        $gallary = null;
        if ($request->gallery){
            
            foreach ($request->gallery as $img) {
                $image = new ImageController;
                $gl = $image->multiimage($img);
                array_push($i, $gl);
            }
        }
        $gallary = json_encode($i);
            $product['gallery'] = $gallary;
           $rt = Product::create($product);
            return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.product.create')->with('error', 'Failed to create Product: ' . $e->getMessage());
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
            $product = Product::findOrFail($id);
            return view('admin.product.show', compact('product'));
        } catch (Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to fetch Product details: ' . $e->getMessage());
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
            $product = Product::findOrFail($id);
            $categories = Category::where('status','A')->with('parent')->get();
            $supplieres = Supplier::get();
            return view('admin.product.edit', compact('product','categories','supplieres'));
        } catch (Exception $e) {
            return redirect()->route('admin.product.index')->with('error', 'Failed to fetch product details: '. $e->getMessage());
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
            // Fetch the existing product
            $product = Product::findOrFail($id);
            $productData = $request->all();
            if($request->status == "A") {
                $productData['status'] = "A";
            } else {
                $productData['status'] = "D";
            }
            if($request->arraival == "A"){
                $productData['arraival']= "A";
            }else{
                $productData['arraival'] = "D";
            }
            $myimage = $product->image; // Retain the existing image if no new image is provided
            if ($request->image) {
                $image = new ImageController;
                $myimage = $image->index($request);
            }
            $myvideo = "null";
            if ($request->video){
                $image = new ImageController;
                $myvideo = $image->video($request);
            }
            $productData['image'] = $myimage;
            $productData['video'] = $myvideo;
            //<--------------- multiple images--------------->
            $i = array();
            $gallery = $product->gallery; // Retain the existing gallery if no new gallery is provided
            if ($request->gallery) {
                foreach ($request->gallery as $img) {
                    $image = new ImageController;
                    $gl = $image->multiimage($img);
                    array_push($i, $gl);
                }
                $gallery = json_encode($i);
            }
            $productData['gallery'] = $gallery;
            $product->update($productData);
            return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.product.edit', $id)->with('error', 'Failed to update Product: ' . $e->getMessage());
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
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.product.index')->with('error', 'Failed to delete Product: ' . $e->getMessage());
        }
    }
}
