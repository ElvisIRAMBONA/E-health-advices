<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('namep'); // Nom du produit
            $table->text('description')->nullable(); // Description
            $table->decimal('price', 8, 2); // Prix
            $table->bigInteger('category_id'); // ID de la catégorie
            $table->string('image_url')->nullable(); // URL de l'image
            $table->timestamp('dateofcreation')->useCurrent(); // Date de création
            $table->timestamp('datemodif')->nullable(); // Date de modification (sans default)
            $table->timestamps(); // Crée created_at et updated_at
            //foreign key
             $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}