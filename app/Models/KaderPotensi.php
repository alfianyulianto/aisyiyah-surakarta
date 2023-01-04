<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaderPotensi extends Model
{
  use HasFactory;

  protected $table = "kader_has_potensi_kader";
  protected $primaryKey = "id_kader_has_potensi_kader";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $guarded = ['id_kader_has_potensi_kader'];

  public function kader()
  {
    return $this->belongsTo(Kader::class, 'kader_nik', 'nik');
  }

  public function potensi()
  {
    return $this->belongsTo(Potensi::class, 'potensi_id_potensi_kader', 'id_potensi_kader');
  }
}
