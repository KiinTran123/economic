<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public $productsCart;
    public $countProducts;
    public $totalAmount;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function updateCart()
    {
        $this->render();
    }

    public function render()
    {
        $userId = Auth::id();

        $this->productsCart = Cart::where('user_id', $userId)
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->select('cart.*', 'products.name', 'products.price', 'products.images')
            ->get();
        $this->countProducts = $this->productsCart->sum('quantity');

        foreach ($this->productsCart as $cartItem) {
            $cartItem->total = $cartItem->quantity * $cartItem->price;
        }

        // Tính tổng tiền giỏ hàng
        $this->totalAmount = $this->productsCart->sum('total');

        return view('livewire.client.header', ['productsCart' => $this->productsCart, 'countProducts' => $this->countProducts]);
    }
}
