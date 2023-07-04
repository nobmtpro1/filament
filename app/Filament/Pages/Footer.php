<?php

namespace App\Filament\Pages;

use App\Models\PageContent;
use Filament\Pages\Page;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class Footer extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.footer';

    protected static ?string $navigationGroup = 'Pages';

    public PageContent $page_content;

    public $value;

    public function mount(): void
    {
        $data = @PageContent::where('key', 'footer')->first();
        $this->form->fill(@$data->value);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('phone'),
            Section::make('Column 1')
                ->statePath('column_1')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('Links')
                        ->statePath('links')
                        ->schema([
                            TextInput::make('text'),
                            TextInput::make('link'),
                        ])
                ]),
            Section::make('Column 2')
                ->statePath('column_2')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('Links')
                        ->statePath('links')
                        ->schema([
                            TextInput::make('text'),
                            TextInput::make('link'),
                        ])
                ]),
            Section::make('Column 3')
                ->statePath('column_3')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('Links')
                        ->statePath('links')
                        ->schema([
                            TextInput::make('text'),
                            TextInput::make('link'),
                        ])
                ]),
        ];
    }

    public function submit(): void
    {
        PageContent::updateOrCreate(['key' => 'footer'], ['value' => $this->form->getState()]);
        Notification::make()
            ->success()
            ->title("Success")?->send();
    }
}
