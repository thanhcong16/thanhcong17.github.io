@extends('backend.master.master')
@section('title',"Sản phẩm")
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <form  method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control">
                                               {{GetCategorys($categorys,0,"",$product->CateID)}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input  type="text" name="code" class="form-control" value="{{$product->ProCode}}">
                                            {!! ShowError($errors,'code')!!}
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input  type="text" name="name" class="form-control" value="{{$product->ProName}}">
                                            {!! ShowError($errors,'name')!!}

                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label>Size: </label>

                                                    {{ShowProductSize($size,$product->size)}}
                                                    {!! ShowError($errors,'size')!!}





                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input  type="number" name="price" class="form-control" value="{{$product->ProPrice}}">
                                            {!! ShowError($errors,'price')!!}

                                        </div>
                                        <div class="form-group">
                                            <label>Sản phẩm có nổi bật</label>
                                            <select  name="featured" class="form-control">
                                                <option @if ($product->ProFeatured == 0) selected @endif value="0">Không</option>
                                                <option @if ($product->ProFeatured == 1) selected @endif value="1">Có</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select  name="status" class="form-control">
                                                <option @if ($product->ProStatus == 1) selected @endif value="1">Còn hàng</option>
                                                <option @if ($product->ProStatus == 0) selected @endif value="0">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            {!! ShowError($errors,'img')!!}

                                            <input id="img" type="file" name="img"  class="form-control hidden"
                                                onchange="changeImg(this)">
                                            <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/{{$product->ProImg}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thông tin</label>
                                            <textarea  name="info" style="width: 100%;height: 100px;">{{$product->ProInfo}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <button class="btn btn-success" name="edit-product" type="submit">Sửa sản phẩm</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                    </div>
                                </form>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>
@endsection

@section('script')
    @parent
    <script>
        function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });

    </script>
@endsection
