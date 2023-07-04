<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')->options(Ticket::$type_options),
                TextInput::make('name')->maxLength(65535)->required(),
                FileUpload::make('image')->image()->columnSpanFull(),
                DatePicker::make('date'),
                TimePicker::make('from'),
                TimePicker::make('to'),
                TextInput::make('quantity')->integer(),
                TextInput::make('address')->maxLength(65535),
                TextInput::make('price')->integer()->required(),
                TextInput::make('link_video')->maxLength(65535),
                TextInput::make('examiner_type')->maxLength(255),
                Section::make('Examiner')
                    ->statePath('examiner')
                    ->schema([
                        Repeater::make('examiner')
                            ->schema([
                                FileUpload::make('avatar'),
                                TextInput::make('name')->required(),
                                Textarea::make('description')
                            ])
                            ->columns(2),
                    ]),
                Textarea::make('overview')->maxLength(65535)->columnSpanFull(),
                Select::make('is_active')->options(Ticket::$is_active_options),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')->formatStateUsing(function ($state) {
                    if ($state == 0) {
                        return "Online";
                    } else {
                        return "Offline";
                    }
                }),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('is_active')->enum([
                    '0' => 'Disable',
                    '1' => 'Active',
                ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
