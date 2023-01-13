<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranting extends Model
{
  use HasFactory;

  protected $table = "ranting";
  protected $primaryKey = "id_ranting";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_ranting', 'daerah_id_daerah', 'cabang_id_cabang', 'nama_ranting', 'alamat_ranting', 'sk_pimp_ranting'];

  public function kader()
  {
    return $this->belongsTo(Kader::class, 'ranting_id_ranting', 'nik');
  }

  public function daerah()
  {
    return $this->belongsTo(Daerah::class, 'daerah_id_daerah', 'id_daerah');
  }

  public function cabang()
  {
    return $this->belongsTo(Cabang::class, 'cabang_id_cabang', 'id_cabang');
  }
}
