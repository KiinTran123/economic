<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Shop extends Component
{
    public function render()
    {
        return view('livewire.client.shop')->layout('components.layouts.app') ->title('Cửa hàng');
    }
}
