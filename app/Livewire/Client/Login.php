<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Login extends Component
{

 // Trong Livewire Component
// Trong Livewire Component
public function login()
{
    session()->flash('success', 'Đăng nhập thành công!');
    $this->emit('show-alert');
}
    public function render()
    {
        return view('livewire.client.login')->layout('components.layouts.app') ->title('Đăng nhập');
    }
}
