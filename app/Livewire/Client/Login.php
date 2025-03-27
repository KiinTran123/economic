<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.client.login')->layout('components.layouts.app') ->title('Đăng nhập');
    }
}
