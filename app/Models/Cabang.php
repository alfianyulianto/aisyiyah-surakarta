<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
  use HasFactory;

  protected $table = 'cabang';
  protected $primaryKey = "id_cabang";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_cabang', 'daerah_id_daerah', 'nama_cabang', 'alamat_cabang', 'sk_pimp_cabang'];

  public function kader()
  {
    return $this->hasOne(Kader::class);
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
