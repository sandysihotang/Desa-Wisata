<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "objek-wisata";
    protected $primaryKey = 'id_obj_wisata';
    // protected $fillable = [
    //     'nama_wisata',
    //     'deskripsi',
    //     'file_foto',
    //     'kategori_id',
    // ];

    public function kategoriWisata() {
        return $this->hasOne(KategoriWisata::class, 'id_kategori', 'kategori_id');
    }
}
