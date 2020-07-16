@extends('frontend.master.master')
@section('title','Đổi mật khẩu')
@section('content')
    <!-- main -->
    <div id="colorlib-contact">
            <div class="container menu-login">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            @if (session('thongbao'))
                                <div class="btn btn-success" role="alert">
                                    <strong>{{ session('thongbao')}}</strong>
                                </div>
                            @endif
                            <div class="panel-name">Thay đổi mật khẩu</div>
                            <div class="panel-body">
                                <form role="form" method="Post">
                                    @csrf

                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Mật khẩu cũ" name="password1" type="password" value="">
                                            {!! ShowError($errors,'password1') !!}
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Mật khẩu mới" name="password2" type="password" value="">
                                            {!! ShowError($errors,'password2') !!}

                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Nhập lại mật khẩu mới" name="password3" type="password" value="">
                                            {!! ShowError($errors,'password3') !!}

                                        </div>

                                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>


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
