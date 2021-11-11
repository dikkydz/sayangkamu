<?php

namespace App\DataTables;

use App\Data;
use App\Exports\DatasExport;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DataDataTable extends DataTable
{
    protected $exportClass = DatasExport::class;
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
            ->editColumn('created_at', function (Data $data) {
                return $data->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at', function (Data $data) {
                return $data->updated_at->format('d/m/Y');
            })
            ->addColumn('photo', function (Data $data) {
                return '<a href="' . config('app.url') . $data->getFirstMediaUrl('photo') . '" target="_blank" >Lihat</a>';
            })
            ->addColumn('action', 'app.datas._action')
            ->rawColumns(['action', 'photo']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\DataDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Data $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('datas-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('registration_number'),
            Column::make('author'),
            Column::make('address'),
            Column::make('model'),
            Column::make('type'),
            Column::make('production_year'),
            Column::make('silinder'),
            Column::make('chassis_number'),
            Column::make('engine_number'),
            Column::make('bpkb_number'),
            Column::make('service_type'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('photo'),
            Column::computed('action')
                ->exportable(true)
                ->printable(true)
                ->width(130)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Data_' . date('YmdHis');
    }
}
