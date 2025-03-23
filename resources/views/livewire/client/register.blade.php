@extends('layouts.client.app') 
@section('title', 'Đăng ký')

@section('content')
<div id="page-content" class="page-content">
    <div class="banner">
        <div
            class="jumbotron jumbotron-bg text-center rounded-0"
            style="background-image: url('assets/img/bg-header.jpg')">
            <div class="container">
                <h1 class="pt-5">Trang Đăng Ký</h1>
                <p class="lead">Tiết kiệm thời gian và để chúng tôi lo việc mua sắm thực phẩm cho bạn.</p>

                <div class="card card-login mb-5">
                    <div class="card-body">
                        <form class="form-horizontal" action="index.html">
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        required=""
                                        placeholder="Họ và Tên" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input
                                        class="form-control"
                                        type="email"
                                        required=""
                                        placeholder="Email" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input
                                        class="form-control"
                                        type="phone"
                                        required=""
                                        placeholder="Số điện thoại" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        required=""
                                        placeholder="Tên người dùng" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input
                                        class="form-control"
                                        type="password"
                                        required=""
                                        placeholder="Mật khẩu" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input
                                        class="form-control"
                                        type="password"
                                        required=""
                                        placeholder="Xác nhận mật khẩu" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <input
                                            id="checkbox0"
                                            type="checkbox"
                                            name="terms" />
                                        <label for="checkbox0" class="mb-0">Tôi đồng ý với
                                            <a
                                                href="terms.html"
                                                class="text-light">Điều khoản & Điều kiện</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row text-center mt-4">
                                <div class="col-md-12">
                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-block text-uppercase">
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
@endsection
