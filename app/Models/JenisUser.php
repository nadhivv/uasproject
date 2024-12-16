<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    use HasFactory;

    protected $table = 'jenis_user';

    protected $primarykey = 'id';
    protected $fillable = [
        'jenis_user',
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'jenisuser_id');
    }


    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'settingmenu', 'jenisuser_id', 'menu_id')->withTimestamps();;
    }

    public function settingMenus()
    {
        return $this->hasMany(SettingMenu::class, 'jenisuser_id');
    }
}
