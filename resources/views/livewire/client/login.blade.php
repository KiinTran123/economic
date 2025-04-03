<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">Trang Đăng Nhập</h1>
                <p class="lead">Tiết kiệm thời gian và để chúng tôi lo việc mua sắm.</p>

                <div class="card card-login mb-5">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form class="form-horizontal" wire:submit.prevent="login">
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" type="email" placeholder="Email" wire:model="email">
                                    @error('email') <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" placeholder="Mật khẩu" wire:model="password">
                                    @error('password') <div class="alert alert-danger d-flex align-items-center mt-2 p-2" role="alert">
                                            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $message }}
                                        </div> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 d-flex justify-content-between align-items-center">
                                    <div class="checkbox">
                                        <input id="checkbox0" type="checkbox" wire:model="remember">
                                        <label for="checkbox0" class="mb-0"> Nhớ tôi? </label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="text-light"><i class="fa fa-bell"></i> Quên mật khẩu?</a>
                                </div>
                            </div>
                            <div class="form-group row text-center mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
