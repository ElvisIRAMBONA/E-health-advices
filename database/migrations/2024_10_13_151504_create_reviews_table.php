<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
       public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('rating'); // Note
            $table->bigInteger('user_id'); // ID de l'utilisateur
            $table->bigInteger('product_id'); // ID du produit
            $table->text('comment')->nullable(); // Commentaire
            $table->timestamp('datecreere')->useCurrent(); // Date de création
            $table->timestamp('datemodre')->nullable(); // Date de modification (sans default)
            $table->timestamps(); // Crée created_at et updated_at
              // Foreign keys
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};