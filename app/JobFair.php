<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Actuallymab\LaravelComment\Commentable;

class JobFair extends Model
{
  protected $fillable = [
      'user_id', 'judul', 'isi','foto',
      'alamat', 'tglmulai', 'tglselesai','htm', 'status'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
