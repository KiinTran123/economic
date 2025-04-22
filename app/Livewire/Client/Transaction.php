<?php

namespace App\Livewire\Client;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class Transaction extends Component
{
    use WithPagination;
    public $product;
    public $selectedOrderId;
    public $order;



    public function showDetails($orderId)
    {
        $this->selectedOrderId = $orderId;
        $this->dispatch('show-modal', id: "detailModal{$orderId}");
    }

    private function getProvinceNameByCode($provinceCode)
    {
        if (!$provinceCode)
            return 'Tỉnh/Thành phố không xác định';

        $response = Http::get("https://provinces.open-api.vn/api/p/{$provinceCode}");
        if ($response->successful()) {
            return $response->json()['name'] ?? 'Tỉnh/Thành phố không xác định';
        }

        return 'Tỉnh/Thành phố không xác định';
    }

    private function getDistrictNameByCode($districtCode, $provinceCode)
    {
        if (!$districtCode || !$provinceCode)
            return 'Quận/Huyện không xác định';

        $response = Http::get("https://provinces.open-api.vn/api/p/{$provinceCode}?depth=2");
        if ($response->successful()) {
            $districts = $response->json()['districts'] ?? [];
            foreach ($districts as $district) {
                if ($district['code'] == $districtCode) {
                    return $district['name'];
                }
            }
        }

        return 'Quận/Huyện không xác định';
    }

    private function getWardNameByCode($wardCode, $districtCode)
    {
        if (!$wardCode || !$districtCode)
            return 'Phường/Xã không xác định';

        $response = Http::get("https://provinces.open-api.vn/api/d/{$districtCode}?depth=2");
        if ($response->successful()) {
            $wards = $response->json()['wards'] ?? [];
            foreach ($wards as $ward) {
                if ($ward['code'] == $wardCode) {
                    return $ward['name'];
                }
            }
        }

        return 'Phường/Xã không xác định';
    }

    public function confirmDelivery($orderId)
    {
        // Load order + items + product
        $order = Order::with('details.product')->findOrFail($orderId);

        if ($order->user_id !== auth()->id()) {
            $this->addError('error', 'Bạn không có quyền xác nhận đơn hàng này.');
            return;
        }

        if ($order->status !== 'shipped') {
            $this->addError('error', 'Đơn hàng không ở trạng thái đã giao hàng.');
            return;
        }

        $order->update(['status' => 'delivered']);

        foreach ($order->details as $item) {
            $product = $item->product;
            if ($product) {
                $newQuantity = $product->quantity - $item->quantity;
                if ($newQuantity < 0) {
                    $this->addError('error', "Sản phẩm {$product->name} không đủ số lượng trong kho.");
                    return;
                }
                $product->update(['quantity' => $newQuantity]);
            }
        }






        if ($order->payments && $order->payments->payment_method === 'cod') {
            $order->payments->update(['status' => 'completed']);
        }

        $this->dispatch('swal:toast', [
            'type' => 'success',
            'message' => 'Đã xác nhận nhận hàng thành công!'
        ]);

    }



    public function confirmCancelled($orderId)
    {
        // Tìm đơn hàng
        $order = Order::findOrFail($orderId);

        if ($order->user_id !== auth()->id()) {
            $this->addError('error', 'Bạn không có quyền xác nhận đơn hàng này.');
            return;
        }

        if ($order->status !== 'pending') {
            $this->addError('error', 'Đơn hàng không ở trạng thái đã giao hàng.');
            return;
        }

        $order->update(['status' => 'cancelled']);


        $this->dispatch('swal:toast', [
            'type' => 'success',
            'message' => 'Đã xác nhận nhận huỷ đơn hàng thành công!'
        ]);

    }

    public function render()
    {
        $orders = Order::with(['details.product', 'payments'])
            ->where('user_id', auth()->id())
            ->paginate(10);
        // Prepare address for each order
        $orderAddresses = [];
        foreach ($orders as $order) {
            $orderAddresses[$order->id] = [
                'address_detail' => $order->address_detail,
                'city' => $this->getProvinceNameByCode($order->province_code),
                'district' => $this->getDistrictNameByCode($order->district_code, $order->province_code),
                'ward' => $this->getWardNameByCode($order->ward_code, $order->district_code),
            ];
        }

        return view('livewire.client.transaction', [
            'orders' => $orders,
            'orderAddresses' => $orderAddresses,
        ])
            ->layout('components.layouts.app')
            ->title('Giao dịch');
    }
}
