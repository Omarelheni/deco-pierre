<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('nom'); // 'nom' column
            $table->string('prenom'); // 'prenom' column
            $table->decimal('prix', 8, 2); // 'prix' column, assuming it is a decimal
            $table->string('adresse'); // 'adresse' column
            $table->string('telephone'); // 'telephone' column
            $table->string('email'); // 'email' column
            $table->string('statue'); // 'statue' column
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
        Schema::dropIfExists('commandes');
    }
}
