<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ExpenseDataTable;
use App\Models\Expense;
use App\Models\Blog;
use Exception;

class ExpenseController extends Controller
{
    function __construct(){
        $this->middleware('permission:expense-list', ['only' => ['index','show']]);
        $this->middleware('permission:expense-create', ['only' => ['create','store']]);
        $this->middleware('permission:expense-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:expense-delete', ['only' => ['destroy']]);
    } 
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExpenseDataTable $dataTable)
    {
        return $dataTable->render('admin.expense.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            // $expense = Expense::where('status', 'A')->get();
            return view('admin.expense.create');
        } catch (\Exception $e) {
            // Log the exception or handle it as necessary
            // Log::error('Error fetching categories: ' . $e->getMessage());
        
            // Optionally, redirect to a different page with an error message
            return redirect()->route('admin.expense.index')->with('error', 'Unable to fetch categories at this time.');
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
                'title' => 'required',
                'amount' => 'required',
            ]);
            $data = $request->all();
            if($request->status == "A"){
                $data['status']= "A";
            }else{
                $data['status'] = "D";
            }
            // dd($blog);
            Expense::create($data);
            return redirect()->route('admin.expense.index')->with('success', 'Expense created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.expense.create')->with('error', 'Failed to create Expense : ' . $e->getMessage());
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
            $expense = Expense::findOrFail($id);
            return view('admin.expense.show', compact('expense'));
        } catch (Exception $e) {
            return redirect()->route('admin.expense.index')->with('error', 'Failed to fetch Expense details: ' . $e->getMessage());
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
            $expense = Expense::findOrFail($id);

            return view('admin.expense.edit', compact('expense'));
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
            $request->validate([
                'title' => 'required',
                'amount' => 'required',
            ]);
            $expense = Expense::findOrFail($id);
            $data = $request->all();
            if($request->status == "A"){
                $data['status']= "A";
            }else{
                $data['status'] = "D";
            }
            $expense->update($data);
            return redirect()->route('admin.expense.index')->with('success', 'Expense updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.expense.edit', $id)->with('error', 'Failed to update Expense: ' . $e->getMessage());
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
        // dd($id);
        try {
            $expense = Expense::findOrFail($id);
            $expense->delete();
            return redirect()->route('admin.expense.index')->with('success', 'Expense deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.expense.index')->with('error', 'Failed to delete Expense: ' . $e->getMessage());
        }
    }
}
