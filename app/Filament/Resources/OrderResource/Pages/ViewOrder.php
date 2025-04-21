<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\RepeatableEntry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Thông tin đơn hàng')
                    ->schema([
                        TextEntry::make('id')->label('Mã đơn hàng'),
                        TextEntry::make('user.name')->label('Khách hàng'),
                        TextEntry::make('full_address')
                            ->label('Địa chỉ')
                            ->getStateUsing(function ($record) {
                                $province = $this->translateProvince($record->province_code);
                                $district = $this->translateDistrict($record->district_code);
                                $ward = $this->translateWard($record->ward_code);
                                $detail = $record->address_detail;

                                return collect([$detail, $ward, $district, $province])
                                    ->filter()
                                    ->implode(', ');
                            }),
                        TextEntry::make('total_price')->label('Tổng tiền')->numeric()->money('VND'),
                        TextEntry::make('status')
                            ->label('Trạng thái')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'processing' => 'info',
                                'shipped' => 'primary',
                                'delivered' => 'success',
                                'cancelled' => 'danger',
                            })
                            ->formatStateUsing(fn ($state) => match ($state) {
                                'pending' => 'Chờ xử lý',
                                'processing' => 'Đang xử lý',
                                'shipped' => 'Đã giao hàng',
                                'delivered' => 'Đã nhận hàng',
                                'cancelled' => 'Đã hủy',
                                default => $state,
                            }),
                        TextEntry::make('payments.payment_method')
                            ->label('Phương thức thanh toán')
                            ->formatStateUsing(fn ($state) => match ($state) {
                                'cod' => 'Thanh toán khi nhận hàng',
                                'paypal' => 'Thanh toán qua VNPay',
                                default => $state ?: 'Không xác định',
                            })
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'cod' => 'success',
                                'paypal' => 'success',
                            })
                            ->default('Không xác định'),
                        TextEntry::make('created_at')->label('Ngày tạo')->dateTime(),
                    ])
                    ->columns(2),
                Section::make('Sản phẩm')
                    ->schema([
                        RepeatableEntry::make('details')
                            ->label('Danh sách sản phẩm')
                            ->schema([
                                ImageEntry::make('product.images')
                                    ->label('Hình ảnh')
                                    ->getStateUsing(function ($record) {
                                        $images = $record->product?->images;
                                        return is_array($images) && !empty($images) ? asset('storage/' . $images[0]) : null;
                                    })
                                    ->width(50)
                                    ->height(50)
                                    ->extraAttributes(['class' => 'rounded-full']),
                                TextEntry::make('product.name')->label('Tên sản phẩm'),
                                TextEntry::make('product.price')->label('Giá sản phẩm')->money('VND'),
                                TextEntry::make('quantity')->label('Số lượng'),
                            ])
                            ->columns(4),
                    ]),
            ]);
    }

    private function translateProvince(?string $code): ?string
    {
        if (!$code) {
            return null;
        }

        $provinces = Cache::remember('provinces', now()->addHours(24), function () {
            return $this->fetchProvinces();
        });

        $province = collect($provinces)->firstWhere('code', $code);
        return $province['name'] ?? $code;
    }

    private function translateDistrict(?string $code): ?string
    {
        if (!$code || !$this->record->province_code) {
            return null;
        }

        $districts = Cache::remember("districts_{$this->record->province_code}", now()->addHours(24), function () {
            return $this->fetchDistricts($this->record->province_code);
        });

        $district = collect($districts)->firstWhere('code', $code);
        return $district['name'] ?? $code;
    }

    private function translateWard(?string $code): ?string
    {
        if (!$code || !$this->record->district_code) {
            return null;
        }

        $wards = Cache::remember("wards_{$this->record->district_code}", now()->addHours(24), function () {
            return $this->fetchWards($this->record->district_code);
        });

        $ward = collect($wards)->firstWhere('code', $code);
        return $ward['name'] ?? $code;
    }

    private function fetchProvinces()
    {
        $response = Http::get('https://provinces.open-api.vn/api/');
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }

    private function fetchDistricts($provinceCode)
    {
        $response = Http::get("https://provinces.open-api.vn/api/p/{$provinceCode}?depth=2");
        if ($response->successful() && isset($response->json()['districts'])) {
            return $response->json()['districts'];
        }
        return [];
    }

    private function fetchWards($districtCode)
    {
        $response = Http::get("https://provinces.open-api.vn/api/d/{$districtCode}?depth=2");
        if ($response->successful() && isset($response->json()['wards'])) {
            return $response->json()['wards'];
        }
        return [];
    }
}
