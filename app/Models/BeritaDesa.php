<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaDesa extends Model
{	
    use Sortable;
    use HasFactory;
    public $timestamps = false;

    public $sortable = ['judul_berita'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "berita-desa";
    protected $primaryKey = 'id_berita';

    public function penulis()
    {
        return $this->hasOne(User::class, 'id_user', 'penulis_id');
    }
}
