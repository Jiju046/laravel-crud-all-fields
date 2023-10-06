<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\Student;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class StudentsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
        ->eloquent($query)
        ->editColumn('appointment', function($data){
            return Carbon::parse($data->appointment)->format('d-m-Y');
        })
        ->editColumn('city.city_name', function ($data) { //take records from second table
            return @$data->city->city_name;
        })
        ->addColumn('action', function ($data) { //non db columns
            return '
                <div class="btn-group">
                    <a href="' . route('students.show', $data->id) . '"><img src="' . asset('icons/eye.png') . '" width="32"></a>
                    <a href="' . route('students.edit', $data->id) . '" class="edit-btn mx-2" data-id="' . $data->id . '"><img src="' . asset('icons/pen.png') . '" width="25"></a>
                    <button type="button" class="delete-btn border-0" style="background-color:white" data-id="' . $data->id . '" onclick="deleteBook(this)"><img src="' . asset('icons/delete.png') . '" width="25"></button>
                </div>
            ';
        })
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Student $model): QueryBuilder
    {
        return  $model->newQuery()
                        ->with('city') // Eager load the 'city' relationship
                        ->select('students.*');
       
    }

    /**
     *to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters([ //additional config
                        'dom'          => 'Blfrtip',
                        'buttons'      => ['export'],
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            'id',
            'name',
            'email',
            'skills',
            'gender',
            'appointment',
            'address',
            Column::make('city.city_name')->title('City'),
            Column::make('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Students_' . date('YmdHis');
    }
}