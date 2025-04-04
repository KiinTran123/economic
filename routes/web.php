<?php

use App\Livewire\Client\Index;
use App\Livewire\Client\About;
use App\Livewire\Client\Cart;
use App\Livewire\Client\Checkout;
use App\Livewire\Client\Contact;
use App\Livewire\Client\DetailProduct;
use App\Livewire\Client\Faq;
use App\Livewire\Client\Login;
use App\Livewire\Client\Privacy;
use App\Livewire\Client\Register;
use App\Livewire\Client\Setting;
use App\Livewire\Client\Shop;
use App\Livewire\Client\Terms;
use App\Livewire\Client\Transaction;
use Illuminate\Support\Facades\Route;

// Route công khai (không cần đăng nhập)
Route::get('/', Index::class)->name('home');

Route::get('/gioi-thieu', About::class)->name('about');

Route::get('/lien-he', Contact::class)->name('contact');

Route::get('/chi-tiet-san-pham/{id}', DetailProduct::class)->name('detail-product');

Route::get('/cau-hoi-thuong-gap', Faq::class)->name('faq');

Route::get('/dang-nhap', Login::class)->name('login')->middleware('guest:web');

Route::get('/bao-mat', Privacy::class)->name('privacy');

Route::get('/dang-ky', Register::class)->name('register')->middleware('guest:web');

Route::get('/cua-hang', Shop::class)->name('shop');

Route::get('/dieu-khoan', Terms::class)->name('terms');

Route::get('/forgot-password', function () {

    return view('auth.forgot-password');

})->middleware('guest:web')->name('password.request');

Route::get('/gio-hang', Cart::class)->name('cart');

Route::get('/thanh-toan', Checkout::class)->name('checkout');

Route::get('/cai-dat', Setting::class)->name('setting');

Route::get('/giao-dich', Transaction::class)->name('transaction');

