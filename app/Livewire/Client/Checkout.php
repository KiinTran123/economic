<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.client.checkout')->layout('components.layouts.app') ->title('Hóa đơn');
    }
}
