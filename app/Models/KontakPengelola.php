<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakPengelola extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "kontak-pengelola";
    protected $primaryKey = 'id_kontak';
}
