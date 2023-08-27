<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ch_FirstName',
        'ch_MiddleName',
        'ch_LastName',
        'birthday',
        'lrn_or_student_id',
        'pr_FirstName',
        'pr_MiddleName',
        'pr_LastName',
        'parent_contact_number',
        'parent_email',
        'parent_relationship',
        'status',
    ];
}
