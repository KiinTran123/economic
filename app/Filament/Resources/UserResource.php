<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

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
                    ->maxLength(255)
                    ->placeholder('Nhập tên...')
                    ->live()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('name', ucfirst($state)))
                    ->afterStateUpdated(fn ($state, callable $set) => $set('name', ucwords(strtolower($state))))
                    ->rule('min:3'),


                FileUpload::make('avatar')
                    ->label('Ảnh đại diện')
                    ->image()
                    ->directory('avatars')
                    ->disk('public')
                    ->preserveFilenames()
                    ->columnSpanFull(),

                TextInput::make('email')
                    ->required()
                    ->label('Email')
                    ->email()
                    ->maxLength(255)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('email', strtolower(trim($state)))),


                TextInput::make('phone')
                    ->required()
                    ->label('Số điện thoại')
                    ->tel()
                    ->maxLength(15)
                    ->rule('regex:/^(\+84|0)[1-9][0-9]{8,9}$/')
                    ->afterStateUpdated(fn ($state, callable $set) => $set('phone', trim($state))),

                TextInput::make('Fullname')
                    ->required()
                    ->label('Họ và tên')
                    ->maxLength(255)
                    ->rule('regex:/^[\pL\s\-]+$/u')
                    ->afterStateUpdated(fn ($state, callable $set) => $set('Fullname', ucwords(strtolower($state)))),



                TextInput::make('password')
                    ->password()
                    ->required()
                    ->label('Mật khẩu')
                    ->maxLength(30)
                    ->rule('min:8')
                    ->autocomplete('new-password'),


                TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->label('Xác nhận mật khẩu'),


                Select::make('role')
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
            ->columns([
                TextColumn::make('name')
                    ->label('Tên Người dùng')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('avatar')
                    ->label('Ảnh đại diện')
                    ->circular()
                    ->size(50)
                    ->getStateUsing(fn ($record) => $record && $record->avatar
                        ? asset('storage/' . $record->avatar)
                        : asset('images/default-avatar.png')),


                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('phone')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('Fullname')
                    ->label('Fullname')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable()

            ])
            ->filters([
            
                Tables\Filters\SelectFilter::make('role')
                    ->label('Vai trò')
                    ->options([
                        1 => 'Quản trị viên',
                        0 => 'Người dùng',
                    ]),


                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Trạng thái')
                    ->trueLabel('Hoạt động')
                    ->falseLabel('Không hoạt động'),


                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Từ ngày'),
                        Forms\Components\DatePicker::make('created_to')->label('Đến ngày'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['created_from'], fn ($query, $date) => $query->whereDate('created_at', '>=', $date))
                            ->when($data['created_to'], fn ($query, $date) => $query->whereDate('created_at', '<=', $date));
                    }),
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
