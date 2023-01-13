<?php

use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\KaderOrtom;
use App\Models\KaderPotensi;
use App\Models\PendidikanTerakhir;
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
    Schema::create('kader', function (Blueprint $table) {
      $table->string('nik')->primary();
      $table->foreignIdFor(Daerah::class);
      $table->foreignIdFor(Cabang::class);
      $table->foreignIdFor(Ranting::class);
      $table->foreignIdFor(KaderOrtom::class)->default('-');
      $table->foreignIdFor(KaderPotensi::class)->default('-');
      $table->foreignIdFor(PendidikanTerakhir::class)->default('-');
      $table->string('no_kta')->nullable();
      $table->string('no_ktm')->nullable();
      $table->string('nama');
      $table->string('tempat_lahir')->default('-');
      $table->string('tanggal_lahir')->default('-');
      $table->text('alamat_asal_ktp')->default('-');
      $table->text('alamat_rumah_tinggal')->default('-');
      $table->string('status_pernikahan')->default('-');
      $table->string('pekerjaan')->default('-');
      $table->string('email')->default('-');
      $table->string('no_ponsel');
      // $table->string('pendidikan_terakhir');
      $table->string('foto')->default('avatar-3.png');
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
    Schema::dropIfExists('kader');
  }
};
