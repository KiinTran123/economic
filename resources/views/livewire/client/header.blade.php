<div>
  <div class="page-header">
    <!--=============== Thanh điều hướng ===============-->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
      <div class="container">
        <!-- Thương hiệu của Navbar -->
        <a href="{{ route('home') }}" class="navbar-brand">
          <img src="assets/img/logo/logo.png" alt="Logo">
        </a>

        <!-- Nút điều khiển Navbar -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarcollapse">
          <!-- Menu Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('shop') }}" class="nav-link">Cửa hàng</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('about') }}" class="nav-link">Freshcery</a>
            </li>

            <li class="nav-item dropdown">
                @auth
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-header">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar">
                        </div>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('transaction') }}">Lịch sử giao dịch</a>
                        <a class="dropdown-item" href="{{ route('setting') }}">Cài đặt</a>
                        @livewire('client.logout')
                    </div>
                @else
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="guestDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tài khoản
                    </a>
                    <div class="dropdown-menu" aria-labelledby="guestDropdown">
                        <a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a>
                    </div>
                @endauth
            </li>




            <li class="nav-item dropdown">
              <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-shopping-basket"></i> <span class="badge badge-primary">5</span>
              </a>
              <div class="dropdown-menu shopping-cart">
                <ul>
                  <li>
                    <div class="drop-title">Giỏ hàng của bạn</div>
                  </li>
                  <li>
                    <div class="shopping-cart-list">
                      <div class="media">
                        <img class="d-flex mr-3" src="assets/img/logo/avatar.jpg" width="60" alt="Ảnh sản phẩm">
                        <div class="media-body">
                          <h5><a href="javascript:void(0)">Cà rốt</a></h5>
                          <p class="price">
                            <span class="discount text-muted">Rp. 700.000</span>
                            <span>Rp. 100.000</span>
                          </p>
                          <p class="text-muted">Số lượng: 1</p>
                        </div>
                      </div>
                      <div class="media">
                        <img class="d-flex mr-3" src="assets/img/logo/avatar.jpg" width="60" alt="Ảnh sản phẩm">
                        <div class="media-body">
                          <h5><a href="javascript:void(0)">Cà rốt</a></h5>
                          <p class="price">
                            <span class="discount text-muted">Rp. 700.000</span>
                            <span>Rp. 100.000</span>
                          </p>
                          <p class="text-muted">Số lượng: 1</p>
                        </div>
                      </div>
                      <div class="media">
                        <img class="d-flex mr-3" src="assets/img/logo/avatar.jpg" width="60" alt="Ảnh sản phẩm">
                        <div class="media-body">
                          <h5><a href="javascript:void(0)">Cà rốt</a></h5>
                          <p class="price">
                            <span class="discount text-muted">Rp. 700.000</span>
                            <span>Rp. 100.000</span>
                          </p>
                          <p class="text-muted">Số lượng: 1</p>
                        </div>
                      </div>
                      <div class="media">
                        <img class="d-flex mr-3" src="assets/img/logo/avatar.jpg" width="60" alt="Ảnh sản phẩm">
                        <div class="media-body">
                          <h5><a href="javascript:void(0)">Cà rốt</a></h5>
                          <p class="price">
                            <span class="discount text-muted">Rp. 700.000</span>
                            <span>Rp. 100.000</span>
                          </p>
                          <p class="text-muted">Số lượng: 1</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="drop-title d-flex justify-content-between">
                      <span>Tổng cộng:</span>
                      <span class="text-primary"><strong>Rp. 2000.000</strong></span>
                    </div>
                  </li>
                  <li class="d-flex justify-content-between pl-3 pr-3 pt-3">
                    <a href="{{ route('cart') }}" class="btn btn-secondary">Xem giỏ hàng</a>
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Thanh toán</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </nav>
  </div>
</div>
