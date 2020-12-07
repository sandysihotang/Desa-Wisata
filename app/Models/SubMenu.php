<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use Sortable;
    use HasFactory;

    public $sortable = ['nama_submenu', 'judul_halaman'];

    protected $table = "sub-menu";
    protected $primaryKey = 'id_submenu';
    public $timestamps = false;

    public function subSubMenu()
    {
        return $this->hasMany(SubSubMenu::class,'sub_menu_id');
    }
}
