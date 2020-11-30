<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasDesa extends Model
{
    use Sortable;
    use HasFactory;
    public $timestamps = false;

    public $sortable = ['nama_fasilitas'];

    protected $table = "fasilitas-desa";
    protected $primaryKey = 'id_fasilitas';
}
