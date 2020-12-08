<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Sortable;

    use HasFactory, Notifiable;


    public $sortable = ['nama_lengkap'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $primaryKey = 'id_user';
    protected $rememberTokenName = false;
    protected $table = 'user';
    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'username',
        'role_id',
        'isActive',
        'active_on',
        'logout_on'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function penulis()
    {
        return $this->belongsTo(App\MOdels\PengalamanWisata::class);
    }
}
