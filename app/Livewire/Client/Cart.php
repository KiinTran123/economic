<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        return view('livewire.client.cart')->layout('components.layouts.app') ->title('Giỏ hàng');
    }
}
