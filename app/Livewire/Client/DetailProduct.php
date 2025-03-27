<?php

namespace App\Livewire\Client;

use Livewire\Component;

class DetailProduct extends Component
{
    public function render()
    {
        return view('livewire.client.detail-product')->layout('components.layouts.app') ->title('Chi tiết sản phẩm');
    }
}
