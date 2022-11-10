<?php

namespace App\DataTables;

use App\Models\Title;
use App\Models\Titles;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TitlesDataTable extends DataTable
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
        ->addColumn('action','titles.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TitlesDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Title $model)
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
                    ->setTableId('titles-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    //->orderBy(1)
                    ->buttons(
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf')


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
            'id',
            'program',
            'title',
            'description',
            'adviser',
            'year',
            'themes'

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Titles_' . date('YmdHis');
    }
}
