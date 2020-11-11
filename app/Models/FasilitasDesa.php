<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasDesa extends Model
{
    use HasFactory;

    protected $table = "fasilitas-desa";
    protected $primaryKey = 'id_fasilitas';
}
