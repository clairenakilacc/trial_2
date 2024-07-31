<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\BorrowResource\Pages;
use App\Filament\User\Resources\BorrowResource\RelationManagers;
use App\Models\Borrow;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class BorrowResource extends Resource
{
    protected static ?string $model = Borrow::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               
                Forms\Components\Select::make('equipment_id')
                    ->relationship('equipment', 'description')
                    ->nullable(),
                Forms\Components\Select::make('facility_id')
                    ->relationship('facility', 'name'),
              
                Forms\Components\TextInput::make('request_form')
                    ->required()
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               
                Tables\Columns\TextColumn::make('equipment_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('facility_id')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('request_form')
                    ->searchable(),
                \EightyNine\Approvals\Tables\Columns\ApprovalStatusColumn::make("approvalStatus.status"),
            ])
            ->filters([
                //
            ])
            ->actions([
                ...\EightyNine\Approvals\Tables\Actions\ApprovalActions::make(
                    // define your action here that will appear once approval is completed
                    Action::make("."),

                ),
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
            'index' => Pages\ListBorrows::route('/'),
            'create' => Pages\CreateBorrow::route('/create'),
            'edit' => Pages\EditBorrow::route('/{record}/edit'),
        ];
    }
}
