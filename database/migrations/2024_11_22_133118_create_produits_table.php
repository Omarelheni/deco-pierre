<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('nom'); // 'nom' column for the product name
            $table->integer('quantite'); // 'quantite' column for quantity
            $table->text('description'); // 'description' column for product description
            $table->decimal('prix', 10, 2); // 'prix' column for product price
            $table->string('image_name'); // 'image_name' column for the product image
            $table->string('categorie'); // 'categorie' column for product category
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
