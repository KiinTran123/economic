<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;

class Checkout extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $address_detail = '';
    public $orderNotes = '';
    public $paymentMethod = 'cod';
    public $termsAccepted = false;
    public $productsCart = [];
    public $totalAmount = 0;
    public $shippingFee = 0;
    public $provinces = [];
    public $districts = [];
    public $wards = [];
    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $selectedWard = null;

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'selectedProvince' => 'required|string|max:100',
        'selectedDistrict' => 'required|string|max:100',
        'selectedWard' => 'required|string|max:100',
        'address_detail' => 'nullable|string|max:500',
        'termsAccepted' => 'accepted',
        'paymentMethod' => 'required|in:cod,vnpay',
    ];

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->address_detail = $user->address_detail ?? '';
            $this->selectedProvince = $user->city ?? null;
            $this->selectedDistrict = $user->address ?? null;
            $this->selectedWard = $user->ward ?? null;

            $this->provinces = $this->fetchProvinces();

            if ($this->selectedProvince) {
                $this->districts = $this->fetchDistricts($this->selectedProvince);
            }

            if ($this->selectedDistrict) {
                $this->wards = $this->fetchWards($this->selectedDistrict);
            }

            $this->loadCart();
            $this->calculateShippingFee();
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }
    }

    public function loadCart()
    {
        $this->productsCart = Cart::where('user_id', Auth::id())
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->select('cart.*', 'products.name', 'products.price', 'products.images')
            ->get();

        foreach ($this->productsCart as $cartItem) {
            $cartItem->total = $cartItem->quantity * $cartItem->price;
        }

        $this->totalAmount = $this->productsCart->sum('total');
    }

    public function updateSelectedProvince()
    {
        $this->districts = $this->fetchDistricts($this->selectedProvince);
        $this->selectedDistrict = null;
        $this->wards = [];
        $this->selectedWard = null;
        $this->loadCart();
        $this->calculateShippingFee();
    }

    public function updateSelectedDistrict()
    {
        $this->wards = $this->fetchWards($this->selectedDistrict);
        $this->selectedWard = null;
        $this->loadCart();
        $this->calculateShippingFee();
    }

    public function updatedSelectedWard()
    {
        $this->calculateShippingFee();
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

    public function calculateShippingFee()
    {
        if (!$this->selectedProvince) {
            $this->shippingFee = 0;
            return;
        }

        if ($this->totalAmount >= 500000) {
            $this->shippingFee = 0;
            return;
        }

        $hanoiCode = '01';
        $hcmCode = '79';
        $canthocode = '92';

        if (in_array($this->selectedProvince, [$hanoiCode, $hcmCode, $canthocode])) {
            $this->shippingFee = 15000;
        } else {
            $this->shippingFee = 30000;
        }

        $innerCityDistricts = ['001', '002', '003'];
        if ($this->selectedDistrict && in_array($this->selectedDistrict, $innerCityDistricts)) {
            $this->shippingFee -= 5000;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function placeOrder()
    {
        $this->validate();
        $this->loadCart();

        if ($this->productsCart->isEmpty()) {
            $this->dispatch('swal:toast', [
                'type' => 'error',
                'message' => 'Giỏ hàng của bạn đang trống!'
            ]);
            return;
        }

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $this->totalAmount + $this->shippingFee,
            'status' => 'pending',
            'province_code' => $this->selectedProvince,
            'district_code' => $this->selectedDistrict,
            'ward_code' => $this->selectedWard,
            'address_detail' => $this->address_detail,
        ]);

        // Create order details
        foreach ($this->productsCart as $cartItem) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
            ]);
        }

        // Handle payment based on method
        if ($this->paymentMethod === 'cod') {
            // COD Payment
            Payment::create([
                'order_id' => $order->id,
                'user_id' => Auth::id(),
                'amount' => $this->totalAmount + $this->shippingFee,
                'payment_method' => 'cod',
                'status' => 'pending',
            ]);

            // Update user information
            $user = Auth::user();
            $user->update([
                'name' => trim($this->name),
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->selectedDistrict,
                'city' => $this->selectedProvince,
                'ward' => $this->selectedWard,
                'address_detail' => $this->address_detail,
            ]);

            // Clear cart
            Cart::where('user_id', Auth::id())->delete();

            $this->dispatch('swal:toast', [
                'type' => 'success',
                'message' => 'Đặt hàng thành công!'
            ]);

            return redirect()->route('home')->with('success', 'Cảm ơn bạn đã đặt hàng!');
        } elseif ($this->paymentMethod === 'vnpay') {
            // VNPay Payment
            $vnp_TmnCode = env('VNPAY_TMN_CODE');
            $vnp_HashSecret = env('VNPAY_HASH_SECRET');
            $vnp_Url = env('VNPAY_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
            $vnp_ReturnUrl = route('vnpay-callback');

            $vnp_TxnRef = $order->id . '_' . time();
            $vnp_Amount = ($this->totalAmount + $this->shippingFee) * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = request()->ip();

            $inputData = [
                'vnp_Version' => '2.1.0',
                'vnp_TmnCode' => $vnp_TmnCode,
                'vnp_Amount' => $vnp_Amount,
                'vnp_Command' => 'pay',
                'vnp_CreateDate' => now()->setTimezone('Asia/Ho_Chi_Minh')->format('YmdHis'),
                'vnp_CurrCode' => 'VND',
                'vnp_IpAddr' => $vnp_IpAddr,
                'vnp_Locale' => $vnp_Locale,
                'vnp_OrderInfo' => 'Thanh toan don hang ' . $order->id,
                'vnp_OrderType' => 'topup',
                'vnp_ReturnUrl' => $vnp_ReturnUrl,
                'vnp_TxnRef' => $vnp_TxnRef,
                'vnp_BankCode' => $vnp_BankCode
            ];

            if ($vnp_BankCode !== '') {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = '';
            $i = 0;
            $hashdata = '';
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . '=' . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . '=' . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . '=' . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . '?' . $query;
            if ($vnp_HashSecret) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            // Save payment record
            Payment::create([
                'order_id' => $order->id,
                'user_id' => Auth::id(),
                'amount' => $this->totalAmount + $this->shippingFee,
                'payment_method' => 'paypal',
                'status' => 'pending',
                'transaction_id' => $vnp_TxnRef,
            ]);


            return redirect()->away($vnp_Url);
        }
    }

    public function render()
    {
        return view('livewire.client.checkout', [
            'productsCart' => $this->productsCart,
            'totalAmount' => $this->totalAmount,
            'shippingFee' => $this->shippingFee,
            'provinces' => $this->provinces,
            'districts' => $this->districts,
            'wards' => $this->wards,
        ])->layout('components.layouts.app')->title('Thanh Toán');
    }
}
