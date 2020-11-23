<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubKategoriGaleri;

class GaleriDesa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "galeri-desa";
    protected $primaryKey = 'id_galeri';

    public function kategoriGaleri() {
        return $this->hasOne(SubKategoriGaleri::class, 'id_sub_kat_galeri', 'kategori_foto_id');
    }
}
