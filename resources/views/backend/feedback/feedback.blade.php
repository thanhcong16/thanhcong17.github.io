@extends('backend.master.master')
@section('title',"Quản lí phản hồi")
@section('content')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách phản hồi</li>
			</ol>
        </div>
        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách phản hồi</h1>
			</div>
        </div>

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
                                    </svg>{{session('thongbao')}}<a href="/admin/feedback" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                @endif

								<table class="table table-bordered" style="margin-top:20px;">

									<thead>

										<tr class="bg-primary">
                                            <th>ID</th>
                                            <th width='20%'>Họ & Tên</th>
                                            <th width='20%'>Email</th>
                                            <th>Chủ đề</th>
                                            <th>Nội dung</th>


                                            <th width='15%'>Tùy chọn</th>
                                        </tr>
									</thead>
                                    <tbody>
                                        @foreach ($fb as $row)

                                        <tr>
                                            <td>{{ $row->FeedID }}</td>
                                            <td>{{ $row->user->fullname }}</td>
                                            <td>{{ $row->user->email }}</td>
                                            <td>{{ $row->FeedTitle }}</td>
                                            <td>{{ $row->FeedContent }}</td>

                                            <td>
                                                @if ($row->FeedStatus == 0)
                                                    <a href="/admin/feedback/{{$row->FeedID}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Hiển thị</a>
                                                @else
                                                    <a href="/admin/feedback/{{$row->FeedID}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Ẩn</a>
                                                @endif
                                                <a onclick="return Del_Feed()" href="/admin/feedback/del/{{$row->FeedID}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
								</table>
								<div align='right'>
                                    {{ $fb->links() }}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>

				<!--/.row-->
		</div>
	</div>

@endsection
@section('script')
@parent
    <script>
        function Del_Feed(){
            return confirm("Bạn có muốn xóa phản hồi này không?");
        }
    </script>
@endsection
