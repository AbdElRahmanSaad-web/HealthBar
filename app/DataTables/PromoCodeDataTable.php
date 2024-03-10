<?php

namespace App\DataTables;

use App\Models\PromoCode;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PromoCodeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', 'promocode.action')
            // ->setRowId('id');

            ->addColumn('action', function (PromoCode $model) {
                return view('Dashboard.PromoCodes.columns._actions',['model'=>$model,'route_name'=>'admin.promoCodes']);
            })
            ->editColumn('code', function(PromoCode $model){
                return $model->code;
            })
            ->editColumn('discount_percentage', function(PromoCode $model){
                return $model->discount_percentage."%"??'Not Found!';
            })
            ->editColumn('max_uses', function(PromoCode $model){
                return $model->max_uses??'Not Found!';
            })
            ->editColumn('usage_counter', function(PromoCode $model){
                return $model->usage_counter??'Not Found!';
            })
            ->editColumn('valid_from', function(PromoCode $model){
                return Carbon::parse($model->valid_from)->format('Y-m-d')??'Not Found!';
            })
            ->editColumn('valid_to', function(PromoCode $model){
                return Carbon::parse($model->valid_to)->toDateString()??'Not Found!';
            })
            // ->editColumn('promoter_id', function(PromoCode $model){
            //     return $model->promoter->name??'Not Found!';
            // })
    
            // ->editColumn('updated_at', function($data){
            //     return Carbon::parse($data->updated_at)->toDateTimeString();
            // })
            // ->orderBy('updated_at', 'asc')
            ->setRowId('id');
            
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PromoCode $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        // return $this->builder()
                    // ->setTableId('promocode-table')
                    // ->columns($this->getColumns())
                    // ->minifiedAjax()
                    // //->dom('Bfrtip')
                    // ->orderBy(1)
                    // ->selectStyleSingle()
                    // ->buttons([
                    //     Button::make('excel'),
                    //     Button::make('csv'),
                    //     Button::make('pdf'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // ]);
        return $this->builder()
            ->setTableId('promo_codes')
            ->columns($this->getColumns())
            ->minifiedAjax()
//                    ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        // return [
        //     Column::computed('action')
        //           ->exportable(false)
        //           ->printable(false)
        //           ->width(60)
        //           ->addClass('text-center'),
        //     Column::make('id'),
        //     Column::make('add your columns'),
        //     Column::make('created_at'),
        //     Column::make('updated_at'),
        // ];
        return 
        [
            Column::make('id'),
            Column::make('code')->title('Code'),
            Column::make('discount_percentage')->title('Discount percentage'),
            Column::make('max_uses')->title('Max uses'),
            Column::make('usage_counter')->title('Usage'),
            Column::make('valid_from')->title('Valid from'),
            Column::make('valid_to')->title('Valid to'),
            // Column::make('promoter_id')->title('Promoter'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PromoCode_' . date('YmdHis');
    }
}
