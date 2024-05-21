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
        Schema::create('reports', function (Blueprint $table) {

            $table->id();
            $table->string('name_of_offender');
            $table->string('bussines_name');
            $table->string('offernder_location');
            $table->string('complaint');
            $table->string('reporter_name');
            $table->string('is_viewed');
            $table->string('offender_id');
            $table->string('country');
            $table->unsignedBigInteger('user_id');
            $table->string('reporter_phone');
            $table->string('reporter_mail');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('reports', function (Blueprint $table) {
            //
        });
    }
};
