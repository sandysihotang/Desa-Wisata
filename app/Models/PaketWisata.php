<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "paket-wisata";
    protected $primaryKey = 'id_pkt_wisata';
}
