<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Terms extends Component
{
    public function render()
    {
        return view('livewire.client.terms')->layout('layouts.client.app');
    }
}
