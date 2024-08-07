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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
             $table->string('role');
             $table->integer('is_featured')->default(0);
             $table->string('image');
             $table->longText('about');
            $table->string('state');
             $table->integer('is_active');
             $table->string('experience')->nullable(); // Specify that 'experience' column can be nullable
             $table->string('bussiness_name')->nullable(); // Specify that 'experience' column can be nullable

            $table->string('business_state')->nullable(); // Specify that 'experience' column can be nullable
            $table->string('bussiness_location')->nullable(); // Specify that 'experience' column can be nullable
            $table->string('organisation_services')->nullable(); // Specify that 'experience' column can be nullable

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
