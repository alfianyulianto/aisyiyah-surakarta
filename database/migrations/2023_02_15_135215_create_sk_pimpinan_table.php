<?php

use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Periode;
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
    Schema::create('sk_pimpinan', function (Blueprint $table) {
      $table->string('id_sk_pimpinan')->primary();
      $table->foreignIdFor(Daerah::class)->nullable();
      $table->foreignIdFor(Cabang::class)->nullable();
      $table->foreignIdFor(Ranting::class)->nullable();
      $table->foreignIdFor(Periode::class)->nullable();
      $table->string('file_sk_pimpinan');
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
    Schema::dropIfExists('sk_pimpinan');
  }
};
