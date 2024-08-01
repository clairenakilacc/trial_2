<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacilityResource\Pages;
use App\Filament\Resources\FacilityResource\RelationManagers;
use App\Models\Facility;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;



class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Facility Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder(' Facility name displayed on the door (e.g., CL1,CL2)'),
                                Forms\Components\TextInput::make('connection_type')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Source of internet connectivity utilized in a facility (e.g., WiFi, Ethernet) '),
                                Forms\Components\TextInput::make('facility_type')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('(e.g., Computer Laboratory, Office, Lecture Room)'),
                                Forms\Components\TextInput::make('cooling_tools')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('System used for cooling a facility (e.g., AirCon, Ceiling Fan) '),
                                Forms\Components\TextInput::make('floor_level')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Floor level of a building where facility is located (e.g., 1 for 1st Floor) '),
                                Forms\Components\TextInput::make('building')
                                    ->required()
                                    ->maxLength(255)
                                    ->default('HIRAYA')
                                    ->placeholder('e.g., '),
                            ]),
                    ]),
                Section::make('Facility Image')
                    ->schema([
                        Forms\Components\FileUpload::make('facility_img')
                            ->image()
                            ->label('Facility Image')
                            ->imageEditor()
                            ->disk('public')
                            ->directory('facility'),
                    ]),
                Section::make('Remarks')
                    ->schema([
                        Forms\Components\RichEditor::make('remarks')
                            ->required()
                            ->placeholder('Anything that describes the facility (e.g., Computer lab with space for 30 students)')
                            ->formatStateUsing(fn (?string $state): string => $state ? strip_tags($state) : '')
                            ->disableToolbarButtons([
                                'attachFiles'
                            ])
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('connection_type')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('facility_type')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('cooling_tools')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('floor_level')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('building')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('remarks')
                    ->formatStateUsing(fn (string $state): string => strip_tags($state))
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->searchable()
                    ->sortable()
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
            'index' => Pages\ListFacilities::route('/'),
            'create' => Pages\CreateFacility::route('/create'),
            'edit' => Pages\EditFacility::route('/{record}/edit'),
        ];
    }
}
