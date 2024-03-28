<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', 'order.action')
            ->addColumn('action', function (Order $model) {
                return view('Dashboard.orders.columns._actionsShow',['model'=>$model,'route_name'=>'admin.orders']);
            })

            ->addColumn('id', function(Order $model){
                return $model->id;
            })
            ->addColumn('user_id', function(Order $model){
                return $model->user->name;
            })
            ->addColumn('order_date', function(Order $model){
                return $model->order_date??'Not Found!';
            })
            ->addColumn('status', function(Order $model){
                return $model->status;
            })
            ->addColumn('service_price', function(Order $model){
                return $model->service_price;
            })
            ->addColumn('delivery_price', function(Order $model){
                return $model->delivery_price??'Not Found!';
            })
            ->addColumn('total_price', function(Order $model){
                return $model->total_price??'Not Found!';
            })
            // ->editColumn('valid_from', function(Order $model){
            //     return Carbon::parse($model->valid_from)->format('Y-m-d')??'Not Found!';
            // })
            // ->editColumn('valid_to', function(Order $model){
            //     return Carbon::parse($model->valid_to)->toDateString()??'Not Found!';
            // })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        // return $this->builder()
        //             ->setTableId('order-table')
        //             ->columns($this->getColumns())
        //             ->minifiedAjax()
        //             //->dom('Bfrtip')
        //             ->orderBy(1)
        //             ->selectStyleSingle()
        //             ->buttons([
        //                 Button::make('excel'),
        //                 Button::make('csv'),
        //                 Button::make('pdf'),
        //                 Button::make('print'),
        //                 Button::make('reset'),
        //                 Button::make('reload')
        //             ]);

        return $this->builder()
        ->setTableId('orders')
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
        return 
        [
            Column::make('id'),
            Column::make('user_id')->title('User name'),
            Column::make('order_date')->title('Order date'),
            Column::make('status')->title('Status'),
            Column::make('service_price')->title('Service price'),
            Column::make('delivery_price')->title('Delivery price'),
            Column::make('total_price')->title('Total price'),
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
        return 'Order_' . date('YmdHis');
    }
}
