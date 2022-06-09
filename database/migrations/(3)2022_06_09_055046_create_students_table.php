<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('student_id')->unique();
            $table->string('student_fname');
            $table->string('student_mname');
            $table->string('student_lname');
            $table->string('student_suffix')->nullable();
            $table->string('student_contact');
            $table->boolean('is_active')->default(1);
            $table->date('date_registered');
            $table->uuid('user_id')->nullable(false);
            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
