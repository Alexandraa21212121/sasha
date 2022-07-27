<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->integer('code')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->float('price')->nullable();
            $table->integer('availability')->nullable();
            $table->string('brand')->nullable();
            $table->string('image')->nullable();
            $table->text('description');
            $table->boolean('is_new')->nullable();
            $table->boolean('is_recommended')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('products');
    }
}
