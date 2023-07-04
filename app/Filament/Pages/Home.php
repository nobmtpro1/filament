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

class Home extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.home';
    protected static ?string $navigationGroup = 'Pages';

    public PageContent $page_content;

    public $value;

    public function mount(): void
    {
        $data = @PageContent::where('key', 'home')->first();
        $this->form->fill(@$data->value);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Banner')
                ->statePath('banner')
                ->schema([
                    FileUpload::make('image')->image()
                ]),
            Section::make('Trailer')
                ->statePath('trailer')
                ->schema([
                    TextInput::make('title'),
                    TextInput::make('description'),
                    TextInput::make('link'),
                    TextInput::make('link_trailer'),
                ])
        ];
    }

    public function submit(): void
    {
        PageContent::updateOrCreate(['key' => 'home'], ['value' => $this->form->getState()]);
        Notification::make()
            ->success()
            ->title("Success")?->send();
    }
}
