<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatLahir extends Model
{
  use HasFactory;

  protected $table = "tempat_lahir";
  protected $primaryKey = "id_tempat_lahir";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = ['id_tempat_lahir', 'tempat_lahir'];
}
