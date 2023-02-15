<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkPimpinan extends Model
{
  use HasFactory;

  protected $table = "sk_pimpinan";
  protected $primaryKey = "id_sk_pimpinan";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_sk_pimpinan', 'daerah_id_daerah', 'cabang_id_cabang', 'ranting_id_ranting', 'periode_id_periode', 'file_sk_pimpinan'];

  public function periode()
  {
    return $this->belongsTo(Periode::class, 'periode_id_periode', 'id_periode');
  }
}
