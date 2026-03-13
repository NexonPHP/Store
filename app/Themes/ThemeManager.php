<?php

namespace App\Themes;

use App\Models\Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Schema;

class ThemeManager
{
    /**
     * Get the active theme model from DB
     */
    public function active(): ?Theme
    {
        if (!Schema::hasTable('themes')) {
            return null;
        }

        $theme = Theme::where('is_active', 1)->first();

        if (!$theme) {
            return null;
        }

        if (!File::exists(config('themes.path') . $theme->path)) {
            return null;
        }

        return $theme;
    }

    /**
     * Get the active theme slug/folder name
     */
    public function path(): string
    {
        return $this->active()->path;
    }

    /**
     * Full filesystem path to the theme folder
     */
    public function basePath(): string
    {
        return config('themes.path');
    }

    /**
     * Path to theme views
     */
    public function viewPath(): string
    {
        return $this->basePath(). $this->path() . '/views';
    }

    /**
     * Path to theme assets
     */
    public function assetPath(): string
    {
        return $this->basePath() . 'assets';
    }

    /**
     * Read and return theme.json
     */
    public function config(): array
    {
        $file = $this->basePath(). $this->path() . '/theme.json';
        //exit($file);

        if (!File::exists($file)) {
            throw new \Exception("theme.json missing for theme {$this->path()}");
        }

        return Cache::rememberForever("theme_config_{$this->path()}", function () use ($file) {
            return json_decode(File::get($file), true);
        });
    }

    /**
     * Get theme setting from DB (merged with defaults)
     */
    public function setting(string $key, $default = null)
    {
        $settings = $this->active()->settings ?? [];

        return $settings[$key] ?? $default;
    }

    /**
     * Clear all theme cache (call after switching theme)
     */
    public function clearCache(): void
    {
        Cache::forget('active_theme');
        Cache::forget("theme_config_" . $this->path());
    }

    /**
     * Check if a view exists in the active theme
     */
    public function hasView(string $view): bool
    {
        return File::exists($this->viewPath() . '/' . $view . '.blade.php');
    }
}
