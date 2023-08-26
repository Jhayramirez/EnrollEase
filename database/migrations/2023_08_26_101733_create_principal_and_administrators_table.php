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
        Schema::create('principals_and_administrators', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('MiddleName');
            $table->string('LastName');
            $table->string('email')->unique();
            $table->string('_password');
            $table->string('role'); // You might use roles like 'principal' or 'administrator'
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
        Schema::dropIfExists('principals_and_administrators');
    }
};
