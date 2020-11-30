<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakPengelola extends Model
{
    use Sortable;
    use HasFactory;
    public $timestamps = false;

    public $sortable = ['nama', 'email', 'posisi'];

    protected $table = "kontak-pengelola";
    protected $primaryKey = 'id_kontak';
}
