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
    // تحقق من وجود الجدول 'comments' قبل إنشاءه
    if (!Schema::hasTable('comments')) {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_blog')->constrained('blogs')->onDelete('cascade');
            $table->string('image');
            $table->string('commantaire');
            $table->string('name');
            $table->string('email');
            $table->timestamps();
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
