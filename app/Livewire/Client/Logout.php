<?php

namespace App\Livewire\Client;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        $guard = Auth::getDefaultDriver();

        Auth::guard($guard)->logout();

        if ($guard === 'admin') {
            session()->forget(['auth_guard_admin']);
        } else {
            session()->forget(['auth_guard_user']);
        }

        session()->regenerateToken();

        return redirect()->route('home');
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <a class="dropdown-item" href="#" wire:click.prevent="logout">Đăng xuất</a>
        </div>
        HTML;
    }
}
