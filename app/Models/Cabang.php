<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
  use HasFactory;

  protected $table = "cabang";
  protected $primaryKey = "id_cabang";

  public $incrementing = false;
  protected $keyType = 'string';

  public function kader()
  {
    return $this->belongsTo(Kader::class, 'cabang_id_cabang', 'nik');
  }

  public function daerah()
  {
    return $this->belongsTo(Daerah::class, 'daerah_id_daerah', 'id_daerah');
  }

  public function ranting()
  {
    return $this->hasMany(Ranting::class);
  }
}
