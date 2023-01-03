<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
  use HasFactory;

  protected $table = "daerah";
  protected $primaryKey = "id_daerah";

  public $incrementing = false;
  protected $keyType = 'string';

  public function kader()
  {
    return $this->belongsTo(Kader::class, 'daerah_id_daerah', 'nik');
  }

  public function cabang()
  {
    return $this->hasMany(Cabang::class);
  }

  public function ranting()
  {
    return $this->hasMany(Ranting::class);
  }
}
