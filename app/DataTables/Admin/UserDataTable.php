<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);

        $dataTable?->addColumn('action', function ($model) {
            $data = 'users';
            $status = 'admin';

            return view('components.action', compact('data', 'model', 'status'));
        })?->addColumn('email_verified_at', function ($model) {
            return view('components.email_verified', compact('model'));
        })?->editColumn('updated_at', function ($query) {
            return $query?->fa_updated_at();
        })?->editColumn('role_id', function ($query) {
            return __($query?->role()->first()->name);
        })?->editColumn('created_at', function ($query) {
            return $query?->fa_created_at();
        });

        //                $column = request('filter_column');
        //                $value = request('filter_value');
        //                if ($column && $value) {
        //                    $dataTable?->filter(function ($query) use ($column, $value) {
        //                        $query?->where($column, 'like', '%'.$value.'%');
        //                    });
        //                }
        return $dataTable;
    }

    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
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
            Column::make('name')->title('نام'),
            Column::make('email')->title('ایمیل'),
            Column::make('email_verified_at')->title('وضعیت تایید'),
            Column::make('role_id')->title('نقش'),
            Column::make('created_at')->title('ایجاد شده در'),
            Column::make('updated_at')->title('اپدیت شده در'),
            Column::make('action')->title('کاربردی'),
        ];
    }

    protected function filename(): string
    {
        return ',Users_'.date('YmdHis');
    }
}
