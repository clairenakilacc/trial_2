<?php

namespace App\Filament\AdminUser\Resources\StockunitResource\Pages;

use App\Filament\AdminUser\Resources\StockunitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStockunits extends ListRecords
{
    protected static string $resource = StockunitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
