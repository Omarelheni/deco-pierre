<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_commande', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('produit_id'); // Foreign key for the 'produit' relation
            $table->unsignedBigInteger('commande_id'); // Foreign key for the 'commande' relation
            $table->decimal('aire', 8, 2); // 'aire' column, assuming it's a decimal type
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade'); // Foreign key constraint for 'produit_id'
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade'); // Foreign key constraint for 'commande_id'
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
        Schema::dropIfExists('ligne_commande');
    }
}
