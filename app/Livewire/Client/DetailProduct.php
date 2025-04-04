<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;

class DetailProduct extends Component
{
    public $product;
    public $relatedProducts;

    public function mount($id)
    {
        $this->product = Product::with('category')->findOrFail($id);
        $this->relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->take(4)
            ->get();

    }

    public function render()
    {
        return view('livewire.client.detail-product', [
            'product' => $this->product,
            'relatedProducts' => $this->relatedProducts,
        ])->layout('components.layouts.app')->title('Chi tiết sản phẩm');
    }
}
