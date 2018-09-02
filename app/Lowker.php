<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\TipePekerjaan;
use App\TipeBerkas;
use Actuallymab\LaravelComment\Commentable;

class Lowker extends Model
{
  use Commentable;

  protected $canBeRated = true;
  protected $mustBeApproved = false;

  protected $fillable = [
      'user_id', 'tipeberkas_id', 'tipepekerjaan_id','judul',
      'isi', 'namaperusahaan', 'alamatperusahaan',
      'email_perusahaan', 'no_hp_perusahaan','penempatan',
      'bagian', 'suratlamaran', 'cv','ktp',
      'ijazah', 'transkripnilai', 'pasfoto','skck',
      'suratketerangandokter', 'penutupan', 'status'
  ];

  public function getJenisPekerjaan()
  {
    return TipePekerjaan::where('id', $this->tipepekerjaan_id)->first()->nama;
  }

  public function getJenisBerkas()
  {
    return TipeBerkas::where('id', $this->tipeberkas_id)->first()->nama;
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
