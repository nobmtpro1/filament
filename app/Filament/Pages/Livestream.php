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

class Livestream extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.livestream';

    protected static ?string $navigationGroup = 'Pages';

    public PageContent $page_content;

    public $value;

    public function mount(): void
    {
        $data = @PageContent::where('key', 'livestream')->first();
        $this->form->fill(@$data->value);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('More contest')
                ->schema([
                    Repeater::make('More contest')
                        ->statePath('more_contest')
                        ->schema([
                            TextInput::make('title'),
                            FileUpload::make('image'),
                            TextInput::make('link'),
                        ])
                ]),
            Section::make('Welcome')
                ->statePath('welcome')
                ->schema([
                    TextInput::make('title'),
                ])
        ];
    }

    public function submit(): void
    {
        PageContent::updateOrCreate(['key' => 'livestream'], ['value' => $this->form->getState()]);
        Notification::make()
            ->success()
            ->title("Success")?->send();
    }
}
