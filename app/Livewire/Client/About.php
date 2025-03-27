<?php

namespace App\Livewire\Client;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.client.about')->layout('components.layouts.app') ->title('Giới thiệu');
    }
}
