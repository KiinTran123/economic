<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Shop extends Component
{
    public $products;
    public $categories;
    public $popularProducts;
    public $vegetables;
    public $meats;
    public $fishes;
    public $fruits;
    public $selectedCategory = null;
    public $quantity = 1;


    public function addToCart($productId)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $product = Product::find($productId);
            if (!$product) {
                session()->flash('error', 'Sản phẩm không tồn tại.');
                return;
            }

            $existingCartItem = Cart::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existingCartItem) {

                $existingCartItem->increment('quantity', $this->quantity);
            } else {

                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $this->quantity
                ]);
            }

            $this->dispatch('cartUpdated');
            $this->dispatch('showNotification', 'Sản phẩm đã được thêm.', 'success');

        } else {
            $this->dispatch('showNotification', 'Vui lòng đăng nhập.', 'error');

        }
    }


    public function mount($category = null)
    {
        $this->loadData($category);
    }

    public function loadData($categoryId = null)
    {
        $this->categories = Category::all();

        if ($categoryId) {
            $this->selectedCategory = $this->categories->firstWhere('id', $categoryId);
        }

        $products = Product::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        $this->popularProducts = $products->take(10);
        $this->vegetables = $products->where('category_id', 1);
        $this->meats = $products->where('category_id', 2);
        $this->fishes = $products->where('category_id', 3);
        $this->fruits = $products->where('category_id', 4);
    }

    public function filterByCategory($categoryId)
    {
        $this->selectedCategory = Category::find($categoryId);
        $this->loadData($categoryId);
    }


    public function render()
    {
        return view('livewire.client.shop', [
            'categories' => $this->categories,
            'popularProducts' => $this->popularProducts,
            'vegetables' => $this->vegetables,
            'meats' => $this->meats,
            'fishes' => $this->fishes,
            'fruits' => $this->fruits,
            'selectedCategory' => $this->selectedCategory,
        ])->layout('components.layouts.app')->title('Cửa hàng');
    }
}
