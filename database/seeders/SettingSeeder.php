<?php

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [

            ['key' => 'store_name', 'value' => 'Nexon'],
            ['key' => 'store_logo', 'value' => null],
            ['key' => 'contact_email', 'value' => ''],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
