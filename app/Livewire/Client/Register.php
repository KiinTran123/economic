<?php

namespace App\Livewire\Client;

use App\Models\User;
use Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $phone, $username, $password, $password_confirmation, $terms;

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|numeric|digits:10|unique:users,phone',
        'username' => 'required|string|max:255|unique:users,username',
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
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => '0',
            'is_active' => true,
        ]);



        // Reset form
        $this->reset();

        session()->flash('success', 'Đăng ký thành công! Vui lòng đăng nhập.');

        return redirect()->route('login')->with('success', 'đăng ký htanfh tônc');
    }
    public function render()
    {
        return view('livewire.client.register')->layout('components.layouts.app') ->title('Đăng ký');
    }
}
