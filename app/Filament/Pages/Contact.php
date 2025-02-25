<?php

namespace App\Filament\Pages;

use App\Models\ContactPage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Contact extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'Контакты';
    protected static ?string $pluralModelLabel = 'Контакты';
    protected static ?string $navigationGroup = 'Страницы сайта';
    protected static ?string $title = 'Контакты';
    protected static ?string $navigationLabel = 'Контакты';

    protected static string $view = 'filament.pages.contact';

    public ?array $data = [];

    public function mount(): void
    {
        $data = ContactPage::first();

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
                                    ->columnSpanFull()
                                    ->label('Заголовок'),
                                TextInput::make('data.address')
                                    ->required()
                                    ->label('Адрес'),
                                FileUpload::make('data.address_image')
                                    ->required()
                                    ->directory('contact')
                                    ->label('Изображение'),
                                Repeater::make('data.phone')
                                    ->label('Телефоны')
                                    ->schema([
                                        TextInput::make('phone')
                                            ->label('Телефон')
                                    ])->columnSpanFull(),
                                FileUpload::make('data.phone_image')
                                    ->required()
                                    ->columnSpanFull()
                                    ->directory('contact')
                                    ->label('Изображение'),
                                Repeater::make('data.email')
                                    ->label('Emails')
                                    ->schema([
                                        TextInput::make('email')
                                            ->label('Email')
                                    ])->columnSpanFull(),
                                FileUpload::make('data.email_image')
                                    ->required()
                                    ->columnSpanFull()
                                    ->directory('contact')
                                    ->label('Изображение'),
                            ])->columns(2),
                        Tabs\Tab::make('Следите за нами')
                            ->schema([
                                TextInput::make('data.contact_h3')
                                    ->required()
                                    ->label('Заголовок h3'),
                                TextInput::make('data.contact_h2')
                                    ->required()
                                    ->label('Заголовок h2'),
                                Textarea::make('data.description_h2')
                                    ->required()
                                    ->rows(5)
                                    ->columnSpanFull()
                                    ->label('Описание'),
                                Repeater::make('data.social')
                                    ->columnSpanFull()
                                    ->label('Соц. сети')
                                    ->schema([
//                                        FileUpload::make('social_image')
//                                            ->required()
//                                            ->label('Иконка'),
                                        TextInput::make('link')
                                            ->required()
                                            ->label('Ссылка инстаграм'),
                                    ])
                            ])->columns(2),
                        Tabs\Tab::make('Карта')
                            ->schema([
                                TextInput::make('data.map_link')
                                    ->required()
                                    ->label('Ссылка на карту'),
                            ]),
                    ]),
            ])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = ContactPage::first();
        if ($record) {
            $record->update($data);
        } else {
            ContactPage::create($data);
        }
        Notification::make()
            ->title('Данные сохранены')
            ->success()
            ->send();
    }
}
