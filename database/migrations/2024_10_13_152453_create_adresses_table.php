<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { 
         Schema::create('adresses', function (Blueprint $table) {
            $table->id();  // Primary key (auto-increment)
            $table->unsignedBigInteger('user_id'); // Define user_id as a column
            $table->string('city');  // Column for city name
            $table->string('state')->nullable();  // Column for state (optional)
            $table->string('country');  // Column for country name
            $table->timestamps();  // Laravel's default created_at and updated_at fields

              // Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};