<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('ch_fullname')->nullable();
            $table->string('pr_fullname')->nullable();
        });

        // Update the new columns with appropriate values
        DB::table('enrollments')->update([
            'ch_fullname' => DB::raw("CONCAT(ch_firstname, ' ', COALESCE(ch_middlename, ''), ' ', ch_lastname)"),
            'pr_fullname' => DB::raw("CONCAT(pr_firstname, ' ', COALESCE(pr_middlename, ''), ' ', pr_lastname)"),
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn('ch_fullname');
            $table->dropColumn('pr_fullname');
        });
    }
};
