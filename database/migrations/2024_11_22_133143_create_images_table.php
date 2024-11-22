<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('image_name'); // 'image_name' column
            $table->unsignedBigInteger('produit_id'); // Foreign key for the 'produit' relation
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade'); // Foreign key constraint
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
        Schema::dropIfExists('images');
    }
}
