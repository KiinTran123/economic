<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Trang Mua Sắm
                </h1>
                <p class="lead">
                    Tiết kiệm thời gian và để chúng tôi lo việc mua sắm cho bạn.
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shop-categories owl-carousel mt-5">
                    @foreach ($categories as $category)
                        <div class="item">
                            <a href="" wire:click="filterByCategory({{ $category->id }})">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2">
                                        <i class="sb-bistro-{{ strtolower(str_replace(' ', '-', $category->name)) }}"></i>
                                    </span>
                                    <div class="media-body">
                                        <h5>{{ $category->name }}</h5>
                                        <p>{{ $category->description ?? 'Sản phẩm từ những người nông dân địa phương' }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <section id="most-wanted">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Sản Phẩm Được Yêu Thích Nhất</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach ($popularProducts as $product)
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
                                        <img src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}" alt="{{ $product->name }}" class="card-img-top" onclick="window.location.href='{{ route('detail-product', $product->id) }}'" style="cursor: pointer;">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="{{ route('detail-product', $product->id) }}">{{ $product->name }}</a></h4>
                                        <div class="card-price">
                                            <span class="discount">{{ number_format($product->price * 1.2, 0, ',', '.') }}đ</span>
                                            <span class="reguler">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                        </div>
                                        <button wire:click="addToCart({{ $product->id }})" class="btn btn-block btn-primary mt-2">
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

    <section id="vegetables" class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Rau Củ</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach ($vegetables as $product)
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">ĐẶC BIỆT</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">Đến năm 20255</span>
                                            <span class="badge badge-primary">Giảm 20%</span>
                                        </div>
                                        <img src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}" alt="{{ $product->name }}" class="card-img-top" onclick="window.location.href='{{ route('detail-product', $product->id) }}'" style="cursor: pointer;">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="{{ route('detail-product', $product->id) }}">{{ $product->name }}</a></h4>
                                        <div class="card-price">
                                            <span class="discount">{{ number_format($product->price * 1.2, 0, ',', '.') }}đ</span>
                                            <span class="reguler">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                        </div>
                                        <button wire:click="addToCart({{ $product->id }})" class="btn btn-block btn-primary mt-2">
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

    <section id="meats">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Thịt</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach ($meats as $product)
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
                                        <img src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}" alt="{{ $product->name }}" class="card-img-top" onclick="window.location.href='{{ route('detail-product', $product->id) }}'" style="cursor: pointer;">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="{{ route('detail-product', $product->id) }}">{{ $product->name }}</a></h4>
                                        <div class="card-price">
                                            <span class="discount">{{ number_format($product->price * 1.2, 0, ',', '.') }}đ</span>
                                            <span class="reguler">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                        </div>
                                        <button wire:click="addToCart({{ $product->id }})" class="btn btn-block btn-primary mt-2">
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

    <section id="fishes" class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Cá</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach ($fishes as $product)
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
                                        <img src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}" alt="{{ $product->name }}" class="card-img-top" onclick="window.location.href='{{ route('detail-product', $product->id) }}'" style="cursor: pointer;">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="{{ route('detail-product', $product->id) }}">{{ $product->name }}</a></h4>
                                        <div class="card-price">
                                            <span class="discount">{{ number_format($product->price * 1.2, 0, ',', '.') }}đ</span>
                                            <span class="reguler">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                        </div>
                                        <button wire:click="addToCart({{ $product->id }})" class="btn btn-block btn-primary mt-2">
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

    <section id="fruits">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Trái Cây</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach ($fruits as $product)
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
                                        <img src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}" alt="{{ $product->name }}" class="card-img-top" onclick="window.location.href='{{ route('detail-product', $product->id) }}'" style="cursor: pointer;">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="{{ route('detail-product', $product->id) }}">{{ $product->name }}</a></h4>
                                        <div class="card-price">
                                            <span class="discount">{{ number_format($product->price * 1.2, 0, ',', '.') }}đ</span>
                                            <span class="reguler">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                        </div>
                                        <button wire:click="addToCart({{ $product->id }})" class="btn btn-block btn-primary mt-2">
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

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: { items: 1 },
                600: { items: 3 },
                1000: { items: 5 }
            }
        });

        Livewire.on('swal:modal', data => {
            Swal.fire({
                icon: data.type,
                title: data.title,
                text: data.text,
                timer: 3000,
                showConfirmButton: false
            });
        });
    });
</script>
@endpush
