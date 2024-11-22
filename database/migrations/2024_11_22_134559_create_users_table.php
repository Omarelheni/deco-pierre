<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('nom'); // 'nom' column for the user's last name
            $table->string('prenom'); // 'prenom' column for the user's first name
            $table->string('email')->unique(); // 'email' column (unique constraint)
            $table->string('password'); // 'password' column for the user's password
            $table->string('image_name')->nullable(); // 'image_name' column for the user's image (nullable)
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->rememberToken(); // 'remember_token' for the "remember me" functionality
            $table->timestamps(); // 'created_at' and 'updated_at' timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
