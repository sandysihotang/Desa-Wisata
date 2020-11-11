<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriDesa extends Model
{
    use HasFactory;

    protected $table = "galeri-desa";
    protected $primaryKey = 'id_galeri';
}
