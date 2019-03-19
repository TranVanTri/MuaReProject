@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small>Chỉnh sửa</small>
                </h1>                
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
            </div>
            <form action="admin/category/edit/{{$cateCurrent->id}}" method="POST" id="formCategoryGroup">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">  
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên danh mục mới" required maxlength="100" minlength="3" value="{{$cateCurrent->name}}" />
                    </div>  
                    <div class="form-group">
                        <label>Thuộc danh mục</label>
                        <select class="form-control" name="parent" id="selectCateedit" disabled="">
                            <!-- lấy danh sách các danh mục -->
                            <option

                            @if($cateCurrent->idParent == 0)
                                selected
                            @endif

                             value="0">----------------------</option>
                            @foreach($cateParent as $child)
                            <option


                            @if($child->id == $cateCurrent->idParent)
                                selected
                            @endif

                            value="{{$child->id}}">{{$child->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="enable" value="1"
                            @if($cateCurrent->enable == 1)
                             checked
                             @endif
                             type="radio">Hoạt động
                        </label>
                        <label class="radio-inline">
                            <input name="enable" value="0" 
                            @if($cateCurrent->enable == 0)
                             checked
                             @endif
                            type="radio">Khóa
                        </label>
                    </div>  

                    @if($cateCurrent->idParent == 0)
                        <div class="form-group" id="chonanh">
                            <label>Chọn ảnh</label>                        
                            <input id="ckfinder-input-pro" type="hidden" placeholder="Chọn hình ảnh" required maxlength="190" name="img">
                            <div><img id="img-pro" src="{{$cateCurrent->image}}"  alt="" class="img-edit img-fluid"></div>
                            <div class="input-group-btn">
                              <button id="ckfinder-popup-pro" data-input="ckfinder-input-pro" data-preview="img-pro" class="btn btn-info" type="button">Chọn ảnh</button>
                            </div>         
                                 
                        </div>
                    @endif

                    

                                
                    <button type="submit"  id="submit" class="btn btn-warning">Chỉnh sửa</button>
                                   
                </div>
                
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
