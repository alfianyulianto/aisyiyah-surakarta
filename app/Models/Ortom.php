<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortom extends Model
{
  use HasFactory;

  protected $table = "ortom";
  protected $primaryKey = "id_ortom";

  public $incrementing = false;
  protected $keyType = 'string';

  public function ortom_milik_kader()
  {
    return $this->hasOne(KaderOrtom::class);
  }
}
