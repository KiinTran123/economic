<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $message;
    public $type;
    public $show = false;

    protected $listeners = ['showNotification' => 'showNotification'];

    // Hiển thị thông báo
    public function showNotification($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
        $this->show = true;

        // Gửi sự kiện hideNotification sau 5 giây
        $this->dispatch('hideNotification', 5);
    }

    // Ẩn thông báo
    public function hideNotification()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
