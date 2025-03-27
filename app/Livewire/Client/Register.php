<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.client.register')->layout('components.layouts.app') ->title('Đăng ký');
    }
}
