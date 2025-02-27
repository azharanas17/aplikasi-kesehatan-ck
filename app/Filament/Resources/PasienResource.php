<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasienResource\Pages;
use App\Filament\Resources\PasienResource\RelationManagers;
use App\Models\Pasien;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationLabel = 'Pasien';
    protected static ?string $navigationGroup = 'Pendataan Pendampingan';
    protected static ?int $navigationSort = 1;
    protected static ?string $pluralLabel = 'Pasien';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nik_pasien')
                    ->label('Pasien')
                    ->relationship('pasien', 'nik')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('no_rm')
                    ->label('No. RM')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('nik_keluarga_pendamping')
                    ->label('NIK Keluarga Pendamping')
                    ->relationship('keluarga_pendamping', 'nik')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('rumah_sakit_id')
                    ->label('Rumah Sakit')
                    ->options(
                        \App\Models\TempatPendampingan::where('kategori', 'Rumah Sakit')->pluck('nama', 'id')
                    )
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('jenis_layanan_id')
                    ->label('Jenis Layanan')
                    ->relationship('jenis_layanan', 'nama')
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_masuk')
                    ->label('Tanggal Masuk')
                    ->required(),
                Forms\Components\TimePicker::make('jam_masuk')
                    ->label('Jam Masuk')
                    ->required(),
                Forms\Components\Select::make('rujukan_id')
                    ->label('Rujukan')
                    ->options(
                        \App\Models\TempatPendampingan::where('kategori', 'Rumah Sakit')->pluck('nama', 'id')
                    )
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('diagnose')
                    ->label('Diagnosa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status_jaminan')
                    ->label('Status Jaminan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('poli')
                    ->label('Poli')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ruangan')
                    ->label('Ruangan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->columnSpanFull(),
                Forms\Components\Select::make('nik_relawan_pendamping')
                    ->label('Relawan Pendamping')
                    ->relationship('relawan_pendamping', 'nik_relawan')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pasien.name')
                    ->label('Pasien')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_rm')
                    ->label('No. RM')
                    ->numeric()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('keluarga_pendamping.name')
                    ->label('Keluarga Pendamping')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rumah_sakit.nama')
                    ->label('Rumah Sakit')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_layanan.nama')
                    ->label('Jenis Layanan')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_masuk')
                    ->label('Tanggal Masuk')
                    ->date()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jam_masuk')
                    ->label('Jam Masuk')
                    ->time()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rujukan.nama')
                    ->label('Rujukan')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('diagnose')
                    ->label('Diagnosa')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_jaminan')
                    ->label('Status Jaminan')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('poli')
                    ->label('Poli')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ruangan')
                    ->label('Ruangan')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('relawan_pendamping.relawan.name')
                    ->label('Relawan Pendamping')
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
            'index' => Pages\ListPasiens::route('/'),
            'create' => Pages\CreatePasien::route('/create'),
            'edit' => Pages\EditPasien::route('/{record}/edit'),
        ];
    }
}
