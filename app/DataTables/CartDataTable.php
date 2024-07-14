<?php

namespace App\DataTables;

use App\Models\Cart;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CartDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function(Cart $cart) {
                return '<span style="display:flex">
                <a href="cart/' . $cart->id . '/edit" class="flex items-center text-theme-10">
                <div class="icon-wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></div> </a>
                <a href="cart/'. $cart->id .'" class="flex items-center  text-theme-23 mx-2">
                <div class="icon-wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path></svg></div> </a>
                <form action="cart/'.$cart->id.'" method="POST" class="m-0">
                 '.csrf_field().'
                 '.method_field("DELETE").'
                 <button type="submit" class="btn p-0"><div class="icon-wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></div>
                 </button>
                </form>
                 </span>';
            })
            ->addColumn('status' , function(Cart $cart){

                if ($cart->status == 'A') {

                   $response = '<span class="badge rounded-pill bg-success">Active</span>';  // JKDobariya
                }
                else if ($cart->status == 'P') {

                    $response = '<span class="badge rounded-pill bg-primary">Pending</span>';
                }
                else if ($cart->status == 'D') {
                    $response = '<span class="badge rounded-pill bg-danger">Deactive</span>';
                }
                else {
                    $response = "";
                }

                return $response;
        })
        ->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CartDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cart $model)
    {
        return $model->newQuery()->with('user','product')->orderBy('created_at','desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('cartdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy([0, 'asc'])
                    ->buttons(
                        Button::make('create')->text('Add Cart')->className('btn btn-primary bg-theme-111 text-white shadow-md mr-2 p-1'),
                        // Button::make('export')->text('Export')->className('btn btn-primary bg-theme-111 text-white shadow-md mr-2 p-1'),
                        Button::make('reset')->text('Reset')->className('btn btn-primary bg-theme-111 text-white shadow-md mr-2 p-1'),
                        Button::make('reload')->text('Reload')->className('btn btn-primary bg-theme-111 text-white shadow-md mr-2 p-1'),
                        Button::make('print')->text('Print')->className('btn btn-primary bg-theme-111 text-white shadow-md mr-2 p-1'),
                        Button::make('excel')->text('Excel')->className('btn btn-primary bg-theme-111 text-white shadow-md mr-2 p-1'),
                        Button::make('csv')->text('CSV')->className('btn btn-primary bg-theme-111 text-white shadow-md mr-2 p-1'),
                        Button::make('pdf')->text('PDF')->className('btn btn-primary bg-theme-111 text-white shadow-md mr-2 p-1')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id')->title('ID'),
            Column::make('user.firstname')->title('Firstname'),
            Column::make('user.lastname')->title('Lastname'),
            Column::make('product.name')->title('Product'),
            Column::make('quantity')->title('Quantity'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  // ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Cart_' . date('YmdHis');
    }
}
