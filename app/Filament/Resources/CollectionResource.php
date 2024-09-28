<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollectionResource\Pages;
use App\Filament\Resources\CollectionResource\RelationManagers;
use App\Models\Collection;
use App\Models\CollectionInfopixel;
use App\Models\Infopixel;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CollectionResource extends Resource
{
    protected static ?string $model = Collection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Oppgaver';
    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                  TextInput::make('name')->required(),
                   Textarea::make('description')->columnSpanFull(),
                 TextInput::make('level')->required(),
                Select::make('chapter_id')
                ->label('Kapittel')
                ->relationship('chapter','name'),
                Select::make('ctype_id')
                ->label('Oppgavetype')
                ->relationship('ctype','name'),
            ]),
                Section::make()->schema([
                FileUpload::make('image'),
               
                ]),
                
                 Repeater::make ('infopixels')
                    ->relationship()
                    ->schema([
                       Select::make('infopixel_id')
                       ->options(Infopixel::all()->pluck('name','id')),
                       //TextInput::make('listindex')
                    ])
                    ->reorderable('index')
                    ->orderColumn('index')
                    ->defaultItems(0)
                    ->columnSpan('full'),
                
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort')    
            ->columns([
                TextColumn::make('name'),
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
            'index' => Pages\ListCollections::route('/'),
            'create' => Pages\CreateCollection::route('/create'),
            'edit' => Pages\EditCollection::route('/{record}/edit'),
        ];
    }
}
