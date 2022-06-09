<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("subject_code");
            $table->text("subject_description");
            $table->text("course");
            $table->text("banner");
            $table->uuid('teacher_id')->nullable(false);
            $table->timestamps();
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('teachers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
