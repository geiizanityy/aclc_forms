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
            $table->uuid('id');
            $table->decimal('grade', 5, 2)->nullable();
            $table->string('remarks_status');
            $table->uuid('subjectenrolled_id')->nullable(false);
            $table->uuid('subjectresponse_id')->nullable(false);
            $table->timestamps();
        });
        Schema::table('remarks', function (Blueprint $table) {

            $table->foreign('subjectenrolled_id')->references('id')->on('subject_enrolled');
            $table->foreign('subjectresponse_id')->references('id')->on('subject_responses');

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
