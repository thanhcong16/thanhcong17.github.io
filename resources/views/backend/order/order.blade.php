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
				<li class="active">Đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn đặt hàng chưa xử lý</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
                                @if (session('thongbao'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>{{ session('thongbao') }}<a href="/admin/order" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
								<a href="/admin/order/processed" class="btn btn-success">Đơn đã xử lý</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Tên khách hàng</th>
											<th>Sđt</th>
											<th>Địa chỉ</th>

											<th width='18%'>Xử lý</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($orders as $row)
                                            <tr>
                                                <td>{{ $row->OrderID }}</td>
                                                <td>{{ $row->OrderCustomer }}</td>
                                                <td>{{ $row->OrderPhone }}</td>
                                                <td>{{ $row->OrderAddress }}</td>
                                                <td>
                                                    <a href="/admin/order/detail/{{ $row->OrderID}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Xử lý</a>
                                                    <a onclick="return Del_Order('{{$row->OrderCustomer}}')" href="/admin/order/del/{{ $row->OrderID}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Xóa</a>

                                                </td>
                                            </tr>
                                        @endforeach


									</tbody>
                                </table>
                                <div align="right">
                                    {{ $orders->links() }}
                                </div>
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
        function Del_Order($name)
        {
            return confirm("Bạn có muốn xóa đơn của khách hàng "+ $name + " ko?");
        }
    </script>
@endsection
