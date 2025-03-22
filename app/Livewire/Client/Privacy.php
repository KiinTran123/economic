<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Privacy extends Component
{
    public function render()
    {
        return view('livewire.client.privacy')->layout('layouts.client.app');
    }
}
