<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path')->nullable();
            $table->string('contact_number');
            $table->string('contact_email');
            $table->unsignedBigInteger('main_contact_id')->nullable();
            $table->unsignedBigInteger('account_manager_id')->nullable();
            $table->foreign('main_contact_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('account_manager_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
