<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Transaction extends Component
{
    public function render()
    {
        return view('livewire.client.Transaction')->layout('components.layouts.app') ->title('Giao dịch');
    }
}
