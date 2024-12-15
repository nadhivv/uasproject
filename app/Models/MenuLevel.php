<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuLevel extends Model
{
    protected $table = 'menu_level';

    protected $fillable = [
        'menu_name',
        'menu_link',
        'menu_icon',
        'parent_id',
        'create_by',
        'delete_mark',
        'update_by'
    ];
    public function menuLevels()
    {
    return $this->belongsTo(MenuLevel::class, 'id_level'); // Berhubungan dengan tabel 'menu_levels'
    }
}
