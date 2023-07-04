<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentLogResource\Pages;
use App\Filament\Resources\PaymentLogResource\RelationManagers;
use App\Models\PaymentLog;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentLogResource extends Resource
{
    protected static ?string $model = PaymentLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_id')
                    ->required(),
                Forms\Components\TextInput::make('payment_method')
                    ->required(),
                Forms\Components\TextInput::make('payment_money')
                    ->required(),
                Forms\Components\TextInput::make('content_for_payment')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_for_payment')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('account_for_payment')
                    ->maxLength(255),
                Forms\Components\TextInput::make('transaction_id')
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
                Tables\Columns\TextColumn::make('order_id'),
                Tables\Columns\TextColumn::make('payment_method'),
                Tables\Columns\TextColumn::make('payment_money'),
                Tables\Columns\TextColumn::make('content_for_payment'),
                Tables\Columns\TextColumn::make('phone_for_payment'),
                Tables\Columns\TextColumn::make('account_for_payment'),
                Tables\Columns\TextColumn::make('transaction_id'),
                Tables\Columns\TextColumn::make('status_payment'),
                Tables\Columns\TextColumn::make('payment_log'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPaymentLogs::route('/'),
            'create' => Pages\CreatePaymentLog::route('/create'),
            'edit' => Pages\EditPaymentLog::route('/{record}/edit'),
        ];
    }    
}
