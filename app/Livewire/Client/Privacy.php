<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Privacy extends Component
{
    public function render()
    {
        return view('livewire.client.privacy')->layout('components.layouts.app') ->title('Chính sách');
    }
}
