<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaderPotensi extends Model
{
  use HasFactory;

  protected $table = "kader_has_potensi";
  protected $primaryKey = "id_kader_has_potensi";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_kader_has_potensi', 'kader_nik', 'potensi_id_potensi', 'potensi_kader_uraian'];

  public function kader()
  {
    return $this->belongsTo(Kader::class, 'kader_nik', 'nik');
  }

  public function potensi()
  {
    return $this->belongsTo(Potensi::class, 'potensi_id_potensi', 'id_potensi');
  }
}
