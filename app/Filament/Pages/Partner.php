<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Partner extends Page implements HasForms, HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = 'Партнеры';
    protected static ?string $pluralModelLabel = 'Партнеры';
    protected static ?string $navigationGroup = 'Блоки на страницах';
    protected static ?string $title = 'Партнеры';
    protected static ?string $navigationLabel = 'Партнеры';

    protected static string $view = 'filament.pages.partner';

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
                        TextInput::make('partner_h3')
                            ->label('H3'),
                        TextInput::make('partner_h2')
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
            ->query(\App\Models\Partner::query())
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        FileUpload::make('logo')
                            ->required()
                            ->directory('partners')
                            ->label('Logo')
                    ]),
                Action::make('delete')
                    ->requiresConfirmation()
                    ->label('Удалить')
                    ->action(fn(\App\Models\Partner $record) => $record->delete())
            ])
            ->headerActions([
                Action::make('add')
                    ->label('Добавить')
                    ->form([
                        FileUpload::make('logo')
                            ->required()
                            ->directory('partners')
                            ->label('Logo')
                    ])
                    ->action(function (array $data) {
                        \App\Models\Partner::create([
                            'logo' => $data['logo'],
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
