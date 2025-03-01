<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKuasaResource\Pages;
use App\Filament\Resources\SuratKuasaResource\RelationManagers;
use App\Models\SuratKuasa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKuasaResource extends Resource
{
    protected static ?string $model = SuratKuasa::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';
    protected static ?string $navigationLabel = 'Surat Kuasa';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 3;
    protected static ?string $pluralLabel = 'Surat Kuasa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nik_pemberi_kuasa')
                    ->label('NIK Pemberi Kuasa')
                    ->relationship('pemberi_kuasa', 'nik')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('hubungan')
                    ->label('Hubungan dengan Pasien')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('nik_pasien')
                    ->label('NIK Pasien')
                    ->relationship('pasien', 'nik')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('penyakit')
                    ->label('Penyakit')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('nik_penerima_kuasa_1')
                    ->label('NIK Penerima Kuasa 1')
                    ->relationship('penerima_kuasa_1', 'nik_relawan')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('nik_penerima_kuasa_2')
                    ->label('NIK Penerima Kuasa 2')
                    ->relationship('penerima_kuasa_2', 'nik_relawan')
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pemberi_kuasa.name')
                    ->label('Pemberi Kuasa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('hubungan')
                    ->label('Hubungan dengan Pasien')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pasien.name')
                    ->label('Pasien')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('penyakit')
                    ->label('Penyakit')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('penerima_kuasa_1.relawan.name')
                    ->label('Penerima Kuasa 1')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('penerima_kuasa_2.relawan.name')
                    ->label('Penerima Kuasa 2')
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
                Tables\Actions\DeleteAction::make(),

                Action::make('cetak-pdf')
                    ->label('Cetak PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn(SuratKuasa $record): string => static::getUrl('surat-kuasa.cetak-pdf', ['id' => $record->id])),
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
            'index' => Pages\ListSuratKuasas::route('/'),
            'create' => Pages\CreateSuratKuasa::route('/create'),
            'edit' => Pages\EditSuratKuasa::route('/{record}/edit'),
            // 'cetak-pdf' => Pages\ViewCetakPdf::route('/{record}/cetak-pdf'),

        ];
    }
}
