<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'menu_name',
        'menu_link',
        'menu_icon',
        'create_by',
        'delete_mark',
        'update_by'
    ];


    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_level');
    }

    public function jenisUsers()
    {
        return $this->belongsToMany(JenisUser::class, 'settingmenu', 'menu_id', 'jenisuser_id');
    }
}
