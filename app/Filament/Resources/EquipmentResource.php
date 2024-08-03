<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipmentResource\Pages;
use App\Models\Equipment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class EquipmentResource extends Resource
{
    protected static ?string $model = Equipment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Equipment Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('unit_no')
                                    ->label('Unit No.')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('It is a computer set number pasted on a ComLab table. Leave if inapplicable.'),

                                Forms\Components\TextInput::make('description')
                                    ->label('Description')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('It is a brand name of an item/equipment.'),
                                Forms\Components\TextInput::make('specifications')
                                    ->label('Specifications')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Anything that describes an item/equipment. You may enter its color or size.'),
                                Forms\Components\Select::make('facility_id')
                                    ->label('Facility')
                                    ->relationship('facility', 'name')
                                    ->required(),
                                Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'description')
                                    ->required(),
                                Forms\Components\Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'working' => 'Working',
                                        'for_repair' => 'For Repair',
                                        'for_replacement' => 'For Replacement',
                                        'for_disposal' => 'For Disposal',
                                        'disposed' => 'Disposed',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('date_acquired')
                                    ->label('Date Acquired')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\TextInput::make('supplier')
                                    ->label('Supplier')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\TextInput::make('amount')
                                    ->label('Amount')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\TextInput::make('estimated_life')
                                    ->label('Estimated Life')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\TextInput::make('item_no')
                                    ->label('Item No.')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\TextInput::make('property_no')
                                    ->label('Property No.')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\TextInput::make('control_no')
                                    ->label('Control No.')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\TextInput::make('serial_no')
                                    ->label('Serial No.')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\Select::make('no_of_stocks')
                                    ->label('No. of Stocks')
                                    ->required()
                                    ->options(array_combine(range(1, 1000), range(1, 1000)))
                                    ->default(fn (callable $get) => $get('no_of_stocks') . ' (' . optional($get('stock_unit'))->description . ')'),
                                Forms\Components\Select::make('restocking_point')
                                    ->label('Restocking Point')
                                    ->required()
                                    ->options(array_combine(range(1, 1000), range(1, 1000))),
                                Forms\Components\Select::make('stock_unit')
                                    ->label('Stock Unit')
                                    ->relationship('stockunit', 'description')
                                    ->required(),
                                Forms\Components\TextInput::make('person_liable')
                                    ->label('Person Liable')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Refer to the equipment/item sticker. Leave if inapplicable.'),
                                Forms\Components\TextInput::make('remarks')
                                    ->label('Remarks')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->placeholder('Anything that describes an item/equipment.'),
                            ]),
                    ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('unit_no')
                    ->label('Unit No.')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('specifications')
                    ->label('Specifications')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('facility.name')
                    ->label('Facility')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('category.description')
                    ->label('Category')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('date_acquired')
                    ->label('Date Acquired')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('supplier')
                    ->label('Supplier')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('estimated_life')
                    ->label('Estimated Life')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('item_no')
                    ->label('Item No.')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('property_no')
                    ->label('Property No.')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('control_no')
                    ->label('Control No.')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('serial_no')
                    ->label('Serial No.')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('no_of_stocks')
                    ->label('No. of Stocks')
                    ->formatStateUsing(function ($record) {
                        $description = optional($record->stockunit)->description;
                        return $record->no_of_stocks . ($description ? " ($description)" : '');
                    })
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('restocking_point')
                    ->label('Restocking Point')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('person_liable')
                    ->label('Person Liable')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('remarks')
                    ->label('Remarks')
                    ->formatStateUsing(fn (string $state): string => strip_tags($state))
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                   
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEquipment::route('/'),
            'create' => Pages\CreateEquipment::route('/create'),
            'edit' => Pages\EditEquipment::route('/{record}/edit'),
        ];
    }
}