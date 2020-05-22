@extends('backend.master.master')
@section('title',"Quản lí thành viên")
@section('content')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if (session('thongbao'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>{{session('thongbao')}}<a href="/admin/user" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
								<a href="/admin/user/add" class="btn btn-primary">Thêm Thành viên</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Email</th>
											<th>Họ tên</th>
											<th width="20%">Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>Cấp quyền</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($user as $row)

										<tr>
											<td>{{$row->id}}</td>
											<td>{{$row->email}}</td>
											<td>{{$row->fullname}}</td>
											<td>{{$row->address}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>
                                                @if ($row->level==2)
                                                    <b>Admin</b>
                                                @else
                                                    <b>Member</b>
                                                @endif
                                            </td>
											<td>
												<a href="/admin/user/edit/{{$row->id}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return Del_User('{{$row->fullname}}')" href="/admin/user/del/{{$row->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
                                        </tr>
                                        @endforeach
									</tbody>
								</table>
								<div align='right'>
									{{$user->links()}}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->

			</div>
		</div>

	</div>
	<!--end main-->
@endsection

@section('script')
@parent
    <script>
        function Del_User($name)
        {
            return confirm("Bạn có muốn xóa thành viên \" " +$name + " \" không?");
        }
    </script>
@endsection
