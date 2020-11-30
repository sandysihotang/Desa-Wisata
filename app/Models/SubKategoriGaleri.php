<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriGaleri;

class SubKategoriGaleri extends Model
{
    use Sortable;
    use HasFactory;

    public $timestamps = false;

    public $sortable = ['judul'];

    protected $table = "sub-kategori-galeri";
    protected $primaryKey = 'id_sub_kat_galeri';

    public function kategoriGaleri() {
        return $this->hasOne(KategoriGaleri::class, 'id_kategori_galeri', 'id_kategori');
    }

    public function listFoto() {
        return $this->hasMany(GaleriDesa::class, 'kategori_foto_id', 'id_sub_kat_galeri');
    }
}
