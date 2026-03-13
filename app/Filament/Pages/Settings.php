<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use App\Settings\StoreSettings;
use Money\Currencies\ISOCurrencies;
use NumberFormatter;

class Settings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(StoreSettings $settings)
    {
        $this->form->fill($settings->toArray());
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('store_name')->required(),
            Forms\Components\Textarea::make('store_description'),
            Forms\Components\Toggle::make('maintenance'),
            Forms\Components\Select::make('currency')
            ->options($this->currency())
            ->required()
            ->searchable(),

        ];
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function save(StoreSettings $settings)
    {
        $settings->store_name = $this->data['store_name'];
        $settings->store_description = $this->data['store_description'];
        $settings->maintenance = $this->data['maintenance'];

        $settings->save();

        Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }

    private function currency(): array
    {
        $currencies = new ISOCurrencies();
        $formatter = new NumberFormatter('en', NumberFormatter::CURRENCY);

        $list = [];

        foreach ($currencies as $currency) {
            $code = $currency->getCode();

            $formatter->setTextAttribute(NumberFormatter::CURRENCY_CODE, $code);

            $symbol = $formatter->getSymbol(NumberFormatter::CURRENCY_SYMBOL);

            $list[$code] = "{$code} ({$symbol})";
        }

        return $list;
    }
}
