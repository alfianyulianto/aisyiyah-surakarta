<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
  use HasFactory;

  protected $table = "potensi_kader";
  protected $primaryKey = "id_potensi_kader";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $guarded = ['id_potensi_kader'];

  public function potensi_milik_kader()
  {
    return $this->hasMany(KaderPotensi::class);
  }
}
