<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('../assets/img/bg-header.jpg') }}');">
            <div class="container">
                <h1 class="pt-5">Quên Mật Khẩu</h1>
                <p class="lead">Nhập email để nhận liên kết đặt lại mật khẩu.</p>

                <div class="card card-login mb-5">
                    <div class="card-body">
                    @if ($status)
                            <div class="alert alert-success animate__animated animate__fadeInDown" style="font-size: 1.2rem; font-weight: bold;">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ $status }}
                            </div>
                        @endif


                        <form class="form-horizontal" wire:submit.prevent="sendResetLink">
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" type="email" placeholder="Email của bạn" wire:model.defer="email">
                                    @error('email')
                                        <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row text-center mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                        Gửi liên kết đặt lại mật khẩu
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row text-center mt-3">
                                <div class="col-md-12">
                                    <a href="{{ route('login') }}" class="text-light">← Quay lại trang đăng nhập</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
