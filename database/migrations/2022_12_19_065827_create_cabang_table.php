<?php

use App\Models\Daerah;
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
    Schema::create('cabang', function (Blueprint $table) {
      $table->string('id_cabang')->primary();
      $table->foreignIdFor(Daerah::class);
      $table->string('nama_cabang');
      $table->text('alamat_cabang');
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
    Schema::dropIfExists('cabang');
  }
};
