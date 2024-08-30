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
        Schema::create('bvn_data', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('bvn')->unique(); // BVN
            $table->string('first_name')->nullable(); // First name
            $table->string('user_id')->nullable(); // First name
            $table->string('last_name')->nullable(); // Last name
            $table->string('middle_name')->nullable(); // Middle name
            $table->string('gender')->nullable(); // Gender
            $table->text('date_of_birth')->nullable(); // Date of birth
            $table->string('phone_number1')->nullable(); // Phone number 1
            $table->string('phone_number2')->nullable(); // Phone number 2
            $table->text('image')->nullable(); // Image (base64 encoded)
            $table->text('customer')->nullable(); // Customer ID (UUID)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bvn_data');
    }
};
