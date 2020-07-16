@extends('frontend.master.master')
@section('title','Trang giao dịch')
@section('content')
	<!-- main -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách lịch sử mua hàng</div>
                    <div style="color: red">Chú ý: bạn chỉ có thể xóa đơn hàng trong vòng 1 tiếng kể từ khi bạn tiến hành đặt hàng</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            @if (session('thongbao'))
                                <div class="btn btn-success" role="alert">
                                    <strong>{{ session('thongbao')}}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">

                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>Đơn hàng số</th>
                                            <th>Họ tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Ngày mua</th>
                                            <th>Trạng thái</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $row)

                                        <tr>
                                            <td>{{ $row->OrderID}}</td>
                                            <td>{{ $row->OrderCustomer}}</td>
                                            <td>{{ $row->OrderPhone}}</td>
                                            <td>{{ $row->OrderAddress}}</td>

                                            <td>{{ $row->created_at}}</td>
                                            <td>
                                                @if ( $row->OrderStatus == 0)
                                                    Chưa giao dịch
                                                @else
                                                    Đã giao dịch
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/history/detail-product/{{ $row->OrderID}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>Xem chi tiết</a>
                                                @if ($now->diffInMinutes($row->created_at) <=60)
                                                <a onclick="return Del_Order('{{$row->OrderID}}')" href="/history/del/{{$row->OrderID}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Xóa</a>

                                                @endif

                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                            <div align='right'>
                                {{ $order->links() }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main -->

@endsection
@section('script')
@parent
    <script>
        function Del_Order($number)
        {
            return confirm("Bạn có muốn xóa đơn đặt hàng số "+ $number + " ko?");
        }
    </script>
@endsection
