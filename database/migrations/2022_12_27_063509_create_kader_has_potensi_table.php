<?php

use App\Models\Kader;
use App\Models\Potensi;
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
    Schema::create('kader_has_potensi', function (Blueprint $table) {
      $table->string('id_kader_has_potensi')->primary();
      $table->foreignIdFor(Kader::class);
      $table->foreignIdFor(Potensi::class);
      $table->text('potensi_kader_uraian');
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
    Schema::dropIfExists('kader_has_potensi');
  }
};
