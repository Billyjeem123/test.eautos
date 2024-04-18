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
        Schema::dropIfExists('value_asset_docs');
        Schema::create('value_asset_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('value_asset_id');
            $table->string('type');
            $table->string('file_name');
            $table->foreign('value_asset_id')->references('id')->on('value_asset')->onDelete('cascade');
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
        Schema::dropIfExists('value_asset_docs');
    }
};
