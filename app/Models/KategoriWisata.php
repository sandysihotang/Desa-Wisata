<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
    use HasFactory;

    protected $table = "kategori-wisata";
    protected $primaryKey = 'id_kategori';

    public function objekWisata() {
        return $this->hasMany(ObjekWisata::class);
    }
}
