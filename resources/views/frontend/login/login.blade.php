@extends('frontend.master.master')
@section('title','Trang đăng nhập')
@section('content')

    <!-- main -->
    <div id="colorlib-contact">
            <div class="container menu-login">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-name">Đăng nhập</div>
                            <div class="panel-body">
                                @if (session("thongbao"))
                                    <div class="alert alert-danger" role="alert">
                                    <strong>{{session("thongbao")}}</strong>
                                    </div>
                                @endif
                                <form role="form" method="POST">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{old('email')}}">
                                            {!! ShowError($errors,'email')!!}

                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                            {!! ShowError($errors,'password')!!}

                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                        <br>
                                        <span class="pl-2">Bạn chưa có tài khoản?</span>
                                        <a href="/account" >Đăng kí tài khoản</a>

                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
            <!-- /.row -->
    </div>
    <!-- end main -->
@endsection




