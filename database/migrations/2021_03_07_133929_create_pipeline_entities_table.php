<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelineEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipeline_entities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('component_name');
            $table->string('icon_large')->nullable();
            $table->string('icon_small')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pipeline_entities');
    }
}
