<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_contents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('topic_no');
            $table->string('topic_desc');
            $table->text('topic_slug');
            $table->longtext('topic_content');
            $table->string('topic_status');
            $table->text('topic_type');
            $table->uuid('subject_id')->nullable(false);
            $table->timestamps();
        });

        Schema::table('subject_contents', function (Blueprint $table) {
            $table->foreign('subject_id')->references('id')->on('subjects');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_content');
    }
}
