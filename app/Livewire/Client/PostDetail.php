<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Post;

class PostDetail extends Component
{
    public $postId;  // ID của bài viết

    public $post;
    public $relatedPosts;

    public function mount($postId)
    {
        $this->post = Post::findOrFail($postId);

        $this->relatedPosts = Post::where('id', '!=', $this->postId)
            ->latest() 
            ->take(3) 
            ->get();
    }

    public function render()
    {
        return view('livewire.client.post-detail');
    }
}
