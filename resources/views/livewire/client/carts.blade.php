<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Giỏ Hàng Của Bạn
                </h1>
                <p class="lead">
                    Tiết kiệm thời gian và để chúng tôi lo việc mua sắm.
                </p>
            </div>
        </div>
    </div>

    <section id="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th width="15%">Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productsCart as $cartItem)
                                <tr>
                                    <td>
                                        <img src="{{ asset(!empty($cartItem->product->images[0]) ? 'storage/' . $cartItem->product->images[0] : 'assets/img/fish.jpg') }}" width="60" alt="Ảnh sản phẩm">
                                    </td>


                                    <td>
                                        {{ $cartItem->name }}<br>
                                        <small>1000g</small>
                                    </td>
                                    <td>
                                        {{ $cartItem->price }} Vnd
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <button type="button" class="btn btn-primary" wire:click="decreaseQuantity({{ $cartItem->id }})">-</button>
                                            <input type="text" class="form-control text-center" value="{{ $cartItem->quantity }}" readonly>
                                            <button type="button" class="btn btn-primary" wire:click="increaseQuantity({{ $cartItem->id }})">+</button>
                                        </div>

                                    </td>
                                    <td>
                                        {{ number_format($cartItem->total, 0, ',', '.') }} Vnd
                                    </td>
                                    <td>
                                        <a wire:click="removeFromCart({{ $cartItem->id }})" href="javasript:void" class="text-danger"><i class="fa fa-times"></i></a>
                                    </td>


                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <a href=" {{ route('shop') }}" class="btn btn-default">Tiếp tục mua sắm</a>
                </div>
                <div class="col text-right">
                    <div class="input-group w-50 float-right">
                        <input class="form-control" placeholder="Mã giảm giá" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-default" type="button">Áp dụng</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <h6 class="mt-3">Tổng cộng: {{ number_format($totalAmount, 0, ',', '.') }} VND </h6>
                    <a href="checkout.html" class="btn btn-lg btn-primary">Thanh toán <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>