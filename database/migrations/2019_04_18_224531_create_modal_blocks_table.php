<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add new table for modal blocks
        Schema::create('modal_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modal_id');
            $table->enum('type', ['template', 'include'])->default('include');
            $table->string('path');
            $table->mediumText('data');
            $table->boolean('is_hidden')->default(false);
            $table->boolean('is_minimized')->default(false);
            $table->boolean('is_delete_denied')->default(false);
            $table->integer('cache_ttl')->default(0);
            $table->integer('order')->default(10000);

            $table->index('modal_id');

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
        // Remove Page Blocks table
        Schema::dropIfExists('modal_blocks');
    }
}
