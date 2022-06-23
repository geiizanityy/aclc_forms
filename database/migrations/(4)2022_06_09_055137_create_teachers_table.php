<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->uuid('teacher_id');
            $table->string('teacher_no');
            $table->string('teacher_fname');
            $table->string('teacher_mname');
            $table->string('teacher_lname');
            $table->string('teacher_suffix')->nullable();
            $table->string('teacher_contact');
            $table->string('position');
            $table->boolean('is_active')->default(1);
            $table->string('access_level');
            $table->date('date_registered');
            $table->timestamps();
        });

        Schema::table('teachers', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('teachers');
    }
}
