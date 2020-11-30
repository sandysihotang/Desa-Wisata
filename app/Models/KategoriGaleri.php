<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubKategoriGaleri;

class KategoriGaleri extends Model
{
    use Sortable;

    use HasFactory;
    public $timestamps = false;

    public $sortable = ['nama_kategori'];

    protected $table = "kategori-galeri";
    protected $primaryKey = 'id_kategori_galeri';

    public function subKategori() {
        return $this->hasMany(SubKategoriGaleri::class, 'id_sub_kat_galeri', 'id_kategori_galeri');
    }
}
