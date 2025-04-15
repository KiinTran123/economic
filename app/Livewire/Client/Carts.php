<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class Carts extends Component
{
    public $productsCart;
    public $totalAmount;




    public function increaseQuantity($cartId)
    {
        $cartItem = Cart::find($cartId);

        if ($cartItem && $cartItem->user_id == Auth::id()) {
            $cartItem->quantity += 1;
            $cartItem->save();
            $this->productsCart = Cart::where('user_id', Auth::id())
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->select('cart.*', 'products.name', 'products.price', 'products.images')
                ->get();
        }
        $this->dispatch('cartUpdated');


        $this->dispatch('swal:toast', [
            'type' => 'success',
            'message' => 'Cập nhật thành công'
        ]);


    }


    public function decreaseQuantity($cartId)
    {
        $cartItem = Cart::find($cartId);

        if ($cartItem && $cartItem->user_id == Auth::id()) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
            $this->productsCart = Cart::where('user_id', Auth::id())
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->select('cart.*', 'products.name', 'products.price', 'products.images')
                ->get();

            $this->dispatch('cartUpdated');

            // Gửi thông báo thành công hoặc thông báo sản phẩm đã bị xóa
            if ($cartItem->quantity > 0) {
                $this->dispatch('swal:toast', [
                    'type' => 'success',
                    'message' => 'Đã giảm số lượng sản phẩm trong giỏ hàng!'
                ]);
            } else {
                $this->dispatch('swal:toast', [
                    'type' => 'error',
                    'message' => 'Sản phẩm đã bị xóa khỏi giỏ hàng!'
                ]);
            }
        }
    }




    public function removeFromCart($cartId)
    {
        $cartItem = Cart::find($cartId);

        if ($cartItem && $cartItem->user_id == Auth::id()) {
            $cartItem->delete();
            $this->productsCart = Cart::where('user_id', Auth::id())
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->select('cart.*', 'products.name', 'products.price', 'products.images')
                ->get();
        }
        $this->dispatch('swal:toast', [
            'type' => 'error',
            'message' => 'Sản phẩm đã bị xóa khỏi giỏ hàng!'
        ]);
        $this->dispatch('cartUpdated');
    }

    public function checkout()
    {
        // Kiểm tra nếu giỏ hàng không rỗng
        if ($this->productsCart->isEmpty()) {
            session()->flash('error', 'Giỏ hàng của bạn đang trống!');
            return;
        }

        // Chuyển hướng đến trang thanh toán
        return redirect()->route('checkout');
    }
    public function render()
    {
        $userId = Auth::id();

        $this->productsCart = Cart::where('user_id', $userId)
            ->join('products', 'cart.product_id', '=', 'products.id') // JOIN bảng 'products' với bảng 'cart'
            ->select('cart.*', 'products.name', 'products.price', 'products.images') // Chọn các trường cần thiết
            ->get();

        foreach ($this->productsCart as $cartItem) {
            $cartItem->total = $cartItem->quantity * $cartItem->price;
        }

        $this->totalAmount = $this->productsCart->sum('total');


        return view('livewire.client.carts', ['productsCart' => $this->productsCart])->layout('components.layouts.app')->title('Giỏ hàng');
    }
}
