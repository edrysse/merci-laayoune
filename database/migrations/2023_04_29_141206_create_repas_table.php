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
        // تحقق من وجود جدول 'repas'
        if (!Schema::hasTable('repas')) {
            Schema::create('repas', function (Blueprint $table) {
                $table->id();
                $table->string('nom');
                $table->integer('prix');
                $table->string('type');
                $table->string('description');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repas');
    }
};
