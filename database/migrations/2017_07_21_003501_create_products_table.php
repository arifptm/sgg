<?php

use Illuminate\Support\Facades\Schema;
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
            $table->integer('user_id')->unsigned();
            $table->string('title',191);
            $table->string('slug',191);
            $table->timestamp('register_date')->nullable();
            $table->text('body')->nullable();
            $table->string('image', 127)->nullable();
            $table->string('price',15)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('placement', 63)->nullable();
            $table->boolean('disposable')->nullable();
            $table->boolean('verified')->default(9);
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            
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
