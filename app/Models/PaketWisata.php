<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
	use Sortable;
    use HasFactory;

    public $sortable = ['nama_paket', 'harga_paket'];

    public $timestamps = false;

    protected $table = "paket-wisata";
    protected $primaryKey = 'id_pkt_wisata';
}
