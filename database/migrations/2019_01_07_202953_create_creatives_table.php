<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creatives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->text('description')->nullable();
            $table->string('type_id')->nullable();
            $table->string('original_image')->nullable();
            $table->float('start_position_x')->nullable();
            $table->float('start_position_y')->nullable();
            $table->string('name')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->text('category_id')->nullable();
            $table->text('aspectRatio')->nullable();
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
        Schema::dropIfExists('creatives');
    }
}
