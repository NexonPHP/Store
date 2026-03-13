<?php

namespace Database\Seeders;

use App\Models\Theme;
use Exception;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Theme::count() > 0) return;

        $path = config('themes.path').'/nexon-default';

        if (!File::exists($path)) {
            throw new Exception('Default theme missing');
        }

        Theme::create([
            'name' => 'Nexon Default',
            'slug' => 'default',
            'path' => 'nexon-default',
            'is_active' => true,
        ]);
    }
}
