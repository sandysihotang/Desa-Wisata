<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasWisata extends Model
{
    use Sortable;
    use HasFactory;

    public $timestamps = false;

    public $sortable = ['judul'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "aktivitas-wisata";
    protected $primaryKey = 'aktivitas_id';
    // protected $fillable = [
    //     'nama_wisata',
    //     'deskripsi',
    //     'file_foto',
    //     'kategori_id',
    // ];

    // public function kategoriWisata() {
    //     return $this->hasOne(KategoriWisata::class, 'id_kategori', 'kategori_id');
    // }
}
