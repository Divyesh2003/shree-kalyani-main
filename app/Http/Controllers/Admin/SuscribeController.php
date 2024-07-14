<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suscribe;
use App\Http\Requests\StoreSuscribeRequest;
use App\Http\Requests\UpdateSuscribeRequest;
use Illuminate\Http\Request;
use App\DataTables\SuscribeDataTable;
class SuscribeController extends Controller
{
    function __construct(){
        $this->middleware('permission:suscribe-list', ['only' => ['index','show']]);
        $this->middleware('permission:suscribe-create', ['only' => ['create','store']]);
        $this->middleware('permission:suscribe-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:suscribe-delete', ['only' => ['destroy']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SuscribeDataTable $dataTable)
    {
        // dd("hello");
        try {
            return $dataTable->render('admin.setting.suscribe.index');
        } catch (\Exception $e) {
            // Log the exception or handle it accordingly
            return redirect()->back()->with('error', 'An error occurred while rendering the DataTable.');
        }
    }
}
