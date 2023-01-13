<?php

use App\Models\Jabatan;
use App\Models\Kader;
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
    Schema::create('kader_jabatan', function (Blueprint $table) {
      $table->string('id_kader_jabatan')->primary();
      $table->foreignIdFor(Kader::class);
      $table->foreignIdFor(Jabatan::class);
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
    Schema::dropIfExists('kader_jabatan');
  }
};
