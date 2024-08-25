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
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming each verification is linked to a user
            $table->string('full_name');
            $table->string('nin')->nullable(); // National Identity Number
            $table->string('tin')->nullable(); // Tax Identification Number
            $table->string('business_reg')->nullable(); // Business Registration Number
            $table->string('nin_document')->nullable(); // Path to the uploaded NIN document
            $table->string('tin_document')->nullable(); // Path to the uploaded TIN document
            $table->string('business_certificate')->nullable(); // Path to the uploaded business certificate
            $table->text('description')->nullable(); // Optional additional information
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Verification status
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifications');
    }
};
