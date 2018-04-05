<?php
/**
 * Created by PhpStorm.
 * User: alexsandro
 * Date: 04.12.17
 * Time: 14:00
 */
namespace Leader\FormFeedback;

use Illuminate\Support\ServiceProvider as LeaderServiceProvider;

class FormFeedbackServiceProvider extends LeaderServiceProvider {
  public function boot() {
    $this->publishes([__DIR__.'/../resources/js/components'=>resource_path('assets/js/components')]);
    $this->loadRoutesFrom(__DIR__.'/routes.php');
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    $this->loadViewsFrom(__DIR__.'/../views', 'form-feedback');
    //$this->publishes([__DIR__.'/../views' => resource_path('views/vendor/form-feedback')]);
    //$this->publishes([__DIR__.'/Middleware' => resource_path('app/Http/Middleware')]);
  }

  public function register() {
  }
}