<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TempatPendampinganResource\Pages;
use App\Filament\Resources\TempatPendampinganResource\RelationManagers;
use App\Models\TempatPendampingan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

class TempatPendampinganResource extends Resource
{
    protected static ?string $model = TempatPendampingan::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Tempat Pendampingan';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 6;
    protected static ?string $pluralLabel = 'Tempat Pendampingan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Rumah Sakit' => 'Rumah Sakit',
                        'Sekolah' => 'Sekolah',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Tempat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('kabupaten_id')
                    ->label('Kabupaten/Kota')
                    ->options(
                        \App\Models\Kabupaten::all()
                            ->pluck('nama', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->live()
                    ->createOptionForm([
                        Forms\Components\Select::make('provinsi_id')
                            ->label('Provinsi')
                            ->options(Provinsi::all()->pluck('nama', 'id'))
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Kabupaten/Kota')
                            ->required(),
                    ])
                    ->createOptionUsing(function (array $data) {
                        return Kabupaten::create([
                            'provinsi_id' => $data['provinsi_id'],
                            'nama' => $data['nama'],
                        ])->id;
                    })
                    ->afterStateUpdated(function (Set $set) {
                        $set('kecamatan_id', null);
                        $set('desa_id', null);
                    })
                    ->required(),
                Forms\Components\Select::make('kecamatan_id')
                    ->label('Kecamatan')
                    ->options(fn (Get $get): Collection => 
                        \App\Models\Kecamatan::where('kabupaten_id', $get('kabupaten_id'))->pluck('nama', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->live()
                    ->createOptionForm([
                        Forms\Components\Select::make('kabupaten_id')
                            ->label('Kabupaten/Kota')
                            ->options(Kabupaten::all()->pluck('nama', 'id'))
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Kecamatan')
                            ->required(),
                    ])
                    ->createOptionUsing(function (array $data) {
                        return Kecamatan::create([
                            'kabupaten_id' => $data['kabupaten_id'],
                            'nama' => $data['nama'],
                        ])->id;
                    })
                    ->required(),
                Forms\Components\TextInput::make('no_telp')
                    ->label('No. Telp')
                    ->required()
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('PIC')
                    ->label('PIC')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Tempat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kabupaten.nama')
                    ->label('Kabupaten')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Kecamatan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_telp')
                    ->label('No. Telp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('PIC')
                    ->label('PIC')
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
            'index' => Pages\ListTempatPendampingans::route('/'),
            'create' => Pages\CreateTempatPendampingan::route('/create'),
            'edit' => Pages\EditTempatPendampingan::route('/{record}/edit'),
        ];
    }
}
