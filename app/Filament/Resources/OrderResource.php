<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public $record;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment'),
                Forms\Components\TextInput::make('is_business')
                    ->required(),
                Forms\Components\TextInput::make('company_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_mail')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_mst')
                    ->maxLength(255),
                Forms\Components\TextInput::make('total')
                    ->required(),
                Forms\Components\TextInput::make('is_paid')
                    ->required(),
                Forms\Components\TextInput::make('payment_money')
                    ->required(),
                Forms\Components\TextInput::make('content_for_payment')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status_payment')
                    ->required(),
                Forms\Components\Textarea::make('payment_log'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('business')
                    ->getStateUsing(function ($record) {
                        return $record->company_name . '<br/>' . $record->company_address . '<br/>' . $record->company_mail . '<br/>' . $record->company_mst;
                    })->html(),
                Tables\Columns\TextColumn::make('payment')->enum([
                    '0' => 'Momo',
                    '1' => 'Bank',
                ]),
                Tables\Columns\TextColumn::make('total')
                    ->getStateUsing(function ($record) {
                        return number_format($record->total, 0);
                    })->html(),
                Tables\Columns\TextColumn::make('is_paid')->enum([
                    '0' => 'New',
                    '1' => 'Done',
                    '2' => 'Error',
                ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                SelectFilter::make('is_paid')
                    ->options([
                        '0' => 'New',
                        '1' => 'Paid',
                        '2' => 'Error',
                    ])
            ])
            ->actions([
                Tables\Actions\Action::make('detail')
                    ->action(function (array $data): void {
                        $this->record = $data;
                    })
                    ->modalContent(function ($record) {
                        return view('filament.modals.order_detail', ['record' => $record]);
                    })
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
            'index' => Pages\ListOrders::route('/'),
            // 'create' => Pages\CreateOrder::route('/create'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
