<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="/"><img src="images/logo.png" alt="" style="width: 200px;height: 50px;object-fit: fill;"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="{{SetActive(['/'])}}"><a href="/">Trang chủ</a></li>
								<li class="has-dropdown {{SetActive(['product*'])}}">
									<a href="/product">Sản phẩm</a>

                                </li>
                                @if (Auth::check() && Auth::user()->level ==2)
                                    <li><a href="/admin">Quản lí</a></li>
                                @endif

                                <li class="{{SetActive(['contact*'])}}"><a href="/contact">Liên hệ</a></li>
                                <li class="has-dropdown {{SetActive(['login*'])}} {{SetActive(['member*'])}}">
                                    <a href="@if (Auth::check())
                                                    /member/info-edit
                                            @else
                                                    /login
                                            @endif">
                                        @if (Auth::check())
                                            {{Auth::user()->fullname}}
                                        @else
                                            Tài khoản
                                        @endif
                                    </a>
                                    @if (Auth::check())

                                        <ul class="dropdown">
                                            <li ><a href="/member/info-edit">Thông tin cá nhân</a></li>
                                            <li><a href="/member/editpassword/info-edit">Đổi mật khẩu</a></li>
                                            <li><a href="/history">Lịch sử giao dịch</a></li>
                                            <li><a href="/member/logout/info-edit">Đăng xuất</a></li>

                                        </ul>
                                    @else
                                        <ul class="dropdown">
                                            <li><a href="/login">Đăng nhập </a></li>

                                            <li><a href="/account">Đăng kí </a></li>


                                        </ul>
                                    @endif

								</li>
								<li class="{{SetActive(['cart*'])}}"><a href="/cart"><i class="icon-shopping-cart"></i> Giỏ hàng [{{ Cart::count() }}]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/bg-03.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Sale</h1>
											<h2 class="head-3">45%</h2>
											<p class="category"><span>Mẫu thiết kế chuyên nghiệp</span></p>
											<p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/bg-01.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Sale</h1>
											<h2 class="head-3">45%</h2>
											<p class="category"><span>Mẫu thiết kế chuyên nghiệp</span></p>
											<p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/bg-02.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Sale</h1>
											<h2 class="head-3">45%</h2>
											<p class="category"><span>Mẫu thiết kế chuyên nghiệp</span></p>
											<p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
