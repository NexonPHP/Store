<?php

namespace App\Providers;

use App\Themes\ThemeManager;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ThemeManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(ThemeManager $themes): void
    {
        $theme = $themes->active();

        // No DB, no themes, or no active theme → do nothing
        if (!$theme) {
            return;
        }

        // Only now do we override the view system
        View::addNamespace('theme', $themes->viewPath());
        view()->share('themeConfig', $themes->config());
    }
}
