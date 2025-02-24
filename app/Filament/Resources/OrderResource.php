<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\OrderResource\Pages;
    use App\Filament\Resources\OrderResource\RelationManagers;
    use App\Models\Order;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Infolists\Components\KeyValueEntry;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;

    class OrderResource extends Resource
    {
        protected static ?string $model = Order::class;

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\TextInput::make('user_id')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('payment_method')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('invoice_number')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('total_price')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('shipping_price')
                        ->required()
                        ->numeric()
                        ->default(0.00),

                    Forms\Components\Select::make('status')
                        ->options([
                            'PENDING' => 'PENDING'
                            , 'SUCCESS' => 'SUCCESS'
                            , 'FAILED' => 'FAILED'
                            , 'CANCELLED' => 'CANCELLED'
                        ])
                        ->required(),
                    Forms\Components\Textarea::make('shipping_address')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('billing_address')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('notes')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('payment_status')
                        ->maxLength(255)
                        ->default('Unpaid'),
                    Forms\Components\TextInput::make('payment_id')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\DateTimePicker::make('paid_at'),
                    Forms\Components\DateTimePicker::make('canceled_at'),
                    Forms\Components\DateTimePicker::make('finished_at'),
                    Forms\Components\DateTimePicker::make('failed_at'),
                    Forms\Components\DateTimePicker::make('expired_at'),
                    Forms\Components\DateTimePicker::make('canceled_by_admin_at'),
                    Forms\Components\DateTimePicker::make('canceled_by_user_at'),
                    Forms\Components\DateTimePicker::make('confirmed_at'),
                    Forms\Components\DateTimePicker::make('delivered_at'),
                    Forms\Components\DateTimePicker::make('returned_at'),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('user_id')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('payment_method')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('invoice_number')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('total_price')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('shipping_price')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('status'),
                    Tables\Columns\TextColumn::make('payment_status')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('payment_id')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('paid_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('canceled_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('finished_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('failed_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('expired_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('canceled_by_admin_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('canceled_by_user_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('confirmed_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('delivered_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('returned_at')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
                ->filters([
                    //
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
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
                'create' => Pages\CreateOrder::route('/create'),
                'edit' => Pages\EditOrder::route('/{record}/edit'),
            ];
        }
    }
