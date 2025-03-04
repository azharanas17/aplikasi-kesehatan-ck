<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RelawanResource\Pages;
use App\Filament\Resources\RelawanResource\RelationManagers;
use App\Models\Relawan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;

class RelawanResource extends Resource
{
    protected static ?string $model = Relawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'Relawan';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 2;
    protected static ?string $pluralLabel = 'Relawan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nik_relawan')
                    ->label('Relawan')
                    ->relationship('relawan', 'nik')
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set, Get $get) {
                        $nikRelawan = $get('nik_relawan');
                        $user = \App\Models\User::where('nik', $nikRelawan)->first(); 
                        $set('no_anggota', 'R-' . $user->id+10000);
                    })
                    ->required(),
                Forms\Components\TextInput::make('jabatan')
                    ->label('Jabatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Hidden::make('no_anggota')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik_relawan')
                    ->label('NIK Relawan')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('relawan.name')
                    ->label('Nama Relawan')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_anggota')
                    ->label('No. Anggota')
                    ->sortable()
                    ->toggleable()
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
            // ->query(function (Builder $query, array $data): Builder {
            //     return $query;
            //         // ->when(
            //         //     $data['class_id'],
            //         //     fn(Builder $query, $record): Builder => $query->where('class_id', $record),
            //         // )
            //         // ->when(
            //         //     $data['section_id'],
            //         //     fn(Builder $query, $record): Builder => $query->where('section_id', $record),
            //         // );
            // })
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Action::make('qr-code')
                    ->label('QR-Code')
                    ->icon('heroicon-o-qr-code')
                    ->url(fn(Relawan $record): string => static::getUrl('qr-code', ['record' => $record])),

                Action::make('kartu-anggota')
                    ->label('Kartu Anggota')
                    ->icon('heroicon-o-identification')
                    ->url(fn(Relawan $record): string => static::getUrl('kartu-anggota', ['id' => $record->id])),
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
            'index' => Pages\ListRelawans::route('/'),
            'create' => Pages\CreateRelawan::route('/create'),
            'edit' => Pages\EditRelawan::route('/{record}/edit'),
            'qr-code' => Pages\ViewQrCode::route('/{record}/qr-code'),
        ];
    }
}
