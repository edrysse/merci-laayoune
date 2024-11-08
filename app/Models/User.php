<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // العلاقة مع الحجز (reservations)
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'id_user');
    }

    // العلاقة مع جهات الاتصال (contacts)
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'id_user');
    }

    // العلاقة مع المدونات (blogs)
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'id_user');
    }

    // العلاقة مع الملف الشخصي (profile)
    public function profile(): HasOne
    {
        return $this->hasOne(Profil::class, 'id_user');
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
