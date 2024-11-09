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
    Schema::create('reservation_chambres', function (Blueprint $table) {
        $table->id();
        $table->foreignId('chambre_id')->constrained('chambres')->onDelete('cascade');
        $table->string('nom_client');
        $table->string('email_client');
        $table->string('phone_client');
        $table->date('date_reservation');
        $table->time('heure_reservation');
        $table->integer('nombre_personnes');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_chambres');
    }
};
