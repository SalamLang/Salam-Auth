<?php

namespace App\DataTables\User;

use App\Models\Code;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CodeDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->setRowId('id');
    }

    public function query(Code $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id',auth()->user()->first()->id);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('codes-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ایدی'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    protected function filename(): string
    {
        return 'Codes_'.date('YmdHis');
    }
}
