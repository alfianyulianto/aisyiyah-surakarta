<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUser extends Model
{
  use HasFactory;

  protected $table = "kategori_user";
  protected $primaryKey = "id";

  public $incrementing = false;
  protected $keyType = 'string';

  protected $guarded = ['id'];

  public function user()
  {
    return $this->hasMany(User::class);
  }
}
