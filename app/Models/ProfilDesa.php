<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;
    public $timestamps = false;

    public $menu = 'w';

    protected $table = "profil-desa";
    protected $primaryKey = 'id_profil';

    public function getMenu()
	{
	    return "Profil";
	}
}
