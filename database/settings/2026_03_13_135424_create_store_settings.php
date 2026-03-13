<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.store_name', 'Nexon');
        $this->migrator->add('general.store_description', 'Nexon is an all in one store solution for selling your in-game digital items to your playerbase.');
        $this->migrator->add('general.maintenance', false);
        $this->migrator->add('general.currency', 'USD');
        $this->migrator->add('general.support_email', 'support@store.com');
    }
};
