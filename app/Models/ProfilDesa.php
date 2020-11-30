<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use Sortable;

    use HasFactory;
    public $timestamps = false;

    public $sortable = ['nama_profil'];

    public $menu = 'w';

    protected $table = "profil-desa";
    protected $primaryKey = 'id_profil';

    public function getMenu()
	{
	    return "Profil";
	}
}
