<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_responses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('response_score')->nullable();
            $table->string('response_status');
            $table->uuid('subjectcontent_id')->nullable(false);
            $table->timestamps();
        });
        Schema::table('subject_responses', function (Blueprint $table) {
            $table->foreign('subjectcontent_id')->references('id')->on('subject_contents');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_responses');
    }
}
