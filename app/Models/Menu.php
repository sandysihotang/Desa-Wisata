<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Sortable;
    use HasFactory;

    public $sortable = ['nama_menu', 'judul_halaman'];

    protected $table = "menu";
    protected $primaryKey = 'id_menu';
    public $timestamps = false;

    public function subMenu()
    {
        return $this->hasMany(SubMenu::class,'menu_id');
    }
}
