<?php

namespace App\Filament\Pages;

use App\Models\AboutPage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class About extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'О нас';
    protected static ?string $pluralModelLabel = 'О нас';
    protected static ?string $navigationGroup = 'Страницы сайта';
    protected static ?string $title = 'О нас';
    protected static ?string $navigationLabel = 'О нас';

    protected static string $view = 'filament.pages.about';

    public ?array $data = [];

    public function mount(): void
    {
        $data = AboutPage::first();

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
                        Tabs\Tab::make('Основная информация')
                            ->schema([
                                TextInput::make('data.title')
                                    ->required()
                                    ->label('Заголовок'),
                                TextInput::make('data.count_work')
                                    ->required()
                                    ->integer()
                                    ->label('Количество выполненных работ'),
                                FileUpload::make('data.image_big')
                                    ->required()
                                    ->label('Большое изображение'),
                                FileUpload::make('data.image_small')
                                    ->required()
                                    ->label('Маленькое изображение'),
                                TextInput::make('data.h3')
                                    ->required()
                                    ->label('Заголовок h3'),
                                TextInput::make('data.h2')
                                    ->required()
                                    ->label('Заголовок h2'),
                                RichEditor::make('data.content')
                                    ->required()
//                                    ->rows(5)
                                    ->label('Описание')
                                    ->columnSpanFull(),
                                Repeater::make('data.quality')
                                    ->label('Лучшие стороны')
                                ->schema([
                                    TextInput::make('quality')
                                    ->required()
                                    ->label('Лучшие стороны')
                                ])->columnSpanFull(),
                            ])->columns(2),
                        Tabs\Tab::make('Команда')
                            ->schema([
                                TextInput::make('data.team_h3')
                                    ->required()
                                    ->label('Заголовок h3'),
                                TextInput::make('data.team_h2')
                                    ->required()
                                    ->label('Заголовок h2'),
                                Repeater::make('data.team')
                                    ->columnSpanFull()
                                    ->label('Команда')
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->label('Имя'),
                                        TextInput::make('position')
                                            ->required()
                                            ->label('Должность'),
                                        FileUpload::make('avatar')
                                            ->required()
                                            ->label('Изображение')
                                            ->directory('team')
                                    ])
                            ])->columns(2),
                    ]),
            ])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = AboutPage::first();
        if ($record) {
            $record->update($data);
        } else {
            AboutPage::create($data);
        }
        Notification::make()
            ->title('Данные сохранены')
            ->success()
            ->send();
    }
}
