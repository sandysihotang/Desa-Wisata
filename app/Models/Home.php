<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Home extends Model implements Viewable
{	
	use InteractsWithViews;
    use Sortable;
    use HasFactory;
    
    public $timestamps = false;

    protected $table = "home";
    protected $primaryKey = 'id_home';
}
