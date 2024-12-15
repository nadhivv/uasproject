<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'jenisuser_id',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Belongs to penginapan
    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class);
    }
    public function users()
{
    return $this->hasMany(User::class, 'jenisuser_id');
}

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'settingmenu', 'jenisuser_id', 'menu_id');
    }

    public function jenisusers()
    {
        return $this->belongsTo(JenisUser::class, 'jenisuser_id');
    }
}
