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
        Schema::create('comnds', function (Blueprint $table) {
            $table->id();  // سيتم توليد id auto-increment تلقائيًا
            $table->string('nom');  // الاسم يجب أن يكون إلزاميًا
            $table->string('prenom');  // الاسم الثاني يجب أن يكون إلزاميًا
            $table->string('email')->nullable();  // البريد الإلكتروني اختياري
            $table->string('phone');  // رقم الهاتف يجب أن يكون إلزاميًا
            $table->string('adresse');  // العنوان يجب أن يكون إلزاميًا
            $table->string('commande');  // تفاصيل الطلب يجب أن تكون إلزامية
            $table->timestamps();  // سيتم إضافة created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comnds');
    }
};
