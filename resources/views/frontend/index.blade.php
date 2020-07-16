@extends('frontend.master.master')
@section('title','Trang chủ')
@section('content')

	<!-- main -->


	<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/banner-1.jpg);"
			data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">45</h2>
											<span class="sup-1">%</span>
											<span class="sup-2">Off</span>
										</div>
										<h2 class="text-sale">Sale</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Dặt hàng hôm nay,nhận ngay khuyến mãi!</h3>
									<p>Đã có hơn 1000 đơn hàng được gửi đi ở khắp quốc gia.</p>

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
						<h2><span>Sản phẩm Nổi bật</span></h2>
						<p>Đây là những sản phẩm được ưa chuộng nhất năm 2020</p>
					</div>
				</div>
				<div class="row">
					@foreach ($prd_ft as $row)
                        <div class="col-md-3 text-center">
                            <div class="product-entry">
                                <div class="product-img" style="background-image: url(/backend/img/{{ $row->ProImg }});">
                                    <div class="cart">
                                        <p>

                                            <span><a href="/product/{{ $row->ProSlug }}.html"><i class="icon-eye"></i></a></span>


                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="/product/{{ $row->ProSlug }}.html">{{ $row->ProName }}</a></h3>
                                    <p class="price"><span>{{ number_format($row->ProPrice,0,"",",")}} đ</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

				</div>
			</div>
	</div>
	<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm mới</span></h2>
						<p>Đây là những sản phẩm mới của năm năm 2020</p>
					</div>
				</div>

				<div class="row">
					@foreach ($prd_new as $row)
                        <div class="col-md-3 text-center">
                            <div class="product-entry">
                                <div class="product-img" style="background-image: url(/backend/img/{{ $row->ProImg}});">
                                    <p class="tag"><span class="new">New</span></p>
                                    <div class="cart">
                                        <p>

                                            <span><a href="/product/{{ $row->ProSlug }}.html"><i class="icon-eye"></i></a></span>


                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="/product/{{ $row->ProSlug }}.html">{{ $row->ProName}}</a></h3>
                                    <p class="price"><span>{{ number_format($row->ProPrice,0,"",",")}} đ</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

				</div>
			</div>
	</div>
	<!-- end main -->
    <!-- Clients-banner -->
    <div class="banner-5 py-5">
        <div class="container">
            <h2 class="text-center">Ý kiến của khách hàng</h2>
            <h3 class="text-center pb-3">Phản hồi tích cực của khách hàng</h3>
            <div class="row">
                @foreach ($feedback as $row)
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="khung-talk p-5">
                                <div class="talk">
                                    <p class="noi p-3">{{ $row->FeedContent }}</p>
                                    <div class="tamgiac"></div>
                                </div>
                                <div class="card-body d-flex">
                                    <img src="./images/avatar_feedback.png" class="khach ml-3" style="width: 100px; height: auto;" alt="">
                                    <div class="ml-3">
                                        <h3 class="card-text">{{ $row->user->fullname }}</h3>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="row">
                    <div align="right" class="col-md-12">
						{{$feedback->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Clients-banner -->
@endsection

