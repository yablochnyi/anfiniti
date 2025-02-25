<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Statistic extends Page implements HasForms, HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'Статистика';
    protected static ?string $pluralModelLabel = 'Статистика';
    protected static ?string $navigationGroup = 'Блоки на страницах';

    protected static ?string $title = 'Статистика';
    protected static ?string $navigationLabel = 'Статистика';

    protected static string $view = 'filament.pages.statistic';

    public ?array $data = [];

    public function mount(): void
    {
        $data = Setting::first();

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
                Section::make('Заголовки')
                    ->schema([
                        TextInput::make('statistic_h3')
                            ->label('H3'),
                        TextInput::make('statistic_h2')
                            ->label('H2'),
                    ]),
            ])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = Setting::first();
        if ($record) {
            $record->update($data);
        } else {
            Setting::create($data);
        }
        Notification::make()
            ->title('Данные сохранены')
            ->success()
            ->send();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Statistic::query())
            ->columns([
                TextColumn::make('type')
                    ->label('Тип'),
                TextColumn::make('title')
                    ->label('Заголовок'),
                TextColumn::make('description')
                    ->label('Описание')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        Select::make('type')
                            ->label('Тип')
                            ->options([
                                'Статический текст' => 'Статический текст',
                                'Лет' => 'Лет',
                                '+' => '+'
                            ]),
                        TextInput::make('title')
                            ->label('Заголовок'),
                        TextInput::make('description')
                            ->label('Описание'),
                    ]),
                Action::make('delete')
                    ->requiresConfirmation()
                    ->label('Удалить')
                    ->action(fn(\App\Models\Statistic $record) => $record->delete())
            ])
            ->headerActions([
                Action::make('add')
                    ->label('Добавить')
                    ->form([
                        Select::make('type')
                            ->label('Тип')
                            ->options([
                                'Статический текст' => 'Статический текст',
                                'Лет' => 'Лет',
                                '+' => '+'
                            ]),
                        TextInput::make('title')
                            ->label('Заголовок'),
                        TextInput::make('description')
                            ->label('Описание'),
                    ])
                    ->action(function (array $data) {
                        \App\Models\Statistic::create([
                            'type' => $data['type'],
                            'title' => $data['title'],
                            'description' => $data['description'],
                        ]);
                        Notification::make()
                            ->title('Статистика успешно добавлена!')
                            ->success()
                            ->send();
                    })
            ])
            ->bulkActions([
                // ...
            ]);
    }
}
