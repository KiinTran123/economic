<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public $productsCart;
    public $countProducts;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function updateCart()
    {
        $this->render();
    }

    public function render()
    {
        $userId = Auth::id();

        $this->productsCart = Cart::where('user_id', $userId)->get();
        $this->countProducts = $this->productsCart->sum('quantity');


        return view('livewire.client.header', ['productsCart' => $this->productsCart, 'countProducts' => $this->countProducts]);
    }
}
