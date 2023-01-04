<?php

use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\KaderOrtom;
use App\Models\KaderPotensi;
use App\Models\Ranting;
use App\Models\User;
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
      $table->foreignIdFor(Daerah::class)->default(false);
      $table->foreignIdFor(Cabang::class)->default(false);
      $table->foreignIdFor(Ranting::class)->default(false);
      $table->foreignIdFor(User::class);
      $table->foreignIdFor(KaderOrtom::class)->default(false);
      $table->foreignIdFor(KaderPotensi::class)->default(false);
      $table->string('no_kta');
      $table->string('no_ktm');
      $table->string('nama');
      $table->string('tempat_lahir');
      $table->string('tanggal_lahir');
      $table->text('alamat_asal_ktp');
      $table->text('alamat_rumah_tinggal');
      $table->string('status_pernikahan');
      $table->string('pekerjaan');
      $table->string('email');
      $table->string('no_ponsel');
      $table->string('pendidikan_terakhir');
      $table->string('foto');
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
