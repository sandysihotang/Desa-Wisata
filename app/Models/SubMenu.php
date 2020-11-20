<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $table = "sub-menu";
    protected $primaryKey = 'id_submenu';
    public $timestamps = false;
}
