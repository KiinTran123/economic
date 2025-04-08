<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Component
{

    public $email;
    public $password;
    public $remember = false;
 // Trong Livewire Component
// Trong Livewire Component
public function login()
{
    $this->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
        session(['auth_guard' => 'web']);
        return redirect()->route('home');
    }

    throw ValidationException::withMessages([
        'email' => 'Email không đúng.',
        'password' => 'Mật khẩu không đúng.',
    ]);
}




    public function render()
    {
        return view('livewire.client.login')->layout('components.layouts.app') ->title('Đăng nhập');
    }
}
