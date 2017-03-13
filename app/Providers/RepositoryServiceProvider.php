<?php

namespace App\Providers;

use App\Repositories\Db;
use App\Repositories\Contracts;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind(Contracts\StudentRepository::class, Db\StudentRepository::class);
    $this->app->bind(Contracts\InterestRepository::class, Db\InterestRepository::class);
    $this->app->bind(Contracts\UserRepository::class, Db\UserRepository::class);
  }
}
