<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
  use HasFactory;

  protected $table = "pekerjaan";
  protected $primaryKey = "id_pekerjaan";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $guarded = ['id_pekerjaan'];
}
