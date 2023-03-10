<?php

use App\Models\Kader;
use App\Models\KategoriUser;
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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Kader::class);
      $table->foreignIdFor(KategoriUser::class)->nullable();
      $table->string('nama');
      $table->string('no_ponsel');
      $table->string('password');
      $table->string('admin_at')->nullable();
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
};
