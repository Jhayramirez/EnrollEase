<?php

namespace App\Http\Controllers;

use App\DataTables\EnrollmentDataTable;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use DataTables;

class DataManagement extends Controller
{
    public function index(EnrollmentDataTable $dataTable)
    {

        // where("dynamic column","dynamic condition")
        $dataTable->columnName = 'status'; // column name
        $dataTable->condition = 'pending'; // Condition
        return $dataTable->render('dashboard');
    }
    public function showApprovedRecords(EnrollmentDataTable $dataTable)
    {
        $dataTable->columnName = 'status';
        $dataTable->condition = 'approved';
        return $dataTable->render('records.record_management');
    }
    public function showRejectRecords(EnrollmentDataTable $dataTable)
    {
        $dataTable->columnName = 'status';
        $dataTable->condition = 'reject';
        return $dataTable->render('records.record_management');
    }
    public function showAllRecords(EnrollmentDataTable $dataTable)
    {
        return $dataTable->render('records.record_management');
    }
}
