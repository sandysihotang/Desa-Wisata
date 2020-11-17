<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriDesa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "galeri-desa";
    protected $primaryKey = 'id_galeri';

    public function kategoriGaleri() {
        return $this->hasOne(KategoriGaleri::class, 'id_kategori_galeri', 'kategori_foto_id');
    }
}
