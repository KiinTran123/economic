<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.client.contact')->layout('components.layouts.app') ->title('Liên hệ');
    }
}
