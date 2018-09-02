<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Pengaduan;
use App\Jobfair;
use App\Lowker;
use App\Lamaran;
use Actuallymab\LaravelComment\CanComment;

class User extends Authenticatable
{
    use Notifiable;
    use CanComment;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','no_ktp', 'alamat', 'role', 'foto', 'no_hp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kontaks()
    {
      return $this->hasMany(Pengaduan::class);
    }

    public function jobfairs()
    {
      return $this->hasMany(Jobfair::class);
    }

    public function lowkers()
    {
      return $this->hasMany(Lowker::class);
    }

    public function lamarans()
    {
      return $this->hasMany(Lamaran::class);
    }
}
