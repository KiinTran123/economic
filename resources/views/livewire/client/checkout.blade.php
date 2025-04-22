<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0"
            style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Thanh Toán
                </h1>
                <p class="lead">
                    Tiết kiệm thời gian và để chúng tôi lo việc mua sắm.
                </p>
            </div>
        </div>
    </div>

    <section id="checkout">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <h5 class="mb-3">THÔNG TIN HÓA ĐƠN</h5>
                    <form wire:submit.prevent="placeOrder" class="bill-detail">
                        <fieldset>
                            <div class="form-group">
                                <input wire:model="name" class="form-control" placeholder="Họ và tên" type="text">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model="email" class="form-control" placeholder="Địa chỉ Email" type="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model="phone" class="form-control" placeholder="Số điện thoại" type="tel">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="province">Tỉnh/Thành phố</label>
                                <select wire:model="selectedProvince" wire:change="updateSelectedProvince"
                                    class="form-control" id="province">
                                    <option value="">Chọn Tỉnh/Thành phố</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province['code'] }}">{{ $province['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('selectedProvince') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="district">Quận/Huyện</label>
                                <select wire:model="selectedDistrict" wire:change="updateSelectedDistrict"
                                    class="form-control" id="district">
                                    <option value="">Chọn Quận/Huyện</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district['code'] }}">{{ $district['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('selectedDistrict') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="ward">Phường/Xã</label>
                                <select wire:model="selectedWard" class="form-control" id="ward">
                                    <option value="">Chọn Phường/Xã</option>
                                    @foreach($wards as $wardOption)
                                        <option value="{{ $wardOption['code'] }}">{{ $wardOption['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('selectedWard') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model="address_detail" class="form-control"
                                    placeholder="Chi tiết địa chỉ (số nhà, tên đường, tòa nhà, tầng, v.v.)" type="text">
                                @error('address_detail') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <h5 class="mb-3">PHƯƠNG THỨC THANH TOÁN</h5>

                            <!-- Thanh toán khi nhận hàng -->
                            <div class="form-check mb-2">
                                <input wire:model="paymentMethod" class="form-check-input" type="radio"
                                    name="paymentMethod" id="cod" value="cod">
                                <label class="form-check-label" for="cod">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>

                            <!-- Thanh toán qua VNPay -->
                            <div class="form-check">
                                <input wire:model="paymentMethod" class="form-check-input" type="radio"
                                    name="paymentMethod" id="vnpay" value="vnpay">
                                <label class="form-check-label" for="vnpay">
                                    Thanh toán qua VNPay
                                </label>
                            </div>
                            
                            @error('paymentMethod') <span class="text-danger">{{ $message }}</span> @enderror
                            <p class="text-right mt-3">
                                <input wire:model="termsAccepted" type="checkbox" id="terms">
                                <label for="terms"> Tôi đã đọc và đồng ý với <a href="#">điều khoản & điều
                                        kiện</a></label>
                                @error('termsAccepted') <span class="text-danger">{{ $message }}</span> @enderror
                            </p>
                            <button type="submit" class="btn btn-primary float-right">TIẾP TỤC THANH TOÁN <i
                                    class="fa fa-check"></i></button>
                            <div class="clearfix"></div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <div class="holder">
                        <h5 class="mb-3">ĐƠN HÀNG CỦA BẠN</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="text-right">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productsCart as $cartItem)
                                        <tr>
                                            <td>
                                                {{ $cartItem->name }} (x{{ $cartItem->quantity }})
                                            </td>
                                            <td class="text-right">
                                                {{ number_format($cartItem->total, 0, ',', '.') }} VNĐ
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <strong>Tổng giỏ hàng</strong>
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($totalAmount, 0, ',', '.') }} VNĐ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Phí vận chuyển</strong>
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($shippingFee, 0, ',', '.') }} VNĐ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>TỔNG ĐƠN HÀNG</strong>
                                        </td>
                                        <td class="text-right">
                                            <strong>{{ number_format($totalAmount + $shippingFee, 0, ',', '.') }}
                                                VNĐ</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
