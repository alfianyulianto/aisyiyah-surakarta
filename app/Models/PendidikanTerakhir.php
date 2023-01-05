<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanTerakhir extends Model
{
  use HasFactory;

  protected $table = 'pendidikan_terakhir';
  protected $primaryKey = "id_pendidikan_terakhir";

  public $incrementing = false;
  protected $keyType = 'string';

  public function kader()
  {
    return $this->hasMany(Kader::class);
  }
}
