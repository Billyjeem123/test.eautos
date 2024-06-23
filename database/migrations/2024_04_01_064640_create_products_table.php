<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id'); // Changed column name to 'sub_category_id'
            $table->unsignedBigInteger('brand_id');
            $table->string('model');
            $table->string('color');
            $table->string('address');
            $table->string('is_viewed');
            $table->string('is_featured');

            $table->string('location');
            $table->decimal('price', 10, 2);
            $table->integer('views')->default(0);
            $table->integer('deed');
            $table->integer('car_receipt');
            $table->integer('car_docs');
            $table->string('mileage');
            $table->string('desc');
            $table->string('cylinder')->nullable();
            $table->string('is_installemt');
            $table->integer('is_approved');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');

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
};
