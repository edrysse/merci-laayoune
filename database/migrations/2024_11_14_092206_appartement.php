<?php

// 2024_11_14_092206_create_appartement_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appartement', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('adresse')->nullable();
            $table->string('ville');
            $table->string('codePostal');
            $table->string('telephone');

            $table->unsignedBigInteger('room_id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appartement');
    }
};
