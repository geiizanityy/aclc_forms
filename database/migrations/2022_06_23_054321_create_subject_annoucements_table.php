<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectAnnoucementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_annoucements', function (Blueprint $table) {
            $table->id();
            $table->uuid('subjannouncement_id');
            $table->string('announcement_title');
            $table->string('announcement_content');
            $table->date('date_annouced');
            $table->timestamps();
        });

        Schema::table('subject_annoucements', function(Blueprint $table){
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('id')->on('subject_annoucements');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_annoucements');
    }
}
