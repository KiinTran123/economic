<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email;
    public $status;

    protected $rules = [
        'email' => 'required|email'
    ];

    public function sendResetLink()
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            $this->status = "Liên kết đặt lại mật khẩu đã được gửi đến email của bạn.";
            session()->flash('success', 'Liên kết đặt lại mật khẩu đã được gửi đến email của bạn.');
        } else {
            $this->addError('email', 'Không tìm thấy tài khoản với email này.');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('components.layouts.app');
    }
}

