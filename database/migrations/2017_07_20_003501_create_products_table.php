<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 63);
            $table->string('slug', 63);
            $table->timestamp('register_date');
            $table->text('body');
            $table->string('image', 127);
            $table->decimal('price');
            $table->string('url', 127);
            $table->string('placement', 63);
            $table->boolean('disposable');
            $table->integer('stock');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
