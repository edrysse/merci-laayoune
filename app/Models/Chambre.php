<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

    // اسم الجدول في قاعدة البيانات
    protected $table = 'chambres';

    // الأعمدة المسموح تعبئتها بشكل مباشر
    protected $fillable = [
        'nom',           // اسم الغرفة
        'description',   // وصف الغرفة
        'prix',          // السعر
        'image',         // رابط الصورة
        'disponible',    // حالة التوفر
    ];

    // العلاقة مع جدول `ReservationChambre`
    public function reservations()
    {
        return $this->hasMany(ReservationChambre::class, 'chambre_id');
    }
}
