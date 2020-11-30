<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PengalamanWisata extends Model
{
    use Sortable;

    use HasFactory;

    public $timestamps = false;


    protected $table = "pengalaman-wisata";
    protected $primaryKey = 'id_pengalaman';

    public $sortable = ['tanggal', 'judul_pengalaman'];

    public function penulis()
    {
        return $this->hasOne(User::class, 'id_user', 'penulis_id');
    }

    public function kategoriWisata()
    {
        return $this->belongsTo('App\Models\ObjekWisata', 'obj_wisata_id');
    }
}
