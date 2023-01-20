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

  protected $fillable = ['id_daerah', 'nama_daerah', 'alamat_daerah', 'sk_pimp_daerah'];

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
