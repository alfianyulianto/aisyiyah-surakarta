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

  public function daerah()
  {
    return $this->hasOne(Daerah::class);
  }

  public function cabang()
  {
    return $this->hasOne(Cabang::class);
  }
  public function ranting()
  {
    return $this->hasOne(Ranting::class);
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
}
