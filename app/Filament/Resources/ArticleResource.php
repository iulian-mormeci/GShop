<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\View\TablesRenderHook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->label('Titolo Articolo')
                ->required()
                ->maxLength(255)
                ->minLength(2),
                Forms\Components\Textarea::make('description')
                ->required()
                ->minLength(10)
                ->label('Descrizione Articolo'),
                Forms\Components\TextInput::make('price')
                ->numeric()
                ->label('Prezzo Articolo')
                ->required()
                ->placeholder('0')
                ->prefix('€')
                ->maxValue(999999.99),
                Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->placeholder('Seleziona una Categoria')
                ->required()
                ->preload()
                ->searchable()
                ->label('Categoria Articolo')
                ->createOptionForm([
                    Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->minLength(2)
                    ->label('Nuova Categoria Articolo')
                    ->placeholder('Scrivi la nuova Categoria'),
                ]),
                Forms\Components\Select::make('size_id')
                ->relationship('size', 'name')
                ->required()
                ->preload()
                ->placeholder("Seleziona la taglia dell'articolo")
                ->searchable()
                ->createOptionForm([
                    Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(5)
                    ->placeholder('Inserisci la nuova Taglia')
                    ->label('Nuova Taglia Articolo')
                    ->minLength(1)
                    ->extraInputAttributes(['onInput' => 'this.value = this.value.toUpperCase()']),
                ]),
                Forms\Components\TextInput::make('availabiliti')
                ->required()
                ->numeric()
                ->minValue(0)
                ->maxValue(9999)
                ->placeholder('0')
                ->label("Pezzi Disponibili"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('Titolo')
                ->searchable(),
                Tables\Columns\TextColumn::make('description')
                ->label('Descrizione Articolo'),
                Tables\Columns\TextColumn::make('price')
                ->label('Prezzo Articolo')
                ->prefix('€'),
                Tables\Columns\TextColumn::make('category.name')
                ->label('Categoria Articolo')
                ->searchable(),
                Tables\Columns\TextColumn::make('size.name')
                ->label('Taglia Articolo'),
                Tables\Columns\TextColumn::make('availabiliti')
                ->label('Disponibilita')
                ->suffix(' pezzi'),
            ])

            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                ->relationship('category', 'name')
                ->multiple()
                ->searchable()
                ->preload(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
