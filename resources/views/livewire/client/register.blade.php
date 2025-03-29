<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0"
            style="background-image: url('assets/img/bg-header.jpg')">
            <div class="container">
                <h1 class="pt-5">Trang Đăng Ký</h1>
                <p class="lead">Tiết kiệm thời gian và để chúng tôi lo việc mua sắm thực phẩm cho bạn.</p>

                <div class="card card-login mb-5">
                    <div class="card-body">
                        <form wire:submit.prevent="register" class="form-horizontal">
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Họ và Tên" wire:model="name" />
                                    @error('name')
                                        <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" type="email" placeholder="Email" wire:model="email" />
                                    @error('email')
                                        <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" type="tel" placeholder="Số điện thoại"
                                        wire:model="phone" />
                                        @error('phone')
                                        <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Tên người dùng"
                                        wire:model="Fullname" />
                                    @error('Fullname')
                                        <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" placeholder="Mật khẩu"
                                        wire:model="password" />
                                        @error('password')
                                        <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" placeholder="Xác nhận mật khẩu"
                                        wire:model="password_confirmation" />
                                        @error('password_confirmation')
                                        <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <input id="checkbox0" type="checkbox" wire:model="terms" />
                                        <label for="checkbox0" class="mb-0">Tôi đồng ý với
                                            <a href="terms.html" class="text-light">Điều khoản & Điều kiện</a>
                                        </label>
                                        @error('terms') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row text-center mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
