<?php

namespace App\DataTables\User;

use App\Models\Code;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CodeDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);

        $dataTable
            ->addColumn('action', function ($model) {
                $data = 'posts';

                return view('components.action', compact('data', 'model'));
            })
            ?->editColumn('created_at', function ($query) {
                return $query?->fa_created_at();
            })?->editColumn('code', function ($query) {
                return mb_substr($query?->code, 0, 25).'.....';
            })?->editColumn('title', function ($query) {
                return mb_substr($query?->title, 0, 25).'.....';
            });

        //        $column = request('filter_column');
        //        $value = request('filter_value');
        //        if ($column && $value) {
        //            $dataTable?->filter(function ($query) use ($column, $value) {
        //                $query?->where($column, 'like', '%'.$value.'%');
        //            });
        //        }

        return $dataTable;
    }

    public function query(Code $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id', auth()->user()->first()->id);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('codes-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ایدی'),
            Column::make('title')->title('عنوان'),
            Column::make('code')->title('کد'),
            Column::make('created_at')->title('ایجاد شده در'),
            Column::make('action')->title('کاربردی'),
        ];
    }

    protected function filename(): string
    {
        return 'Codes_'.date('YmdHis');
    }
}
