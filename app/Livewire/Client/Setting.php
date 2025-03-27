<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Setting extends Component
{
    public function render()
    {
        return view('livewire.client.setting')->layout('components.layouts.app') ->title('Cài đặt');
    }
}
