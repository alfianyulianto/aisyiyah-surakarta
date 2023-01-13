<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaderOrtom extends Model
{
  use HasFactory;

  protected $table = "kader_has_ortom";
  protected $primaryKey = "id_kader_has_ortom";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_kader_has_ortom', 'kader_nik', 'ortom_id_ortom', 'ortom_uraian'];

  public function kader()
  {
    return $this->belongsTo(Kader::class, 'kader_nik', 'nik');
  }

  public function ortom()
  {
    return $this->belongsTo(Ortom::class, 'ortom_id_ortom', 'id_ortom');
  }
}
