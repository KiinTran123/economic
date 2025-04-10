<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Client\Index;
use App\Livewire\Client\About;
use App\Livewire\Client\Carts;
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

Route::get('/gio-hang', Carts::class)->name('cart');

Route::get('/thanh-toan', Checkout::class)->name('checkout');

Route::get('/cai-dat', Setting::class)->name('setting');

Route::get('/giao-dich', Transaction::class)->name('transaction');

Route::get('/forgot-password', ForgotPassword::class)->name('password.request');


Route::get('/reset-password/{token}', ResetPassword::class)
    ->middleware('guest')
    ->name('password.reset');


Route::get('/api/suggestions/{type}', function (Request $request, $type) {
        $query = $request->query('query');
        $apiKey = env('GOONG_API_KEY');

        if (!$apiKey) {
            return response()->json(['error' => 'API key not set'], 500);
        }

        $url = "https://rsapi.goong.io/Place/AutoComplete?input=" . urlencode($query) . "&api_key=" . $apiKey;

        try {
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if ($data && $data['status'] == 'OK') {
                $suggestions = [];
                foreach ($data['predictions'] as $prediction) {
                    $suggestions[] = $prediction['description'];
                }
                return response()->json($suggestions);
            } else {
                return response()->json([], 200); // Trả về mảng rỗng nếu không có gợi ý
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Trả về lỗi nếu có lỗi xảy ra trong quá trình gọi API
        }
    });
