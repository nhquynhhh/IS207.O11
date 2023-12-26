@extends('admin.layouts.template')
@section('page_title')
    PING - Oder List
@endsection
@section('content')
    <!-- Contextual Classes -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Danh sách đặt hàng</h4>
        <div class="card">
            <h5 class="card-header">Thông tin danh sách đặt hàng</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Tìm kiếm danh mục" id="searchInput">
                    <button class="btn btn-outline-secondary" type="button" id="searchButton">Tìm kiếm</button>
                    <button class="btn btn-outline-secondary" type="button" id="resetButton">Reset</button>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Lọc theo Trạng thái
                        </button>
                        <div class="dropdown-menu" aria-labelledby="filterDropdown">
                            <a class="dropdown-item" href="{{ route('allorder', ['status' => 'all']) }}">Hiển thị Tất cả</a>
                            <a class="dropdown-item" href="{{ route('allorder', ['status' => 'available']) }}">Chỉ hiển thị
                                Available</a>
                            <a class="dropdown-item" href="{{ route('allorder', ['status' => 'unavailable']) }}">Chỉ hiển
                                thị Unavailable</a>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Số tiền</th>
                            <th>Ngày cập nhật</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($orders as $order)
                            <tr>
                                <td><a href="{{ route('detailorder', $order->orderID) }}">{{ $order->orderID }}</a></td>
                                <td><a href="{{ route('detailorder', $order->orderID) }}">
                                        @foreach ($customerinfos as $customerinfo)
                                            @if ($customerinfo->customerID == $order->customerID)
                                                {{ $customerinfo->customerName }}
                                            @endif
                                        @endforeach
                                    </a>
                                </td>
                                <td><a href="{{ route('detailorder', $order->orderID) }}">{{ $order->orderCreatedDate }}
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    $paymentMethod = $order->paymentMethod;
                                    if ($paymentMethod == 'VNPAY') {
                                        $paymentMethod = 'Thanh toán qua VNPAY';
                                    } elseif ($paymentMethod == 'COD') {
                                        $paymentMethod = 'Thanh toán khi nhận hàng';
                                    } elseif ($paymentMethod == 'MOMO') {
                                        $paymentMethod = 'Thanh toán qua MOMO';
                                    } else {
                                        $paymentMethod = 'Không xác định';
                                    }
                                    ?>
                                    <a href="{{ route('detailorder', $order->orderID) }}">{{ $paymentMethod }}
                                    </a>
                                </td>
                                <td>
                                    @if ($order->orderStatus == 'completed')
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-success badge-dot m-r-10"></div>
                                            <div>Completed</div>
                                        </div>
                                    @elseif($order->orderStatus == 'processing')
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-warning badge-dot m-r-10"></div>
                                            <div>Processing</div>
                                        </div>
                                    @elseif($order->orderStatus == 'pending')
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-info badge-dot m-r-10"></div>
                                            <div>Pending</div>
                                        </div>
                                    @elseif($order->orderStatus == 'canceled')
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-danger badge-dot m-r-10"></div>
                                            <div>Canceled</div>
                                        </div>
                                    @else
                                        <div>Unknown Status</div>
                                    @endif
                                </td>
                                <td>{{ formatCurrency($order->grandPrice) }}</td>
                                <td>{{ $order->orderCompletedDate }}</td>
                            </tr>
                        @endforeach
                        {{ $orders->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Contextual Classes -->
@endsection
@section('customJS')
@endsection
