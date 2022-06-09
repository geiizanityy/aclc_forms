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
            $table->uuid('id')->primary();
            $table->string('teacher_id');
            $table->string('teacher_fname');
            $table->string('teacher_mname');
            $table->string('teacher_lname');
            $table->string('teacher_suffix')->nullable();
            $table->string('teacher_contact');
            $table->boolean('is_active')->default(1);
            $table->date('date_registered');
            $table->uuid('user_id')->nullable(false);
            $table->timestamps();
        });

        Schema::table('teachers', function (Blueprint $table) {
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
