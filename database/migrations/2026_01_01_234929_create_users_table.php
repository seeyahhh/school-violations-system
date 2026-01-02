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
        Schema::create('users', function (Blueprint $table) { 
            $table->id(); //pk to hehe, auto increment
            $table->string('first_name');
            $table->string('last_name');
            $table->string('school_id', 15); //school id (faculty/student number sa id)
            $table->string('email')->unique();
            $table->string('password'); 
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
