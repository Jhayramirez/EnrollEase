<?php

namespace App\DataTables;

use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EnrollmentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->setRowId('id')
            ->escapeColumns([])
            ->editColumn('actions', function ($enrollment) {
                $buttons = '<div class="btn-group" role="group">';

                // DELETE button with X icon
                $buttons .= '<button class="btn btn-danger btn-sm delete-btn" data-id="' . $enrollment->id . '"><i class="bi bi-x-lg"></i></button>';

                // Space between icons
                $buttons .= '<div class="mx-2"></div>';

                // APPROVE button with checkmark icon
                $buttons .= '<button class="btn btn-success btn-sm approve-btn" data-id="' . $enrollment->id . '"><i class="bi bi-check-lg"></i></button>';

                $buttons .= '</div>';
                return $buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Enrollment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): QueryBuilder
    {
        $query = Enrollment::query();

        if ($this->columnName && $this->condition) {
            $query->where($this->columnName, $this->condition);
        }

        return $query;
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('enrollment-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('print'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->title('Id'),
            Column::make('ch_fullname')->title('Child Name'),
            Column::make('birthday')->title('Birthday'),
            Column::make('lrn_or_student_id')->title('LRN Number'),
            Column::make('pr_fullname')->title('Parent Name'),
            Column::make('parent_contact_number')->title('Contact Number'),
            Column::make('parent_email')->title('Email'),
            Column::make('parent_relationship')->title('Parent Relationship'),
            Column::make('status')->title('Status'),
            Column::computed('actions')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center')
                ->footer('')

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Enrollment_' . date('YmdHis');
    }
}
