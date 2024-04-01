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
        Schema::create('glasac', function (Blueprint $table) {
            $table->id();
            $table->string('ime_prezime'); 
            $table->string('email')->unique(); 
            $table->char('jmbg', 13); 
            $table->string('adresa'); 
            $table->string('poverenistvo'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glasac');
    }
};
