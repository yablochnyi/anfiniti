<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
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

class Review extends Page implements HasForms, HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'Отзывы';
    protected static ?string $pluralModelLabel = 'Отзывы';
    protected static ?string $navigationGroup = 'Блоки на страницах';

    protected static ?string $title = 'Отзывы';
    protected static ?string $navigationLabel = 'Отзывы';

    protected static string $view = 'filament.pages.review';

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
                        TextInput::make('review_h3')
                            ->label('H3'),
                        TextInput::make('review_h2')
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
            ->query(\App\Models\Review::query())
            ->columns([
                ImageColumn::make('avatar')
                    ->label('Аватар'),
                TextColumn::make('company_name')
                    ->label('Компания'),
                TextColumn::make('review')
                    ->limit(50)
                    ->label('Отзыв')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        TextInput::make('name')
                            ->label('Имя'),
                        TextInput::make('company_name')
                            ->label('Компания'),
                        Textarea::make('review')
                            ->rows(5)
                            ->label('Отзыв'),
                        FileUpload::make('avatar')
                            ->required()
                            ->label('Аватар')
                            ->directory('review'),
                    ]),
                Action::make('delete')
                    ->requiresConfirmation()
                    ->label('Удалить')
                    ->action(fn(\App\Models\Review $record) => $record->delete())
            ])
            ->headerActions([
                Action::make('add')
                    ->label('Добавить')
                    ->form([
                        TextInput::make('name')
                            ->label('Имя'),
                        TextInput::make('company_name')
                            ->label('Компания'),
                        Textarea::make('review')
                            ->rows(5)
                            ->label('Отзыв'),
                        FileUpload::make('avatar')
                            ->required()
                            ->label('Аватар')
                            ->directory('review'),
                    ])
                    ->action(function (array $data) {
                        \App\Models\Review::create([
                            'stars' => $data['stars'],
                            'name' => $data['name'],
                            'company_name' => $data['company_name'],
                            'review' => $data['review'],
                            'avatar' => $data['avatar'],
                        ]);
                        Notification::make()
                            ->title('Партнер успешно добавлен!')
                            ->success()
                            ->send();
                    })
            ])
            ->bulkActions([
                // ...
            ]);
    }
}
