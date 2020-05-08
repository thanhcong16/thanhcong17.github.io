@extends('frontend.master.master')
@section('title','Đăng kí tài khoản')
@section('content')

    <!-- main -->
    <div id="colorlib-contact">
            <div class="container menu-login">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            @if (session('thongbao'))
                                <div class="btn btn-success" role="button">
                                <strong>{{ session('thongbao')}}</strong>
                                </div>
                            @endif
                            <div class="panel-heading">Đăng kí tài khoản</div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control">
                                            {!! ShowError($errors,'email') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>password</label>
                                            <input type="password" name="password" class="form-control">
                                            {!! ShowError($errors,'password') !!}

                                        </div>
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input type="full" name="fullname" class="form-control">
                                            {!! ShowError($errors,'fullname') !!}

                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="address" name="address" class="form-control">
                                            {!! ShowError($errors,'address') !!}

                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="phone" name="phone" class="form-control">
                                            {!! ShowError($errors,'phone') !!}

                                        </div>


                                        <button class="btn btn-primary"  type="submit">Đăng kí tài khoản</button>
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
