<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Category;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class ProductResource extends Resource
{
  protected static ?string $recordTitleAttribute = 'name';

  protected static ?string $model = Product::class;


  protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TextInput::make('name')
          ->label('Tên sản phẩm')
          ->required()
          ->maxLength(255),

        TextInput::make('price')
          ->label('Giá')
          ->required()
          ->numeric()
          ->prefix('VNĐ'),

        FileUpload::make('images')
          ->multiple()
          ->label('Hình ảnh'),

        TextInput::make('quantity')
          ->label('Số lượng')
          ->required()
          ->numeric()
          ->default(1),

        RichEditor::make('description')
          ->label('Chi tiết sản phẩm')
          ->columnSpanFull(),

        Select::make('category_id')
          ->label('Chọn Danh mục')
          ->options(Category::query()->pluck('name', 'id'))
          ->required(),

        Toggle::make('is_active')
          ->label('Trạng thái')
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('id')
          ->sortable()
          ->label('ID'),

        TextInputColumn::make('name')
          ->searchable()
          ->label('Tên sản phẩm'),

        ImageColumn::make('images')
          ->label('Hình ảnh')
          ->stacked()
          ->circular()
          ->limit(3)
          ->limitedRemainingText(),

        TextColumn::make('price')
          ->money()
          ->sortable()
          ->label('Giá'),

        TextColumn::make('quantity')
          ->label('Số lượng')
          ->alignCenter()
          ->numeric()
          ->sortable(),

        IconColumn::make('is_active')
          ->label('Trạng thái')
          ->boolean()
          ->alignCenter(),

        TextColumn::make('category.name')
          ->label('Danh mục'),

        TextColumn::make('created_at')
          ->label('Tạo lúc')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('updated_at')
          ->label('Cập nhật lúc')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->filters([

        SelectFilter::make('category_id')
          ->label('Danh mục')
          ->options(Category::all()->pluck('name', 'id'))
          ->default(null),

        SelectFilter::make('Trạng thái')
          ->options([
            1 => 'Kích hoạt',
            0 => 'Vô hiệu',
          ])
          ->attribute('is_active')

      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
          Tables\Actions\ForceDeleteBulkAction::make(),
          Tables\Actions\RestoreBulkAction::make(),
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
      'index' => Pages\ListProducts::route('/'),
      'create' => Pages\CreateProduct::route('/create'),
      'edit' => Pages\EditProduct::route('/{record}/edit'),
    ];
  }

  public static function getLabel(): string
  {
    return 'Sản Phẩm';
  }
}
