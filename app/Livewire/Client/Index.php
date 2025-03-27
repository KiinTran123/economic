<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Index extends Component
{

    public $layout = 'layouts.client.app';

    public function render()
    {
        return view('livewire.client.index')->layout('components.layouts.app') ->title('Trang chủ');
    }
}
