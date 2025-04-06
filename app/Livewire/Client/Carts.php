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
        }
        $this->dispatch('cartUpdated');
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

        $this->dispatch('cartUpdated');
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
