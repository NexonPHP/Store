<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class StoreSettings extends Settings
{
    public string $store_name;
    public string $store_description;
    public string $currency;
    public string $support_email;
    public bool $maintenance;


    public static function group(): string
    {
        return 'general';
    }
}
