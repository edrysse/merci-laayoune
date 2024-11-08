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
        // تحقق من وجود العمود 'image' في جدول 'repas' قبل إضافته
        Schema::table('repas', function (Blueprint $table) {
            if (!Schema::hasColumn('repas', 'image')) {
                $table->string('image');
            }
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repas', function (Blueprint $table) {
            //
        });
    }
};
