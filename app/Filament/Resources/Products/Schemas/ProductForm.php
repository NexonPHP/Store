<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                RichEditor::make('description')
                    ->columnSpanFull(),
                TextInput::make('category_id')
                    ->numeric(),
                Toggle::make('is_subscription')
                    ->required(),
                TextInput::make('duration_days')
                    ->numeric(),
                Toggle::make('is_active')
                    ->required(),
                FileUpload::make('image_url')
                    ->image()
                    ->multiple(),
            ]);
    }
}
