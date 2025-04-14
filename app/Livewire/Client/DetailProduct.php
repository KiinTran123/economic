<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class DetailProduct extends Component
{
    public $product;
    public $relatedProducts;
    public $productsCart;
    public $quantity = 1;
    public function updatedQuantity($value)
    {
        if ($value < 1) $this->quantity = 1;
        if ($value > $this->product->quantity) $this->quantity = $this->product->quantity;
    }

    public function addToCart()
    {
        $userId = Auth::id();

        if (!$userId) {
            session()->flash('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
            return;
        }

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $this->product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $this->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id'    => $userId,
                'product_id' => $this->product->id,
                'quantity'   => $this->quantity,
            ]);
        }

        $this->dispatch('cartUpdated');
        session()->flash('success', 'Đã thêm vào giỏ hàng!');
    }
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
