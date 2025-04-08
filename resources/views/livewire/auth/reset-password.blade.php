<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('assets/img/bg-header.jpg') }}');">
            <div class="container">
                <h1 class="pt-5">Đặt Lại Mật Khẩu</h1>
                <p class="lead">Hãy đặt lại mật khẩu mới cho tài khoản của bạn.</p>

                <div class="card card-login mb-5">
                    <div class="card-body">

                        <form wire:submit.prevent="resetPassword">
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input type="email" wire:model.defer="email" class="form-control" placeholder="Email">
                                    @error('email')
                                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input type="password" wire:model.defer="password" class="form-control" placeholder="Mật khẩu mới">
                                    @error('password')
                                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input type="password" wire:model.defer="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>

                            <div class="form-group row text-center mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block text-uppercase">Đặt lại mật khẩu</button>
                                </div>
                            </div>
                        </form>

                        <div class="form-group row text-center mt-3">
                            <div class="col-md-12">
                                <a href="{{ route('login') }}" class="text-light">← Quay lại đăng nhập</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
