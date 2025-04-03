<?php

namespace App\Livewire\Client;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $phone, $password, $password_confirmation, $terms;

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|numeric|digits:10|unique:users,phone',
        'password' => 'required|min:6|confirmed',
        'terms' => 'accepted',
    ];

    public function register()
    {

        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'role' => '0',
            'is_active' => true,
        ]);

        $this->reset();

        session()->flash('success', 'Đăng ký thành công! Vui lòng đăng nhập.');

        return redirect()->route('login')->with('success', 'đăng ký thành công');
    }
    public function render()
    {
        return view('livewire.client.register')->layout('components.layouts.app') ->title('Đăng ký');
    }
}
