@extends('frontend.master.master')
@section('title','Trang chi tiết sản phẩm')
@section('content')
	<!-- main -->
	<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(/backend/img/{{$prd->ProImg}});">

										</div>

									</div>
								</div>
								<div class="col-md-7">
									<form action="/cart/add" method="get">

										<div class="desc">
                                            <h3>{{ $prd->ProName }}</h3>
											<span>Mã sản phẩm: </span><b style="color: #252a2b">{{ $prd->ProCode}}</b>

											<p class="price">
												<span>{{ number_format($prd->ProPrice,0,"",",") }} đ</span>
                                            </p>
											<p>THÔNG TIN</p>
											<p style="text-align: justify;">
												{{ $prd->ProInfo}}

                                            </p>
                                            <p>Kích thước sản phẩm hiện còn</p>

                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach ($prd_size as $row)
                                                    <label class="btn btn-primary size">{{$row->SizeType}}
                                                        <input type="radio" name="size" value="{{$row->SizeType}}" autocomplete="off">

                                                    </label>
                                                    @endforeach
                                                    {!! ShowError($errors,'size') !!}

                                                </div>

                                            <p>Số lượng</p>


											<div class="row row-pb-sm">
												<div class="col-md-4">
													<div class="input-group">
														<span class="input-group-btn">
															<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
																<i class="icon-minus2"></i>
															</button>
														</span>
														<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
														<span class="input-group-btn">
															<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
																<i class="icon-plus2"></i>
															</button>
														</span>
													</div>
												</div>
											</div>
											<input type="hidden" name="id_product" value="{{ $prd->ProID }}">
											<p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ hàng</button></p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
	</div>

	<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Mới</span></h2>
					</div>
				</div>
				<div class="row">
					@foreach ($prd_new as $row)
                        <div class="col-md-3 text-center">
                            <div class="product-entry">
                                <div class="product-img" style="background-image: url(/backend/img/{{$row->ProImg}});">
                                    <div class="cart">
                                        <p>

                                            <span><a href="/product/{{ $row->ProSlug }}.html"><i class="icon-eye"></i></a></span>


                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="/product/{{ $row->ProSlug }}.html">{{$row->ProName}}</a></h3>
                                    <p class="price"><span>{{ number_format($row->ProPrice,0,"",",")}} đ</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

				</div>
			</div>
	</div>
	<!-- end main -->
@endsection

@section('script')
	@parent
	<script>
		var quantity=1;
		$('.quantity-right-plus').click(function () {
			var quantity = parseInt($('#quantity').val());
			$('#quantity').val(quantity + 1);
		});

		$('.quantity-left-minus').click(function (e) {
			var quantity = parseInt($('#quantity').val());
				if (quantity > 1) {
					$('#quantity').val(quantity - 1);
				}
		});
	</script>
@endsection
