<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\RichEditor;
use FilamentTiptapEditor\TiptapEditor;
use FilamentTiptapEditor\Enums\TiptapOutput;

class RichTextEditors extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Rich Text Editors';
    protected static ?string $title = 'Rich Text Editors';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.rich-text-editors';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Rich Text Editors')
                    ->tabs([
                        Tab::make('Rich Editor')
                            ->schema([
                                RichEditor::make('content')
                                    ->label('Editor')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('TipTap')
                            ->schema([
                                TiptapEditor::make('tiptap_content')
                                    ->profile('default')
                                    ->output(TiptapOutput::Html)
                                    ->maxContentWidth('5xl')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }
} 