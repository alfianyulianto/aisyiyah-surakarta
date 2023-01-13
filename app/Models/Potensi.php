<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
  use HasFactory;

  protected $table = "potensi";
  protected $primaryKey = "id_potensi";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_potensi', 'potensi'];

  public function potensi_milik_kader()
  {
    return $this->hasMany(KaderPotensi::class);
  }
}
