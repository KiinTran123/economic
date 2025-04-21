<?php
namespace App\Livewire\Client;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class VNPayCallback extends Component
{
    public $vnp_TxnRef;
    public $vnp_ResponseCode;
    public $vnp_SecureHash;
    public $vnp_TransactionNo;
    public $message;
    public $type;

    public function mount()
    {
        // Get all query parameters from the request
        $inputData = request()->all();
        $vnp_HashSecret = env('VNPAY_HASH_SECRET');
        $this->vnp_TxnRef = $inputData['vnp_TxnRef'] ?? null;
        $this->vnp_ResponseCode = $inputData['vnp_ResponseCode'] ?? null;
        $this->vnp_SecureHash = $inputData['vnp_SecureHash'] ?? null;
        $this->vnp_TransactionNo = $inputData['vnp_TransactionNo'] ?? null;

        // Remove vnp_SecureHash from input data for checksum verification
        unset($inputData['vnp_SecureHash']);

        // Generate checksum to verify the response
        ksort($inputData);
        $hashData = '';
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashData .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // Extract order ID from vnp_TxnRef (format: order_id_timestamp)
        $txnRefParts = explode('_', $this->vnp_TxnRef);
        $orderId = $txnRefParts[0];

        $order = Order::find($orderId);
        $payment = Payment::where('order_id', $orderId)->where('transaction_id', $this->vnp_TxnRef)->first();


        if (!$order || !$payment) {
            $this->type = 'error';
            $this->message = 'Đơn hàng không tồn tại.';
            return;
        }


        if ($secureHash === $this->vnp_SecureHash) {
            if ($this->vnp_ResponseCode == '00') {
                // Payment successful
                $order->update(['status' => 'pending']);
                $payment->update([
                    'status' => 'completed',
                    'transaction_id' => $this->vnp_TransactionNo,
                ]);

                // Clear cart
                Cart::where('user_id', Auth::id())->delete();

                $this->type = 'success';
                $this->message = 'Thanh toán thành công! Cảm ơn bạn đã đặt hàng.';
            } else {
                // Payment failed
                $order->update(['status' => 'failed']);
                $payment->update(['status' => 'failed']);

                $this->type = 'error';
                $this->message = 'Thanh toán thất bại. Vui lòng thử lại.';
            }
        } else {
            $order->update(['status' => 'failed']);
            $payment->update(['status' => 'failed']);

            $this->type = 'error';
            $this->message = 'Lỗi xác thực thanh toán. Vui lòng liên hệ hỗ trợ.';
        }

        $this->dispatch('swal:toast', [
            'type' => $this->type,
            'message' => $this->message,
        ]);

    }

    public function render()
    {
        // Redirect to home after processing
        return view('livewire.client.vnpay-callback')->layout('components.layouts.app');
    }
}
