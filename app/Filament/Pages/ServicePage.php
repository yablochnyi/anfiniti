<?php

namespace App\Filament\Pages;

use App\Models\AboutPage;
use App\Models\Service;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServicePage extends Page implements HasForms, HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'Услуги';
    protected static ?string $pluralModelLabel = 'Услуги';
    protected static ?string $navigationGroup = 'Страницы сайта';
    protected static ?string $title = 'Услуги';
    protected static ?string $navigationLabel = 'Услуги';

    protected static string $view = 'filament.pages.service-page';

    public ?array $data = [];

    public function mount(): void
    {
        $data = \App\Models\ServicePage::first();

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
                            ]),
                    ]),
            ])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = \App\Models\ServicePage::first();
        if ($record) {
            $record->update($data);
        } else {
            \App\Models\ServicePage::create($data);
        }
        Notification::make()
            ->title('Данные сохранены')
            ->success()
            ->send();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Service::query())
            ->columns([
                TextColumn::make('name')
                    ->label('Услуги'),
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
                                        TextInput::make('name')
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                            ->label('Название'),
                                        TextInput::make('slug')
                                            ->required()
                                            ->label('URL'),
                                        RichEditor::make('description')
//                                            ->rows(5)
                                            ->columnSpanFull()
                                            ->label('Описание'),
                                        FileUpload::make('image')
                                            ->directory('services')
                                            ->required()
                                            ->columnSpanFull()
                                            ->label('Изображение')
                                    ])->columns(2),
//
                                Tabs\Tab::make('Маленький блок преимуществ')
                                    ->schema([
                                        TextInput::make('experience_small.title')
                                            ->required()
                                            ->label('Заголовок'),
                                        Repeater::make('experience_small.repeater')
                                            ->label('Преимущества')
                                            ->schema([
                                                TextInput::make('title')
                                            ]),
                                    ]),
//
                                Tabs\Tab::make('Большой блок преимуществ')
                                    ->schema([
                                        TextInput::make('experience_full.h3')
                                            ->required()
                                            ->label('Заголовок h3'),
                                        TextInput::make('experience_full.h2')
                                            ->required()
                                            ->label('Заголовок h2'),
                                        Repeater::make('experience_full.data')
                                            ->label('Блоки преимуществ')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->required()
                                                    ->label('Заголовок'),
                                                FileUpload::make('icon')
                                                    ->directory('services')
                                                    ->required(),
                                                Repeater::make('description')
                                                    ->label('Преимущества')
                                                    ->schema([
                                                        TextInput::make('title')
                                                            ->label('Заголовок')
                                                    ])

                                            ])
                                    ]),
                            ]),

                    ]),
                Action::make('delete')
                    ->requiresConfirmation()
                    ->label('Удалить')
                    ->action(fn(Service $record) => $record->delete())
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
                                        TextInput::make('name')
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn(Set $set, ?string $state, ?string $operation) =>
                                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                            )
                                            ->label('Название'),
                                        TextInput::make('slug')
                                            ->required()
                                            ->label('URL'),
                                        RichEditor::make('description')
//                                            ->rows(5)
                                            ->columnSpanFull()
                                            ->label('Описание'),
                                        FileUpload::make('image')
                                            ->directory('services')
                                            ->required()
                                            ->columnSpanFull()
                                            ->label('Изображение')
                                    ])->columns(2),
//
                                Tabs\Tab::make('Маленький блок преимуществ')
                                    ->schema([
                                        TextInput::make('experience_small.title')
                                            ->required()
                                            ->label('Заголовок'),
                                        Repeater::make('experience_small.repeater')
                                            ->label('Преимущества')
                                            ->schema([
                                                TextInput::make('title')
                                            ]),
                                    ]),
//
                                Tabs\Tab::make('Большой блок преимуществ')
                                    ->schema([
                                        TextInput::make('experience_full.h3')
                                            ->required()
                                            ->label('Заголовок h3'),
                                        TextInput::make('experience_full.h2')
                                            ->required()
                                            ->label('Заголовок h2'),
                                        Repeater::make('experience_full.data')
                                            ->label('Блоки преимуществ')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->required()
                                                    ->label('Заголовок'),
                                                FileUpload::make('icon')
                                                    ->directory('services')
                                                    ->required(),
                                                Repeater::make('description')
                                                    ->label('Преимущества')
                                                    ->schema([
                                                        TextInput::make('title')
                                                            ->label('Заголовок')
                                                    ])

                                            ])
                                    ]),
                            ]),

                    ])
                    ->action(function (array $data) {
                        Service::create([
                            'seo' => $data['seo'],
                            'name' => $data['name'],
                            'slug' => $data['slug'],
                            'description' => $data['description'],
                            'image' => $data['image'],
                            'experience_small' => $data['experience_small'],
                            'experience_full' => $data['experience_full'],
                        ]);
                        Notification::make()
                            ->title('Сервис успешно добавлен!')
                            ->success()
                            ->send();
                    })
            ])
            ->bulkActions([
                // ...
            ]);
    }
}
