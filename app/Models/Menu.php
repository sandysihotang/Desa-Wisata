<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menu";
    protected $primaryKey = 'id_menu';
    public $timestamps = false;

    public function subMenu()
    {
        return $this->hasMany(SubMenu::class,'menu_id');
    }
}
