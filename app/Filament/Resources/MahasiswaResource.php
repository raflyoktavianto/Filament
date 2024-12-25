<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    const JENIS_KELAMIN_OPTIONS = [
        'L' => 'Laki-Laki',
        'P' => 'Perempuan',
    ];

    const JURUSAN_OPTIONS = [
        'TI' => 'Teknik Informatika',
        'SI' => 'Sistem Informasi',
        'ILKOM' => 'Ilmu Komputer',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nim')
                    ->required()
                    ->unique()
                    ->maxLength(13)
                    ->label('NIM'),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128)
                    ->label('Nama'),
                Select::make('jenis_kelamin')
                    ->options(self::JENIS_KELAMIN_OPTIONS)
                    ->required()
                    ->label('Jenis Kelamin'),
                TextInput::make('alamat')
                    ->required()
                    ->maxLength(128)
                    ->label('Alamat'),
                DatePicker::make('tanggal_lahir')
                    ->required()
                    ->label('Tanggal Lahir'),
                Select::make('jurusan')
                    ->options(self::JURUSAN_OPTIONS)
                    ->required()
                    ->label('Jurusan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->label('NIM')->sortable()->searchable(),
                TextColumn::make('nama')->label('Nama')->sortable()->searchable(),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                TextColumn::make('alamat')->label('Alamat'),
                TextColumn::make('tanggal_lahir')->label('Tanggal Lahir')->date(),
                TextColumn::make('jurusan')->label('Jurusan'),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}