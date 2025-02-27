<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Siswa';
    protected static ?string $navigationGroup = 'Pendataan Pendampingan';
    protected static ?int $navigationSort = 2;
    protected static ?string $pluralLabel = 'Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nik_siswa')
                    ->label('NIK/Nomor Induk Siswa')
                    ->relationship('siswa', 'nik')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('nik_wali')
                    ->label('NIK Wali')
                    ->relationship('wali', 'nik')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('sekolah_id')
                    ->label('Sekolah')
                    ->options(
                        \App\Models\TempatPendampingan::where('kategori', 'Sekolah')->pluck('nama', 'id')
                    )
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('jurusan')
                    ->label('Jurusan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('persoalan_pendidikan_id')
                    ->label('Persoalan Pendidikan')
                    ->relationship('persoalan_pendidikan', 'nama')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('nik_relawan_pendamping')
                    ->label('NIK Relawan Pendamping')
                    ->relationship('relawan_pendamping', 'nik_relawan')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.name')
                    ->label('Siswa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wali.name')
                    ->label('Wali')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sekolah.nama')
                    ->label('Sekolah')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jurusan')
                    ->label('Jurusan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('persoalan_pendidikan.nama')
                    ->label('Persoalan Pendidikan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('relawan_pendamping.relawan.name')
                    ->label('Relawan Pendamping')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
