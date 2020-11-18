<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaketWisata;

class PemesananPaket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "pemesanan-paket";
    protected $primaryKey = 'id_pemesanan';

    public function paketWisata() {
        return $this->hasOne(PaketWisata::class, 'id_pkt_wisata', 'pkt_wisata_id');
    }
}
