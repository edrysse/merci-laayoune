<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationChambre extends Model
{
    use HasFactory;

    // الأعمدة التي يمكن تعبئتها في الحجز
    protected $fillable = ['chambre_id', 'user_id', 'date_debut', 'date_fin', 'status'];

    // العلاقة مع الغرفة
    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'chambre_id');
    }

    // العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
