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
        // Tải bài viết từ cơ sở dữ liệu dựa trên ID
        $this->post = Post::findOrFail($postId);

        // Lấy các bài viết liên quan (có thể tùy chỉnh theo yêu cầu)
        $this->relatedPosts = Post::where('id', '!=', $this->postId)
            ->latest()  // Lấy các bài viết mới nhất
            ->take(3)  // Giới hạn số bài viết liên quan
            ->get();
    }

    public function render()
    {
        return view('livewire.client.post-detail');
    }
}
