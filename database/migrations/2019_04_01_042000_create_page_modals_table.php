<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add new table for page modals
        Schema::create('page_modals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['template', 'include'])->default('include');
            $table->string('path');
            $table->mediumText('data');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove Page Modals table
        Schema::dropIfExists('page_modals');
    }
}
