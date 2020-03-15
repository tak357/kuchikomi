<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('item_name');
            $table->integer('category_id');
            $table->integer('price');
            $table->integer('kuchikomi_count')->default(0);
            $table->integer('kuchikomi_sum_score')->default(0);
            $table->float('kuchikomi_avg_score')->default(0);
            $table->string('tag')->nullable();
            $table->string('item_image')->default('item_images/no_image.png');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
