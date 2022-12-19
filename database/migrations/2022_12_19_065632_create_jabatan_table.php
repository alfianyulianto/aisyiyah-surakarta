<?php

use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Kader;
use App\Models\Ranting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('jabatan', function (Blueprint $table) {
      $table->string('id_jabatan')->primary();
      $table->foreignIdFor(Kader::class);
      $table->foreignIdFor(Daerah::class);
      $table->foreignIdFor(Cabang::class);
      $table->foreignIdFor(Ranting::class);
      $table->string('nama_jabatan');
      $table->string('periode');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('jabatan');
  }
};
