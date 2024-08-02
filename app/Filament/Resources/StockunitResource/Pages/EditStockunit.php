<?php

namespace App\Filament\Resources\StockunitResource\Pages;

use App\Filament\Resources\StockunitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStockunit extends EditRecord
{
    protected static string $resource = StockunitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
