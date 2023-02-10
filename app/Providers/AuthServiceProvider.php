<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */
  protected $policies = [
    // 'App\Models\Model' => 'App\Policies\ModelPolicy',
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();
    // membuat gates dengan nama Kader
    Gate::define('kader', function (User $user) {
      // dd(Auth::user()->kategori_user_id);
      return $user->kategori_user_id == 1;
    });

    // membuat gates dengan nama Admin
    Gate::define('admin', function (User $user) {
      // dd(Auth::user()->kategori_user_id);
      return $user->kategori_user_id == 2;
    });

    // membuat gates dengan nama Admin Daerah
    Gate::define('admin-daerah', function (User $user) {
      // dd(Auth::user()->kategori_user_id);
      return $user->kategori_user_id == 3;
    });

    // membuat gates dengan nama Admin Cabang
    Gate::define('admin-cabang', function (User $user) {
      // dd(Auth::user()->kategori_user_id);
      return $user->kategori_user_id == 4;
    });

    // membuat gates dengan nama Admin Ranting
    Gate::define('admin-ranting', function (User $user) {
      // dd(Auth::user()->kategori_user_id);
      return $user->kategori_user_id == 5;
    });
  }
}
