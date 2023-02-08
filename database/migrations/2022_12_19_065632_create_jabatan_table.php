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
      $table->foreignIdFor(Daerah::class)->nullable();
      $table->foreignIdFor(Cabang::class)->nullable();
      $table->foreignIdFor(Ranting::class)->nullable();
      $table->string('nama_jabatan');
      $table->boolean('multiple_kader')->default(false);
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
