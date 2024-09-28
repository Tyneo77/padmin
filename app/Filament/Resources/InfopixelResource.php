<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfopixelResource\Pages;
use App\Filament\Resources\InfopixelResource\RelationManagers;
use App\Models\Infopixel;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfopixelResource extends Resource
{
    protected static ?string $model = Infopixel::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'InformasjonsPixler';
    protected static ?int $navigationSort = 6;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('medicalname'),
                textarea::make('hint'),
                Textarea::make('description'),
                Select::make('level')->options([
                    1 => 'Level1',
                    2 => 'Level2',
                    3 => 'Level3',
                    4 => 'Level4',
                    5 => 'Level5',
                    6 => 'Level6',
                    7 => 'Level7',
                    8 => 'Level8',
                    9 => 'Level9',
                ]),
                FileUpload::make('image'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('level'),
                ImageColumn::make('image'),
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
            'index' => Pages\ListInfopixels::route('/'),
            'create' => Pages\CreateInfopixel::route('/create'),
            'edit' => Pages\EditInfopixel::route('/{record}/edit'),
        ];
    }
}
