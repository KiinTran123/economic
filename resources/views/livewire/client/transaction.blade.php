<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">Giao Dịch Của Bạn</h1>
                <p class="lead">Tiết kiệm thời gian và để chúng tôi lo việc mua sắm.</p>
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
                                    <th width="5%"></th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày</th>
                                    <th>Tổng Tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Trạng Thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $index => $order)
                                <tr>
                                    <td class="text-center align-middle">{{ $index + 1 }}</td>

                                    <td class="align-middle">
                                        @if($order->details->isNotEmpty())
                                        <div class="d-flex flex-wrap justify-content-center gap-2">
                                            @foreach($order->details as $detail)
                                            @if($detail->product && $detail->product->images)
                                            @php
                                            $images = $detail->product->images;
                                            $firstImage = is_array($images) ? ($images[0] ?? null) : $images;
                                            @endphp
                                            @if($firstImage)
                                            <img src="{{ asset('storage/' . $firstImage) }}"
                                                alt="{{ $detail->product->name }}"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;"
                                                onerror="this.src='/assets/img/placeholder.jpg';">
                                            @else
                                            <span class="text-muted">Không có hình ảnh</span>
                                            @endif
                                            @else
                                            <span class="text-muted">Không có hình ảnh</span>
                                            @endif
                                            @endforeach
                                        </div>
                                        @else
                                        <span class="text-muted">Không có hình ảnh</span>
                                        @endif
                                    </td>

                                    <!-- Ngày tạo -->
                                    <td class="text-center align-middle">{{ $order->created_at->format('d-m-Y') }}</td>

                                    <!-- Tổng giá -->
                                    <td class="text-center align-middle">{{ number_format($order->total_price, 0, ',', '.') }} VND</td>

                                    <!-- Phương thức thanh toán -->
                                    <td class="text-center align-middle">
                                        {{ $order->payments ? $order->payments->payment_method : 'Chưa thanh toán' }}
                                    </td>

                                    <!-- Trạng thái đơn hàng -->
                                    <td class="text-center align-middle">
                                        @switch($order->status)
                                        @case('pending')
                                        <span class="badge bg-warning text-dark">Chờ xác nhận</span>
                                        @break

                                        @case('processing')
                                        <span class="badge bg-primary">Đang xử lý</span>
                                        @break

                                        @case('shipped')
                                        <span class="badge bg-info text-dark">Đang vận chuyển</span>
                                        @break

                                        @case('delivered')
                                        <span class="badge bg-success">Đã nhận hàng</span>
                                        @break

                                        @case('cancelled')
                                        <span class="badge bg-danger">Đã huỷ</span>
                                        @break

                                        @default
                                        <span class="badge bg-secondary">Không rõ</span>
                                        @endswitch
                                    </td>

                                    <!-- Nút chức năng -->
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            wire:click="showDetails('{{ $order->id }}')">
                                            Chi tiết
                                        </button>

                                        @if($order->status === 'shipped')
                                        <button type="button" class="btn btn-success btn-sm" wire:click="confirmDelivery({{ $order->id }})">
                                            Xác nhận
                                        </button>
                                        @endif

                                        @if($order->status === 'pending')
                                        <button type="button"
                                            class="btn btn-danger btn-sm"
                                            wire:click="confirmCancelled({{ $order->id }})"
                                            onclick="if (! confirm('Bạn có chắc chắn muốn huỷ đơn hàng này không?')) { event.stopImmediatePropagation(); }">
                                            Huỷ đơn hàng
                                        </button>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </section>

    @foreach($orders as $order)
    <div class="modal fade" id="detailModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Số Đơn Hàng: {{ $order->id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <strong>Thông Tin Giao Hàng:</strong><br>
                                {{ $orderAddresses[$order->id]['address_detail'] }}<br>
                                {{ $orderAddresses[$order->id]['ward'] }},
                                {{ $orderAddresses[$order->id]['district'] }},
                                {{ $orderAddresses[$order->id]['city'] }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <strong>Phương Thức Thanh Toán:</strong><br>
                                {{ $order->payments ? $order->payments->payment_method : 'Chưa thanh toán' }}
                            </p>
                            <p>
                                <strong>Thời Gian Thanh Toán:</strong><br>
                                {{ $order->payments && $order->payments->updated_at ? $order->payments->updated_at->format('d-m-Y H:i') : 'Chưa có' }} GMT+7
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Đơn Hàng Của Bạn:</strong></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sản Phẩm</th>
                                            <th class="text-right">Tổng Tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->details as $detail)
                                        <tr>
                                            <td>{{ $detail->product->name }} x{{ $detail->quantity }}</td>
                                            <td class="text-right">{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }} VND</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Tổng Tiền Giỏ Hàng</strong></td>
                                            <td class="text-right">
                                                {{ number_format($order->details->sum(fn($detail) => $detail->price * $detail->quantity), 0, ',', '.') }} VND
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phí Vận Chuyển</strong></td>
                                            <td class="text-right">
                                                {{ number_format($order->total_price - $order->details->sum(fn($detail) => $detail->price * $detail->quantity), 0, ',', '.') }} VND
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>TỔNG ĐƠN HÀNG</strong></td>
                                            <td class="text-right"><strong>{{ number_format($order->total_price, 0, ',', '.') }} VND</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>