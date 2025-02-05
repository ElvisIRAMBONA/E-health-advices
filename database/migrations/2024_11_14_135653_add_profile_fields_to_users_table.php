<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->text('bio')->nullable();
        $table->string('address')->nullable();
        $table->string('profile_picture')->nullable(); // for storing profile picture URLs
    });}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};