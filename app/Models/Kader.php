<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
  use HasFactory;

  protected $table = "kader";
  protected $primaryKey = "nik";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['nik', 'daerah_id_daerah', 'cabang_id_cabang', 'ranting_id_ranting', 'no_kta', 'no_ktm', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat_asal_ktp', 'alamat_rumah_tinggal', 'status_pernikahan', 'pekerjaan', 'email', 'no_ponsel', 'pendidikan_terakhir', 'foto'];

  public function user()
  {
    return $this->hasOne(User::class);
  }

  public function daerah()
  {
    return $this->belongsTo(Daerah::class, 'daerah_id_daerah', 'id_daerah');
  }

  public function cabang()
  {
    return $this->belongsTo(Cabang::class, 'cabang_id_cabang', 'id_cabang');
  }
  public function ranting()
  {
    return $this->belongsTo(Ranting::class, 'ranting_id_ranting', 'id_ranting');
  }

  public function kader_memiliki_jabatan()
  {
    return $this->hasMany(KaderJabatan::class);
  }

  public function kader_memiliki_ortom()
  {
    return $this->hasMany(KaderOrtom::class);
  }

  public function kader_mimiliki_potensi()
  {
    return $this->hasMany(KaderPotensi::class);
  }

  public function pendidikan_terakhir()
  {
    return $this->belongsTo(PendidikanTerakhir::class, 'pendidikan_terakhir_id_pendidikan_terakhir', 'id_pendidikan_terakhir');
  }
}
