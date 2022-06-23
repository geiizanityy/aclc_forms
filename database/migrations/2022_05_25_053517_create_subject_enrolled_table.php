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
            $table->id();
            $table->uuid('subjectenrolled_id');
            $table->text('subject_status');
            $table->timestamps();
        });

        Schema::table('subject_enrolled', function (Blueprint $table) {

            $table->unsignedBigInteger('schoolyear_id');
            $table->foreign('schoolyear_id')->references('id')->on('school_year');

            $table->unsignedBigInteger('student_id');
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
