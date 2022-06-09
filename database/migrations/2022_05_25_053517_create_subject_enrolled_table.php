<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectEnrolledTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_enrolled', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('subject_status');
            $table->unsignedBigInteger('schoolyear_id')->nullable();
            $table->uuid('student_id')->nullable(false);
            $table->timestamps();
        });

        Schema::table('subject_enrolled', function (Blueprint $table) {
            $table->foreign('schoolyear_id')->references('schoolyear_id')->on('school_year');


            $table->foreign('student_id')->references('id')->on('students');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_enrolled');
    }
}
