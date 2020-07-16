@extends('backend.master.master')
@section('title',"Đơn hàng")
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng / Chi tiết đặt hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đặt hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin khách hàng</div>
												<div class="panel-body">
													<strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> : {{ $order->OrderCustomer }}</strong> <br>
													<strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : Số điện thoại: {{ $order->OrderPhone }}</strong>
													<br>
													<strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : {{ $order->OrderAddress }}</strong>
												</div>
											</div>
										</div>
									</div>


								</div>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Thành tiền</th>

										</tr>
									</thead>
									<tbody>
                                        @foreach ($order->products as $prd)


										<tr>
											<td>{{ $prd->ProID}}</td>
											<td>
												<div class="row">
													<div class="col-md-4">
														<img width="100px" src="img/{{$prd->ProImg}}" class="thumbnail">
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
                                @if ($order->OrderStatus==0)
                                    <div class="alert alert-primary" role="alert" align='right'>
                                        <a onclick="return Proccessed()" class="btn btn-success" href="/admin/order/paid/{{$order->OrderID}}" role="button">Đã xử lý</a>
                                    </div>
                                @endif

							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
@endsection

@section('script')
@parent
    <script>
        function Proccessed()
        {
            return confirm("Bạn có muốn xử lí đơn hàng này?")
        }
    </script>
@endsection
