<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
  use HasFactory;

  protected $table = "periode";
  protected $primaryKey = "id_periode";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_periode', 'periode'];

  public function jabatan_memiliki_periode()
  {
    return $this->hasMany(KaderJabatan::class);
  }

  public function sk_pimpinan()
  {
    return $this->hasMany(SkPimpinan::class);
  }
}
