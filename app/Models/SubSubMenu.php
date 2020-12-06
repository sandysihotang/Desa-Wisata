<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubMenu extends Model
{
    use Sortable;
    use HasFactory;

    public $sortable = ['nama_sub_submenu', 'judul_halaman'];

    protected $table = "sub-sub-menu";
    protected $primaryKey = 'id_sub_submenu';
    public $timestamps = false;
}
