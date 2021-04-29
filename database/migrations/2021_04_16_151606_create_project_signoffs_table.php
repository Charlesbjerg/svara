<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSignoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_signoffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pipeline_entity_id');
            $table->string('name');
            $table->text('message')->nullable();
            $table->text('signature')->nullable();
            $table->timestamp('signoff_timestamp')->nullable();
            $table->foreign('pipeline_entity_id')->references('id')->on('project_pipelines_to_entities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_signoffs');
    }
}
