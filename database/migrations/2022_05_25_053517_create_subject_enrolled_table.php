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
            $table->id('subjectenrolled_id');
            $table->text('subject_status');
            $table->timestamps();
        });

        Schema::table('subject_enrolled', function (Blueprint $table) {
            $table->unsignedBigInteger('schoolyear_id')->nullable();
            $table->foreign('schoolyear_id')->references('schoolyear_id')->on('school_year');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');

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
