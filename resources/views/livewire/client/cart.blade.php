@extends('layouts.client.app')

@section('title', 'Giỏ hàng')

@section('content')
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
                                <tr>
                                    <td>
                                        <img src="assets/img/fish.jpg" width="60">
                                    </td>
                                    <td>
                                        Cá tươi<br>
                                        <small>1000g</small>
                                    </td>
                                    <td>
                                        Rp 30.000
                                    </td>
                                    <td>
                                        <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="" name="vertical-spin">
                                    </td>
                                    <td>
                                        Rp 30.000
                                    </td>
                                    <td>
                                        <a href="javasript:void" class="text-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="assets/img/meats.jpg" width="60">
                                    </td>
                                    <td>
                                        Bít tết<br>
                                        <small>1000g</small>
                                    </td>
                                    <td>
                                        Rp 120.000
                                    </td>
                                    <td>
                                        <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="" name="vertical-spin">
                                    </td>
                                    <td>
                                        Rp 120.000
                                    </td>
                                    <td>
                                        <a href="javasript:void" class="text-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="assets/img/vegetables.jpg" width="60">
                                    </td>
                                    <td>
                                        Rau củ trộn<br>
                                        <small>1000g</small>
                                    </td>
                                    <td>
                                        Rp 30.000
                                    </td>
                                    <td>
                                        <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="" name="vertical-spin">
                                    </td>
                                    <td>
                                        Rp 30.000
                                    </td>
                                    <td>
                                        <a href="javasript:void" class="text-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <a href="shop.html" class="btn btn-default">Tiếp tục mua sắm</a>
                </div>
                <div class="col text-right">
                    <div class="input-group w-50 float-right">
                        <input class="form-control" placeholder="Mã giảm giá" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-default" type="button">Áp dụng</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <h6 class="mt-3">Tổng cộng: Rp 180.000</h6>
                    <a href="checkout.html" class="btn btn-lg btn-primary">Thanh toán <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
