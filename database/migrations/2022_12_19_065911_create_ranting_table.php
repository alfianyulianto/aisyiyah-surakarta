<?php

use App\Models\Cabang;
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
    Schema::create('ranting', function (Blueprint $table) {
      $table->string('id_ranting')->primary();
      $table->foreignIdFor(Daerah::class);
      $table->foreignIdFor(Cabang::class);
      $table->string('nama_ranting');
      $table->text('alamat_ranting');
      $table->string('sk_pimp_ranting');
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
    Schema::dropIfExists('ranting');
  }
};
