<?php

namespace App\Http\Controllers;

use App\DataTables\EnrollmentDataTable;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Mail\NotifyRecord;
use Illuminate\Support\Facades\Auth;

class DataManagement extends Controller
{
    public function index(EnrollmentDataTable $dataTable)
    {

        // where("dynamic column","dynamic condition")
        $dataTable->columnName = 'status'; // column name
        $dataTable->condition = 'pending'; // Condition
        return $dataTable->render('dashboard');
    }

    public function update(Request $request, $id, string $status)
    {

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->status = $status;
        $mailData = [
            'title' => 'EnrollEase ',
            'body' => "Thank you for enrolling your child. Here's your detail",
            'childName' => $enrollment->ch_fullname,
            'childBirthday' => $enrollment->birthday,
            'lrnOrStudentId' => $enrollment->lrn_or_student_id,
            'parentName' => $enrollment->pr_fullname,
            'parentContactNumber' => $enrollment->parent_contact_number,
            'parentEmail' => $enrollment->parent_email,
            'parentRelationship' => $enrollment->parent_relationship,
        ];

        $enrollment->save();
        Mail::to($enrollment->parent_email)->send(new NotifyRecord($mailData, $status));
        return response()->json(['success' => true, 'message' => 'Enrollment List Updated Successfully!']);
    }

    // Archive Records
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
