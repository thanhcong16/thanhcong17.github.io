@extends('frontend.master.master')
@section('title','Trang chi tiết đơn hàng')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách lịch sử mua hàng</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">

                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Thông tin sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Thành tiền</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $prd)

                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img width="100px" src="/backend/img/{{$prd->ProImg}}" class="thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <p><b>Mã sản phẩm</b>: {{ $prd->ProCode }}</p>
														<p><b>Tên Sản phẩm</b>: {{ $prd->ProName }}</p>
														<p><b>Size</b>: {{ $prd->pivot->OrdSize }}</p>
														<p><b>Số lương</b> : {{ $prd->pivot->OrdQuantity }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($prd->ProPrice,0,"",",") }} đ</td>
                                        <td>{{ number_format($prd->ProPrice * $prd->pivot->OrdQuantity,0,"",",") }} đ</td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width='70%'>
                                            <h4 align='right'>Tổng Tiền :</h4>
                                        </th>
                                        <th>
                                            <h4 align='right' style="color: brown;">{{number_format($total->total,0,"",",")}} đ</h4>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
