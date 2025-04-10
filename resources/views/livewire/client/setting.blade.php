<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">Cài đặt</h1>
                <p class="lead">Cập nhật thông tin tài khoản của bạn</p>
            </div>
        </div>
    </div>

    <section id="checkout">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-6">
                    <h5 class="mb-3">CHI TIẾT TÀI KHOẢN</h5>

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="save" class="bill-detail" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group text-center">
                                <label class="d-block mb-2 font-weight-bold">Avatar hiện tại</label>
                                <img src="{{ asset('storage/' . $currentAvatar) }}" alt="Avatar hiện tại" class="img-thumbnail rounded-circle shadow-sm" style="max-width: 150px; height: 150px; object-fit: cover;">
                            </div>

                            <div class="form-group">
                                <label for="avatar">Cập nhật Avatar</label>
                                <input wire:model="avatar" class="form-control" id="avatar" type="file" accept="image/*">
                                @if ($avatar)
                                    <img src="{{ $avatar->temporaryUrl() }}" width="100" class="mt-2">
                                @endif
                                @error('avatar') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input wire:model="name" class="form-control" id="name" type="text" placeholder="Tên">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input wire:model="email" class="form-control" id="email" type="email" placeholder="Địa chỉ email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input wire:model="phone" class="form-control" id="phone" type="tel" placeholder="Số điện thoại">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="city">Tỉnh/Thành phố</label>
                                <select wire:model="selectedProvince" wire:change="save" class="form-control" id="city">
                                    <option value="">Chọn Tỉnh/Thành phố</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province['code'] }}">{{ $province['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="district">Quận/Huyện</label>
                                <select wire:model="selectedDistrict" wire:change="save" class="form-control" id="district">
                                    <option value="">Chọn Quận/Huyện</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district['code'] }}">{{ $district['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="ward">Phường/Xã</label>
                                <select wire:model="ward" wire:change="save" class="form-control" id="ward">
                                    <option value="">Chọn Phường/Xã</option>
                                    @foreach($wards as $wardOption)
                                        <option value="{{ $wardOption['code'] }}">{{ $wardOption['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('ward') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu mới (để trống nếu không đổi)</label>
                                <input wire:model="password" class="form-control" id="password" type="password" placeholder="Mật khẩu">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Xác nhận mật khẩu</label>
                                <input wire:model="password_confirmation" class="form-control" id="password_confirmation" type="password" placeholder="Xác nhận mật khẩu">
                                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                                <div class="clearfix"></div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
