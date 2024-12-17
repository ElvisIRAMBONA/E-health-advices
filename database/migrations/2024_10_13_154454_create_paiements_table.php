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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            // Define foreign key for order_id
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // This line creates the foreign key
            $table->decimal('amount', 8, 2);
            $table->string('payment_method'); // e.g., 'credit_card', 'paypal'
            $table->text('payment_method_details')->nullable(); // JSON or text for additional details
            $table->timestamp('paid_at')->nullable();
            $table->string('payment_status')->default('pending'); // e.g., 'pending', 'completed', 'failed'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};