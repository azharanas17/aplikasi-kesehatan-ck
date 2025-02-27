<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisLayananResource\Pages;
use App\Filament\Resources\JenisLayananResource\RelationManagers;
use App\Models\JenisLayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisLayananResource extends Resource
{
    protected static ?string $model = JenisLayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3-center-left';
    protected static ?string $navigationLabel = 'Jenis Layanan';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 4;
    protected static ?string $pluralLabel = 'Jenis Layanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Jenis Layanan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('deskripsi')
                    ->label('Deskripsi')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Jenis Layanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
            'index' => Pages\ListJenisLayanans::route('/'),
            'create' => Pages\CreateJenisLayanan::route('/create'),
            'edit' => Pages\EditJenisLayanan::route('/{record}/edit'),
        ];
    }
}
