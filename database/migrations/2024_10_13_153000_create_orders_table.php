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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID de la commande
            $table->decimal('total_price', 8, 2); // Prix total
            $table->string('status'); // Statut de la commande
            $table->timestamp('datecreeord')->useCurrent(); // Date de création
            $table->timestamp('datemodifieord')->nullable()->useCurrent(); // Date de modification (avec valeur par défaut à la date actuelle)
            $table->timestamps(); // Crée created_at et updated_at
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key referencing the users table
        });
        Schema::table('orders', function (Blueprint $table) {
    $table->decimal('total', 10, 2)->nullable();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};