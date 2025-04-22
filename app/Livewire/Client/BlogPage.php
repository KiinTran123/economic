<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Post;


class BlogPage extends Component
{

    public function render()
    {
        $posts = Post::latest()->paginate(6);
        return view('livewire.client.blog-page', compact('posts'));
    }
}
