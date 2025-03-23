@extends('layouts.client.app')

@section('title', 'Trang chủ')

@section('content')
<div>
  <div id="page-content" class="page-content">
    <div class="banner">
      <div class="jumbotron jumbotron-video text-center bg-dark mb-0 rounded-0">
        <video width="100%" preload="auto" loop autoplay muted>
          <source src='assets/media/explore.mp4' type='video/mp4' />
          <source src='assets/media/explore.webm' type='video/webm' />
        </video>
        <div class="container">
          <h1 class="pt-5">
            Tiết kiệm thời gian và để chúng tôi lo việc<br>
            mua sắm thực phẩm.
          </h1>
          <p class="lead">
            Tươi ngon mỗi ngày.
          </p>

          <div class="row">
            <div class="col-md-4">
              <div class="card border-0 text-center">
                <div class="card-icon">
                  <div class="card-icon-i">
                    <i class="fa fa-shopping-basket"></i>
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                    Mua Sắm
                  </h4>
                  <p class="card-text">
                    Chỉ cần nhấp vào sản phẩm bạn muốn và gửi đơn hàng khi bạn đã sẵn sàng.
                  </p>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 text-center">
                <div class="card-icon">
                  <div class="card-icon-i">
                    <i class="fas fa-leaf"></i>
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                    Thu hoạch
                  </h4>
                  <p class="card-text">
                    Đội ngũ của chúng tôi đảm bảo chất lượng sản phẩm đạt tiêu chuẩn và giao hàng đến tận cửa bạn trong vòng 24 giờ sau khi thu hoạch.
                  </p>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 text-center">
                <div class="card-icon">
                  <div class="card-icon-i">
                    <i class="fa fa-truck"></i>
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                    Giao Hàng
                  </h4>
                  <p class="card-text">
                    Nông dân nhận đơn hàng của bạn trước hai ngày để chuẩn bị thu hoạch đúng theo yêu cầu của bạn – không có sản phẩm dư thừa.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section id="why">
      <h2 class="title">Tại sao chọn Freschery</h2>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card border-0 text-center gray-bg">
              <div class="card-icon">
                <div class="card-icon-i text-success">
                  <i class="fas fa-leaf"></i>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title">
                  Trực Tiếp Từ Nông Trại
                </h4>
                <p class="card-text">
                  Khái niệm từ nông trại đến bàn ăn của chúng tôi nhấn mạnh việc đưa sản phẩm tươi ngon trực tiếp từ các nông trại địa phương đến tay bạn trong vòng một ngày, vì vậy bạn có thể yên tâm về chất lượng sản phẩm.
                </p>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 text-center gray-bg">
              <div class="card-icon">
                <div class="card-icon-i text-success">
                  <i class="fa fa-question"></i>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title">
                  Biết Rõ Người Nông Dân Của Bạn
                </h4>
                <p class="card-text">
                  Chúng tôi muốn bạn biết rõ ai là người trồng thực phẩm cho bạn bằng cách hiển thị hồ sơ của các nông dân trên mỗi sản phẩm và trang của nông dân. Bạn có thể đến thăm các trang trại và thấy được tình yêu họ dành cho công việc trồng trọt.
                </p>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 text-center gray-bg">
              <div class="card-icon">
                <div class="card-icon-i text-success">
                  <i class="fas fa-smile"></i>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title">
                  Cải Thiện Đời Sống Nông Dân
                </h4>
                <p class="card-text">
                  Dần dần, bằng cách cắt giảm chuỗi cung ứng phức tạp và hệ thống thực phẩm, chúng tôi hy vọng sẽ cải thiện đời sống của nông dân bằng cách mang lại cho họ những phần thưởng xứng đáng với công sức họ bỏ ra.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-12 mt-5 text-center">
            <a href="shop.html" class="btn btn-primary btn-lg">MUA NGAY</a>
          </div>
        </div>
      </div>
    </section>

    <section id="categories" class="pb-0 gray-bg">
      <h2 class="title">Danh Mục</h2>
      <div class="landing-categories owl-carousel">
        <div class="item">
          <div class="card rounded-0 border-0 text-center">
            <img src="assets/img/vegetables.jpg">
            <div class="card-img-overlay d-flex align-items-center justify-content-center">
              <a href="shop.html" class="btn btn-primary btn-lg">Rau Củ</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card rounded-0 border-0 text-center">
            <img src="assets/img/fruits.jpg">
            <div class="card-img-overlay d-flex align-items-center justify-content-center">
              <a href="shop.html" class="btn btn-primary btn-lg">Trái Cây</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card rounded-0 border-0 text-center">
            <img src="assets/img/meats.jpg">
            <div class="card-img-overlay d-flex align-items-center justify-content-center">
              <a href="shop.html" class="btn btn-primary btn-lg">Thịt</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card rounded-0 border-0 text-center">
            <img src="assets/img/fish.jpg">
            <div class="card-img-overlay d-flex align-items-center justify-content-center">
              <a href="shop.html" class="btn btn-primary btn-lg">Cá</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card rounded-0 border-0 text-center">
            <img src="assets/img/frozen.jpg">
            <div class="card-img-overlay d-flex align-items-center justify-content-center">
              <a href="shop.html" class="btn btn-primary btn-lg">Thực Phẩm Đông Lạnh</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card rounded-0 border-0 text-center">
            <img src="assets/img/package.jpg">
            <div class="card-img-overlay d-flex align-items-center justify-content-center">
              <a href="shop.html" class="btn btn-primary btn-lg">Gói Sản Phẩm</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
