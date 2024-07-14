<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PurchaseDataTable;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;


class PurchaseController extends Controller
{
    function __construct(){
        $this->middleware('permission:purchase-list', ['only' => ['index','show']]);
        $this->middleware('permission:purchase-create', ['only' => ['create','store']]);
        $this->middleware('permission:purchase-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:purchase-delete', ['only' => ['destroy']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PurchaseDataTable $dataTable)
    {
        return $dataTable->render('admin.purchase.index');
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status','A')->with('parent')->get();
      
        return view('admin.purchase.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $purchase = new Purchase;
            $purchase->date = $request->date;
            $purchase->due_date = $request->due_date;
            $purchase->vendor_name = $request->vendor_name;
            $purchase->vendor_address = $request->vendor_address;
            $purchase->vendor_phone = $request->vendor_phone;
            $purchase->vendor_email = $request->vendor_email;
            $purchase->sub_totals = $request->sub_totals;
            $purchase->item_count = count($request->category_id);
            $purchase->tax = $request->tax ?? 0; // Set tax to 0 if not provided
            $purchase->total = $request->total;
            $purchase->save();
    
            foreach ($request->category_id as $key => $category) {
                $purchaseItem = new PurchaseItem;
                $purchaseItem->category_id = $category;
                $purchaseItem->purchase_id = $purchase->id;
                $purchaseItem->cost = $request->cost[$key];
                $purchaseItem->qty = $request->qty[$key];
                $purchaseItem->sub_total = $request->sub_total[$key];
                $purchaseItem->info = $request->info[$key];
                $purchaseItem->save();
            }
            DB::commit();
            return redirect()->route('admin.purchase.index')->with('success', 'Purchase Order Created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'There was an error creating the purchase order: ' . $e->getMessage()]);
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
            $purchase = Purchase::findOrFail($id);
            $purchaseitems = PurchaseItem::where('purchase_id',$id)->with('category')->get();
            return view('admin.purchase.show', compact('purchase','purchaseitems'));
        } catch (Exception $e) {
            return redirect()->route('admin.purchase.index')->with('error', 'Failed to fetch Purchase details: ' . $e->getMessage());
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
            $categories = Category::where('status','A')->with('parent')->get();
            $purchase = Purchase::findOrFail($id);
            $purchaseitems = PurchaseItem::where('purchase_id',$id)->with('category')->get();
            return view('admin.purchase.edit', compact('categories','purchase','purchaseitems'));
        } catch (Exception $e) {
            return redirect()->route('admin.purchase.index')->with('error', 'Failed to fetch Purchase details: '. $e->getMessage());
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
            $purchase = Purchase::findOrFail($id);
            $purchase->date = $request->date;
            $purchase->due_date = $request->due_date;
            $purchase->vendor_name = $request->vendor_name;
            $purchase->vendor_address = $request->vendor_address;
            $purchase->vendor_phone = $request->vendor_phone;
            $purchase->vendor_email = $request->vendor_email;
            $purchase->sub_totals = $request->sub_totals;
            $purchase->item_count = count($request->category_id);
            $purchase->tax = $request->tax ?? 0; // Set tax to 0 if not provided
            $purchase->total = $request->total;
            $purchase->save();
         
            foreach ($request->item as $key => $category) {
                $purchaseItem = PurchaseItem::where('id',$category)->where('purchase_id',$purchase->id)->first();
                if($purchaseItem != null){
                    $purchaseItem->category_id = $request->category_id[$key];
                    $purchaseItem->purchase_id = $purchase->id;
                    $purchaseItem->cost = $request->cost[$key];
                    $purchaseItem->qty = $request->qty[$key];
                    $purchaseItem->sub_total = $request->sub_total[$key];
                    $purchaseItem->info = $request->info[$key];
                    $purchaseItem->save();
                }else{
                    $purchaseItem = new PurchaseItem;
                    $purchaseItem->category_id = $request->category_id[$key];
                    $purchaseItem->purchase_id = $purchase->id;
                    $purchaseItem->cost = $request->cost[$key];
                    $purchaseItem->qty = $request->qty[$key];
                    $purchaseItem->sub_total = $request->sub_total[$key];
                    $purchaseItem->info = $request->info[$key];
                    $purchaseItem->save();
                    // dd($request->item);
                }
            }
            return redirect()->route('admin.purchase.index')->with('success', 'Purchase Order Created successfully.');
    } catch (Exception $e) {
        return redirect()->route('admin.purchase.index')->with('error', 'Failed to fetch Purchase details: ' . $e->getMessage());
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
            $purchase = Purchase::findOrFail($id);
            $purchase->delete();
            return redirect()->route('admin.purchase.index')->with('success', 'Purchase deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.purchase.index')->with('error', 'Failed to delete Purchase: ' . $e->getMessage());
        }
    }

    public function download($id) {
        // dd($id);
       
        $purchase = Purchase::findOrFail($id);
            $purchaseitems = PurchaseItem::where('purchase_id',$id)->with('category')->get();
            $data = ['purchase' => $purchase, 'purchaseitems' => $purchaseitems];
            
        $pdf = PDF::loadView('admin.purchase.pdf', $data);
        return $pdf->download('admin.purchase.pdf');
    }
}
