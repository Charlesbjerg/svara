<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->unsignedBigInteger('checklist_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('complete')->default(false);
            $table->timestamps();
            $table->foreign('assigned_user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('checklist_id')->references('id')->on('checklists')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist_items');
    }
}
