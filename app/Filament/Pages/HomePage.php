<?php

namespace App\Filament\Pages;

use App\Models\AboutPage;
use App\Models\Home;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class HomePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'Главная';
    protected static ?string $pluralModelLabel = 'Главная';
    protected static ?string $navigationGroup = 'Страницы сайта';
    protected static ?string $title = 'Главная';
    protected static ?string $navigationLabel = 'Главная';

    protected static string $view = 'filament.pages.home-page';

    public ?array $data = [];

    public function mount(): void
    {
        $data = Home::first();

        if ($data) {
            $this->form->fill($data->toArray());
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('seo')
                            ->label('SEO')
                            ->schema([
                                TextInput::make('seo.title')
                                    ->label('Title')
                                    ->required(),
                                TextInput::make('seo.og_title')
                                    ->label('Og:Title')
                                    ->required(),
                                Textarea::make('seo.meta_description')
                                    ->label('Description')
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('seo.og_description')
                                    ->label('Og:Description')
                                    ->rows(5)
                                    ->required(),
                                TextInput::make('seo.keywords')
                                    ->label('Keywords')
                                    ->required(),
                                TextInput::make('seo.og_type')
                                    ->label('Og:Type')
                                    ->default('website')
                                    ->required(),
                                TextInput::make('seo.og_url')
                                    ->label('Og:Url')
                                    ->required()
                                    ->columnSpanFull(),
                                FileUpload::make('seo.og_image')
                                    ->label('Og:Image')
                                    ->required()
                                    ->columnSpanFull()
                                    ->directory('seo')
                            ])->columns(2),
                        Tabs\Tab::make('first_block')
                            ->label('Блок о компании')
                            ->schema([
                                TextInput::make('first_block.h3')
                                    ->label('Заголовок h3')
                                    ->required(),
                                Textarea::make('first_block.h1')
                                    ->label('Заголовок h1')
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('first_block.description')
                                    ->label('Описание')
                                    ->rows(5)
                                    ->required(),
                                FileUpload::make('first_block.image')
                                    ->required()
                                    ->label('Изображение')
                                    ->directory('home'),
                                TextInput::make('first_block.link_youtube')
                                    ->label('Ссылка на Ютуб')
                                    ->required(),

                            ]),
                        Tabs\Tab::make('two_block')
                            ->label('Услуги (Общие)')
                            ->schema([
                                TextInput::make('two_block.h3')
                                    ->label('Заголовок h3')
                                    ->required(),
                                Textarea::make('two_block.h2')
                                    ->label('Заголовок h2')
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('two_block.description')
                                    ->label('Описание')
                                    ->rows(5)
                                    ->required(),
                                FileUpload::make('two_block.image')
                                    ->required()
                                    ->label('Изображение')
                                    ->directory('home'),
                                Repeater::make('two_block.services')
                                    ->required()
                                    ->label('Услуги')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Название услуги')
                                    ])

                            ]),
                        Tabs\Tab::make('three_block')
                            ->label('Услуги (Детальнее)')
                            ->schema([
                                TextInput::make('three_block.h3')
                                    ->label('Заголовок h3')
                                    ->required(),
                                Textarea::make('three_block.h2')
                                    ->label('Заголовок h2')
                                    ->rows(5)
                                    ->required(),
                            ]),
                        Tabs\Tab::make('four_block')
                            ->label('Портфолио')
                            ->schema([
                                TextInput::make('four_block.h3')
                                    ->label('Заголовок h3')
                                    ->required(),
                                Textarea::make('four_block.h2')
                                    ->label('Заголовок h2')
                                    ->rows(5)
                                    ->required(),

                            ]),
                    ])->columnSpanFull()
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = Home::first();
        if ($record) {
            $record->update($data);
        } else {
            Home::create($data);
        }
        Notification::make()
            ->title('Данные сохранены')
            ->success()
            ->send();
    }
}
