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

  protected $guarded = ['id_jabatan'];

  public function kader()
  {
    return $this->belongsTo(Kader::class, 'nik');
  }

  public function jabatan_milik_kader()
  {
    return $this->hasMany(KaderJabatan::class);
  }
}
