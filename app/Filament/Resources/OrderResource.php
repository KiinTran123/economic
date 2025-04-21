<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationLabel = 'Đơn hàng';

    protected static ?string $pluralLabel = 'Đơn hàng';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Khách hàng')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('province_code')->label('Mã tỉnh/thành phố')->maxLength(255),
                Forms\Components\TextInput::make('district_code')->label('Mã quận/huyện')->maxLength(255),
                Forms\Components\TextInput::make('ward_code')->label('Mã phường/xã')->maxLength(255),
                Forms\Components\TextInput::make('address_detail')->label('Địa chỉ chi tiết')->maxLength(255),
                Forms\Components\TextInput::make('total_price')->label('Tổng tiền')->required()->numeric(),
                Forms\Components\Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipped' => 'Đã giao hàng',
                        'delivered' => 'Đã nhận hàng',
                        'cancelled' => 'Đã hủy',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user.name')->label('Khách hàng')->searchable()->sortable(),
                ImageColumn::make('product_images')
                    ->label('Hình ảnh sản phẩm')
                    ->getStateUsing(function (Model $record) {
                        // Collect all product images from order details
                        $images = $record->details->map(function ($detail) {
                            $images = $detail->product?->images;
                            return is_array($images) && !empty($images) ? asset('storage/' . $images[0]) : null;
                        })->filter()->take(3); // Limit to 3 images to avoid clutter
                        return $images->isEmpty() ? null : $images->toArray();
                    })
                    ->stacked() // Stack images vertically
                    ->width(50)
                    ->height(50)
                    ->rounded(),
                TextColumn::make('total_price')->label('Tổng tiền')->numeric()->sortable()->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.') . ' ₫'),
                SelectColumn::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipped' => 'Đã giao hàng',
                        'delivered' => 'Đã nhận hàng',
                        'cancelled' => 'Đã hủy',
                    ])
                    ->extraAttributes(fn ($state) => [
                        'class' => match ($state) {
                            'pending' => 'text-yellow-500 font-semibold',
                            'processing' => 'text-blue-500 font-semibold',
                            'shipped' => 'text-indigo-500 font-semibold',
                            'delivered' => 'text-green-500 font-semibold',
                            'cancelled' => 'text-red-500 font-semibold',
                            default => '',
                        },
                    ]),
                TextColumn::make('created_at')->label('Ngày tạo')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label('Ngày cập nhật')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
