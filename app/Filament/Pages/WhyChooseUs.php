<?php

namespace App\Filament\Pages;

use App\Models\AboutPage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class WhyChooseUs extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'Почему мы?';
    protected static ?string $pluralModelLabel = 'Почему мы?';
    protected static ?string $navigationGroup = 'Блоки на страницах';

    protected static ?string $title = 'Почему мы?';
    protected static ?string $navigationLabel = 'Почему мы?';

    protected static string $view = 'filament.pages.why-choose-us';

    public ?array $data = [];

    public function mount(): void
    {
        $data = \App\Models\WhyChooseUs::first();

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
                Section::make()
                    ->schema([
                        TextInput::make('data.h3')
                            ->label('Заголовок h3'),
                        Textarea::make('data.h2')
                            ->label('Заголовок h2')
                            ->rows(5)
                            ->required(),
                        Repeater::make('data.services')
                            ->required()
                            ->label('Причины выбрать нас')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Название услуги'),
                                TextArea::make('description')
                                    ->required()
                                    ->rows(5)
                                    ->label('Описание'),
                                FileUpload::make('image')
                                    ->required()
                                    ->label('Изображение')
                                    ->directory('why_choose_us'),
                            ])
                    ])
            ])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = \App\Models\WhyChooseUs::first();
        if ($record) {
            $record->update($data);
        } else {
            \App\Models\WhyChooseUs::create($data);
        }
        Notification::make()
            ->title('Данные сохранены')
            ->success()
            ->send();
    }
}
