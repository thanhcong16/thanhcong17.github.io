@extends('frontend.master.master')
@section('title','Trang liên hệ')
@section('content')

	<!-- main -->
	<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h3>Thông tin liên hệ</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location"></i></span> Số 55 Giải Phóng, quận Hai Bà Trưng, Hà Nội, Việt Nam
							    </p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://0988 550 553">0988 550 553</a>
								</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-paperplane"></i></span> <a
										href="mailto:info@yoursite.com">info@yoursite.com</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="#">http://thanhcong.edu.vn</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
                        @if (session('thongbao'))
                            <div class="btn btn-success" role="alert">
                                <strong>{{ session('thongbao')}}</strong>
                            </div>
                        @endif
						<div class="contact-wrap">
							<h3>Liên hệ</h3>
							<form method="post">
                                @csrf
								<div class="row form-group">
									<div class="col-md-12 padding-bottom">
										<label for="fname">Họ & Tên</label>
                                        <input type="text" name="fname" class="form-control" value="{{ $member->fullname }}" placeholder="Họ và tên" disabled>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" name="email" class="form-control" value="{{ $member->email }}" disabled
                                            placeholder="Email của bạn">

									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="subject">Chủ đề</label>
                                        <input type="text" name="subject" class="form-control"  placeholder="Nhập chủ đề">
                                        {!! ShowError($errors,'subject') !!}

									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="message">Lời nhắn</label>
										<textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                            placeholder="Nói gì đó cho chúng tôi"></textarea>
                                        {!! ShowError($errors,'message') !!}

									</div>
								</div>
								<div class="form-group text-center">
									<input type="submit" value="Gửi liên hệ" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
	<div id="map" class="colorlib-map"></div>
	<!-- end main -->
@endsection
@section('script')
	@parent
	<script>
		$(document).ready(function () {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function (e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function (e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>

@endsection
