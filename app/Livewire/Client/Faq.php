<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        return view('livewire.client.faq')->layout('components.layouts.app') ->title('Câu hỏi thường gặp');
    }
}
