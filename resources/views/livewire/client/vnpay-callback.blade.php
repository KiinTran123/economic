<div class="container d-flex justify-content-center align-items-center min-vh-100" style="padding-top: 200px; padding-bottom: 100px;">
    <div class="card shadow-lg p-4 payment-result-card {{ $type }} text-center">
        <!-- Icon hiển thị trạng thái -->
        @if ($type === 'success')
            <div class="payment-icon text-success mb-3">
                <i class="bi bi-check-circle-fill" style="font-size: 4rem;"></i>
            </div>
        @else
            <div class="payment-icon text-danger mb-3">
                <i class="bi bi-exclamation-circle-fill" style="font-size: 4rem;"></i>
            </div>
        @endif

        <!-- Tiêu đề -->
        <h1 class="card-title fw-bold mb-3">Kết Quả Thanh Toán</h1>

        <!-- Thông báo -->
        @if ($message)
            <p class="card-text text-muted mb-4">{{ $message }}</p>
        @else
            <p class="card-text text-muted mb-4">Đang xử lý thanh toán...</p>
        @endif

        <!-- Nút quay lại trang chủ -->
        <a href="{{ route('home') }}" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
            <i class="bi bi-house-door-fill"></i> Quay lại trang chủ
        </a>
    </div>
</div>


