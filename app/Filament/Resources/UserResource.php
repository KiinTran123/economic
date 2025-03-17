<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-m-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Tên')
                    ->maxLength(255),

                TextInput::make('email')
                    ->required()
                    ->label('Email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->label('Mật khẩu')
                    ->maxLength(255),

                TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->label('Xác nhận mật khẩu')
                    ->same('password'),

                Select::make('role') // Thêm trường vai trò
                    ->label('Vai trò')
                    ->options([
                        1 => 'Quản trị viên',
                        0 => 'Người dùng',
                    ])
                    ->required()
                    ->default(0)
                    ->native(false),
                    Toggle::make('is_active')
                    ->label('Trạng thái')
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                User::query()
                    ->orderByRaw("CASE WHEN email = 'admin@gmail.com' THEN 0 ELSE 1 END") // Admin lên đầu
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Tên Người dùng')
                    ->sortable() // Thêm khả năng sắp xếp
                    ->searchable() // Thêm tìm kiếm
                    ->extraAttributes(['class' => 'font-semibold text-gray-800']), // Tô đậm và đổi màu chữ

                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['class' => 'text-indigo-600']), // Đổi màu email thành xanh

                // Loại bỏ TextInputColumn cho password vì không nên hiển thị trực tiếp
                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i') // Định dạng ngày giờ
                    ->sortable()
                    ->extraAttributes(['class' => 'text-gray-500']), // Màu xám nhạt
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                ]),
            ])
            ->striped()
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return 'Người Dùng';
    }
}
