<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  use HasFactory;

  protected $table = "jabatan";
  protected $primaryKey = "id_jabatan";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_jabatan', 'daerah_id_daerah', 'cabang_id_cabang', 'ranting_id_ranting', 'nama_jabatan'];

  public function jabatan_milik_kader()
  {
    return $this->hasMany(KaderJabatan::class);
  }
}
