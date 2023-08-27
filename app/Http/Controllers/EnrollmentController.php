<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Auth;


class EnrollmentController extends Controller
{
    public function showEnrollmentForm()
    {
        return view('enrollment_form');
    }
    //This method for storing enrollees information

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ch_FirstName' => 'required|string|max:255',
            'ch_MiddleName' => 'required|string|max:255',
            'ch_LastName' => 'required|string|max:255',
            'birthday' => 'required|date',
            'lrn_or_student_id' => 'required|string|unique:enrollments',
            'pr_FirstName' => 'required|string|max:255',
            'pr_MiddleName' => 'required|string|max:255',
            'pr_LastName' => 'required|string|max:255',
            'parent_contact_number' => 'required|string',
            'parent_email' => 'required|string|email|',
            'parent_relationship' => 'required|string|max:255',
            'status' => 'required|string|in:pending,approved,rejected',
        ]);

        $fullName = "{$request->input('ch_FirstName')} {$request->input('ch_MiddleName')} {$request->input('ch_LastName')}";
        $mailData = [
            'title' => 'EnrollEase ',
            'body' => 'Thank you for enrolling your child. We have received the following details:',
            'childName' => $fullName,
            'childBirthday' => $request->input('birthday'),
            'lrnOrStudentId' => $request->input('lrn_or_student_id'),
            'parentName' => $request->input('pr_FirstName'),
            'parentContactNumber' => $request->input('pr_MiddleName'),
            'parentEmail' => $request->input('pr_LastName'),
            'parentRelationship' => $request->input('parent_relationship')
        ];


        Enrollment::create(array_merge($request->all(), ['status' => 'pending']));
        Alert::success('Success!', 'Enrollment record created successfully! An email will be sent for further instructions.');
        Mail::to($request->input('parent_email'))->send(new NotifyMail($mailData));

        return Auth::check() ? redirect()->route('dashboard') : redirect()->route('home');
    }
}
