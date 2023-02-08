<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaderJabatan extends Model
{
  use HasFactory;

  protected $table = "kader_jabatan";
  protected $primaryKey = "id_kader_jabatan";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_kader_jabatan', 'kader_nik', 'jabatan_id_jabatan', 'periode_id_periode', 'jabatan_at'];

  public function kader()
  {
    return $this->belongsTo(Kader::class, 'kader_nik', 'nik');
  }

  public function jabatan()
  {
    return $this->belongsTo(Jabatan::class, 'jabatan_id_jabatan', 'id_jabatan');
  }

  public function periode()
  {
    return $this->belongsTo(Periode::class, 'periode_id_periode', 'id_periode');
  }
}
