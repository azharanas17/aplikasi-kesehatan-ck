<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        Tabs::make('tabs')
                            ->tabs([
                                Tabs\Tab::make('account')
                                    ->label('Akun')
                                    ->icon('heroicon-o-user')
                                    ->schema([
                                        $this->getNameFormComponent(),
                                        $this->getEmailFormComponent(),
                                        $this->getPasswordFormComponent(),
                                        $this->getPasswordConfirmationFormComponent(),
                                    ]),
                                Tabs\Tab::make('profile')
                                    ->label('Profil')
                                    ->icon('heroicon-o-user-circle')
                                    ->schema([
                                        Forms\Components\TextInput::make('nik')
                                            ->label('Nomor Induk Kependudukan/Nomor Induk Siswa')
                                            ->required()
                                            ->unique('users', 'nik'),
                                        Forms\Components\Select::make('jenis_kelamin')
                                            ->label('Jenis Kelamin')
                                            ->options([
                                                'L' => 'Laki-laki',
                                                'P' => 'Perempuan',
                                            ])
                                            ->required(),
                                        Forms\Components\TextInput::make('tempat_lahir')
                                            ->label('Tempat Lahir')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\DatePicker::make('tanggal_lahir')
                                            ->label('Tanggal Lahir')
                                            ->required()
                                            ->rule(['date']),
                                        Forms\Components\Select::make('pendidikan')
                                            ->label('Pendidikan')
                                            ->options([
                                                'SD' => 'SD/Sederajat',
                                                'SMP' => 'SMP/Sederajat',
                                                'SMA' => 'SMA/Sederajat',
                                                'D3' => 'D3',
                                                'S1' => 'S1/D4',
                                                'S2' => 'S2',
                                                'S3' => 'S3',
                                            ])
                                            ->required(),
                                        Forms\Components\TextInput::make('no_telp')
                                            ->label('No. Handphone')
                                            ->required()
                                            ->rule(['numeric']),
                                    ]),
                                Tabs\Tab::make('alamat')
                                    ->label('Alamat')
                                    ->icon('heroicon-o-home-modern')
                                    ->schema([
                                        Forms\Components\TextInput::make('alamat')
                                            ->label('Alamat Lengkap')
                                            ->maxLength(1024)
                                            ->required(),
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
                                            ->afterStateUpdated(function (Set $set) {
                                                $set('desa_id', null);
                                            })
                                            ->required(),
                                        Forms\Components\Select::make('desa_id')
                                            ->label('Desa/Kelurahan')
                                            ->options(fn (Get $get): Collection => 
                                                \App\Models\Desa::where('kecamatan_id', $get('kecamatan_id'))->pluck('nama', 'id')
                                            )
                                            ->searchable()
                                            ->preload()
                                            ->live()
                                            ->createOptionForm([
                                                Forms\Components\Select::make('kecamatan_id')
                                                    ->label('Kecamatan')
                                                    ->options(Kecamatan::all()->pluck('nama', 'id'))
                                                    ->searchable()
                                                    ->preload(),
                                                Forms\Components\TextInput::make('nama')
                                                    ->label('Nama Desa/Kelurahan')
                                                    ->required(),
                                            ])
                                            ->createOptionUsing(function (array $data) {
                                                return Desa::create([
                                                    'kecamatan_id' => $data['kecamatan_id'],
                                                    'nama' => $data['nama'],
                                                ])->id;
                                            })
                                            ->required(),
                                        Forms\Components\TextInput::make('no_alamat')
                                            ->label('Nomor')
                                            ->required()
                                            ->rule(['numeric']),
                                ]),
                            ]),
                    ])
                    ->model(User::class)
                    ->statePath('data'),
            ),
        ];
    }    
}
