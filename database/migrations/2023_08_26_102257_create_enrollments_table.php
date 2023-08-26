<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('ch_FirstName');
            $table->string('ch_MiddleName');
            $table->string('ch_LastName');
            $table->date('birthday');
            $table->string('lrn_or_student_id')->unique();
            $table->string('pr_FirstName');
            $table->string('pr_MiddleName');
            $table->string('pr_LastName');
            $table->string('parent_contact_number');
            $table->string('parent_email')->unique();
            $table->string('parent_relationship');
            $table->string('status'); // For example: 'pending', 'approved', 'rejected'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
