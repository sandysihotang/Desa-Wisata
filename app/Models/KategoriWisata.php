<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
    use Sortable;
    use HasFactory;
    public $timestamps = false;

    public $sortable = ['nama_kategori'];

    protected $table = "kategori-wisata";
    protected $primaryKey = 'id_kategori';

    public function objekWisata() {
        return $this->belongsTo(ObjekWisata::class, 'kategori_id', 'id_kategori');
    }
}
