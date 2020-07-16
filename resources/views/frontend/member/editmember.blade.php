@extends('frontend.master.master')
@section('title','Thông tin tài khoản')
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
                            <div class="panel-name">Thông tin tài khoản</div>
                            <div class="panel-body">
                                <form role="form" method="POST">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                            {!! ShowError($errors,'email') !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input type="full" name="fullname" class="form-control" value="{{$user->fullname}}">
                                            {!! ShowError($errors,'fullname') !!}

                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="address" name="address" class="form-control" value="{{$user->address}}">
                                            {!! ShowError($errors,'address') !!}

                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="phone" name="phone" class="form-control" value="{{$user->phone}}">
                                            {!! ShowError($errors,'phone') !!}

                                        </div>

                                        <button type="submit" class="btn btn-primary">Thay đổi thông tin</button>
                                        <a href="/" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Hủy</a>


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

