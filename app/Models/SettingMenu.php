<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingMenu extends Model
{
    // use HasFactory;

    protected $table = 'settingmenu';

    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class, 'jenisuser_id');
    }

    // Relasi dengan menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
