<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PengalamanWisata extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $table = "pengalaman-wisata";
    protected $primaryKey = 'id_pengalaman';

    public function penulis()
    {
        return $this->hasOne(User::class, 'id_user', 'penulis_id');
    }
}
