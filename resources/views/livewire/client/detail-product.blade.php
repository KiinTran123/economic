<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    {{ $product->name }}
                </h1>
                <p class="lead">
                    Tiết kiệm thời gian và để chúng tôi lo việc mua sắm.
                </p>
            </div>
        </div>
    </div>

    <div class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="slider-zoom">
                        <a href="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                            <img alt="Chi tiết hình ảnh phóng to" src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}" style="width: 100%;">
                        </a>
                    </div>

                    <div class="slider-thumbnail">
                        <ul class="d-flex flex-wrap p-0 list-unstyled">
                            @foreach ($product->images ?? ['default.jpg'] as $image)
                                <li>
                                    <a href="{{ asset('storage/' . $image) }}" rel="gallerySwitchOnMouseOver: true, popupWin:'{{ asset('storage/' . $image) }}', useZoom: 'cloudZoom', smallImage: '{{ asset('storage/' . $image) }}'" class="cloud-zoom-gallery">
                                        <img itemprop="image" src="{{ asset('storage/' . $image) }}" style="width:135px;">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6">
                    <p>
                        <strong>Tổng quan</strong><br>
                        {!! nl2br(htmlspecialchars_decode(e($product->description))) !!}
                    </p>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <strong>Giá</strong><br>
                                <span class="price">{{ number_format($product->price * 0.8 , 0, ',', '.') }}đ</span>
                                <span class="old-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                            </p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p>
                                <span class="stock available">Còn hàng: {{ $product->quantity }}</span>
                            </p>
                        </div>
                    </div>

                    <p class="mb-1">
                        <strong>Số lượng</strong>
                    </p>
                    <div class="row">
                        <div class="col-sm-5">
                            <input class="vertical-spin" type="number" min="1" max="{{ $product->quantity }}" value="1" name="quantity">
                        </div>
                        <div class="col-sm-6"><span class="pt-1 d-inline-block">Gói ({{ $product->unit ?? '250 gram' }})</span></div>
                    </div>

                    <button class="mt-3 btn btn-primary btn-lg" onclick="addToCart({{ $product->id }})">
                        <i class="fa fa-shopping-basket"></i> Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section id="related-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Sản phẩm liên quan</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">ĐẶC BIỆT</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">Đến năm 2023</span>
                                            <span class="badge badge-primary">Giảm 20%</span>
                                        </div>
                                        <img src="{{ asset('storage/' . ($relatedProduct->images[0] ?? 'default.jpg')) }}" alt="{{ $relatedProduct->name }}" class="card-img-top" onclick="window.location.href='{{ route('detail-product', $relatedProduct->id) }}'" style="cursor: pointer;">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="{{ route('detail-product', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a></h4>
                                        <div class="card-price">
                                            <span class="discount">{{ number_format($relatedProduct->price * 1.2, 0, ',', '.') }}đ</span>
                                            <span class="reguler">{{ number_format($relatedProduct->price, 0, ',', '.') }}đ</span>
                                        </div>
                                        <button wire:click="addToCart({{ $relatedProduct->id }})" class="btn btn-block btn-primary mt-2">
                                            Thêm vào Giỏ Hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


