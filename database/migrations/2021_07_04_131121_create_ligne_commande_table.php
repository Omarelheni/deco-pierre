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
            $table->primary(['commande_id','produit_id']);
            $table->Integer('commande_id')->unsigned();
            $table->Integer('produit_id')->unsigned();
            $table->Integer('quantite');
            $table->timestamps();
            $table->foreign('commande_id')
                ->references('id')
                ->on('commandes');
            $table->foreign('produit_id')
                ->references('id')
                ->on('produits');
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
