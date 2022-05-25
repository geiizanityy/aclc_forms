<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarks', function (Blueprint $table) {
            $table->id('remarks_id');
            $table->decimal('grade', 5, 2)->nullable();
            $table->string('remarks_status');
            $table->timestamps();
        });
        Schema::table('remarks', function (Blueprint $table) {
            $table->unsignedBigInteger('subjectenrolled_id')->nullable();
            $table->foreign('subjectenrolled_id')->references('subjectenrolled_id')->on('subject_enrolled');

            $table->unsignedBigInteger('subjectresponse_id')->nullable();
            $table->foreign('subjectresponse_id')->references('subjectresponse_id')->on('subject_responses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remarks');
    }
}
