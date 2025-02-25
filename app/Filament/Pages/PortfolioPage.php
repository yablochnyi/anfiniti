<?php

namespace App\Filament\Pages;

use App\Models\Portfolio;
use App\Models\Service;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PortfolioPage extends Page implements HasForms, HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'Портфолио';
    protected static ?string $pluralModelLabel = 'Портфолио';
    protected static ?string $navigationGroup = 'Страницы сайта';
    protected static ?string $title = 'Портфолио';
    protected static ?string $navigationLabel = 'Портфолио';

    protected static string $view = 'filament.pages.portfolio-page';

    public ?array $data = [];

    public function mount(): void
    {
        $data = \App\Models\PortfolioPage::first();

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
                                TextInput::make('seo.title_page')
                                    ->required()
                                    ->label('Заголовок'),
                            ]),
                    ]),
            ])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = \App\Models\PortfolioPage::first();
        if ($record) {
            $record->update($data);
        } else {
            \App\Models\PortfolioPage::create($data);
        }
        Notification::make()
            ->title('Данные сохранены')
            ->success()
            ->send();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Portfolio::query())
            ->columns([
                TextColumn::make('title')
                    ->label('Портфолио'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->form([
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
                                Tabs\Tab::make('Основные')
                                    ->schema([
                                        TextInput::make('title')
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                            ->label('Название'),
                                        TextInput::make('slug')
                                            ->required()
                                            ->label('URL'),
                                        RichEditor::make('description.description')
//                                            ->rows(5)
                                            ->columnSpanFull()
                                            ->label('Описание'),
                                        FileUpload::make('image')
                                            ->directory('portfolio')
                                            ->required()
                                            ->columnSpanFull()
                                            ->label('Изображение')
                                    ])->columns(2),

                                Tabs\Tab::make('Изображения')
                                    ->schema([

                                        FileUpload::make('description.images')
                                            ->required()
                                            ->multiple()
                                            ->directory('portfolio')
                                            ->label('Фотография'),

                                    ]),

                                Tabs\Tab::make('Информация о компании')
                                    ->schema([
                                        DatePicker::make('description.date')
                                            ->required()
                                            ->label('Дата'),
                                        TextInput::make('description.client')
                                            ->required()
                                            ->label('Клиент'),
                                        TextInput::make('description.location')
                                            ->required()
                                            ->label('Локация'),
                                    ]),
                            ]),

                    ]),
                Action::make('delete')
                    ->requiresConfirmation()
                    ->label('Удалить')
                    ->action(fn(Portfolio $record) => $record->delete())
            ])
            ->headerActions([
                Action::make('add')
                    ->label('Добавить')
                    ->form([
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
                                Tabs\Tab::make('Основные')
                                    ->schema([
                                        TextInput::make('title')
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                            ->label('Название'),
                                        TextInput::make('slug')
                                            ->required()
                                            ->label('URL'),
                                        RichEditor::make('description.description')
//                                            ->rows(5)
                                            ->columnSpanFull()
                                            ->label('Описание'),
                                        FileUpload::make('image')
                                            ->directory('portfolio')
                                            ->required()
                                            ->columnSpanFull()
                                            ->label('Изображение')
                                    ])->columns(2),

                                Tabs\Tab::make('Изображения')
                                    ->schema([

                                        FileUpload::make('description.images')
                                            ->required()
                                            ->multiple()
                                            ->directory('portfolio')
                                            ->label('Фотография'),

                                    ]),

                                Tabs\Tab::make('Информация о компании')
                                    ->schema([
                                        DatePicker::make('description.date')
                                            ->required()
                                            ->label('Дата'),
                                        TextInput::make('description.client')
                                            ->required()
                                            ->label('Клиент'),
                                        TextInput::make('description.location')
                                            ->required()
                                            ->label('Локация'),
                                    ]),
                            ]),

                    ])
                    ->action(function (array $data) {
                        Portfolio::create([
                            'seo' => $data['seo'],
                            'description' => $data['description'],
                            'title' => $data['title'],
                            'slug' => $data['slug'],
                            'image' => $data['image'],
                        ]);
                        Notification::make()
                            ->title('Проект успешно добавлен!')
                            ->success()
                            ->send();
                    })
            ])
            ->bulkActions([
                // ...
            ]);
    }
}
