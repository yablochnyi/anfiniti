<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class HeaderAndFooter extends Page
{
    protected static ?string $navigationIcon = 'heroicon-m-cog-6-tooth';
    protected static ?string $modelLabel = 'Header & Footer';
    protected static ?string $pluralModelLabel = 'Header & Footer';
    protected static ?string $navigationGroup = 'Настройки';
    protected static ?string $title = 'Header & Footer';
    protected static ?string $navigationLabel = 'Header & Footer';

    protected static string $view = 'filament.pages.header-and-footer';

    public ?array $data = [];

    public function mount(): void
    {
        $data = \App\Models\HeaderAndFooter::first();

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
                        Tabs\Tab::make('Header')
                            ->schema([
                                FileUpload::make('header.logo')
                                    ->required()
                                    ->label('Logo')
                                    ->directory('header_and_footer'),
                                Repeater::make('header.navigation')
                                    ->required()
                                    ->label('Меню')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Название'),
                                        TextInput::make('link')
                                            ->label('Ссылка'),
                                    ])

                            ]),
                        Tabs\Tab::make('Footer')
                            ->schema([
                                FileUpload::make('footer.logo')
                                    ->required()
                                    ->label('Logo')
                                    ->columnSpanFull()
                                    ->directory('header_and_footer'),
                                TextInput::make('footer.email')
                                    ->columnSpanFull()
                                    ->label('Email'),
                                TextInput::make('footer.phone')
                                    ->columnSpanFull()
                                    ->label('Телефон'),
                                TextInput::make('footer.navigation_title_1')
                                    ->label('Заголовок'),
                                TextInput::make('footer.navigation_title_2')
                                    ->label('Заголовок'),
                                TextInput::make('footer.navigation_title_3')
                                    ->label('Заголовок'),
                                Repeater::make('footer.navigation_1')
                                    ->required()
                                    ->label('Меню')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Название'),
                                        TextInput::make('link')
                                            ->label('Ссылка'),
                                    ]),
                                Repeater::make('footer.navigation_2')
                                    ->required()
                                    ->label('Меню')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Название'),
                                        TextInput::make('link')
                                            ->label('Ссылка'),
                                    ]),
                                Repeater::make('footer.navigation_3')
                                    ->label('Меню')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Название'),
                                        TextInput::make('link')
                                            ->label('Ссылка'),
                                    ])

                            ])->columns(3),
                        ]),
            ])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = \App\Models\HeaderAndFooter::first();
        if ($record) {
            $record->update($data);
        } else {
            \App\Models\HeaderAndFooter::create($data);
        }
        Notification::make()
            ->title('Данные сохранены')
            ->success()
            ->send();
    }
}
