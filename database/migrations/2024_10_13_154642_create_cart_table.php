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
        Schema::create('cart', function (Blueprint $table) {
            $table->id(); // ID du panier
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Référence à la table users
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Référence à la table products
            $table->integer('quantity')->notNull(); // Quantité du produit
            $table->timestamp('datecreated')->useCurrent(); // Date de création
            $table->timestamp('dateupdate')->nullable()->useCurrent(); // Date de mise à jour
            $table->timestamps(); // Crée created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};