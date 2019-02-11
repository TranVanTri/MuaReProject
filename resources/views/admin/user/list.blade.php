@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản người dùng
                    <small>Danh sách</small>
                    {{-- <small><a href="admin/user/add" class="btn btn-success btn-them"><i class="fa fa-plus"></i> Thêm User</a></small> --}}
                </h1>
                @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                @if(session('loi'))
                <div class="alert alert-danger">{{session('loi')}}</div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            
            <table class="table table-striped table-bordered table-hover table-list" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số ĐT</th>
                        <th>Trạng thái</th>                       
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>                        
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($user as $child)
                    <tr class="odd gradeX" align="center" style="">
                        <td>{{$child->id}}</td>
                        <td>{{$child->name}}</td>
                        <td>{{$child->email}}</td>
                        <td>{{$child->address}}</td>
                        <td>{{$child->phone}}</td>                        
                        @if($child->status == 1)
                            <td style="color: blue"><a style="width: 90px;" class="btn btn-primary" href="admin/user/enable/{{$child->id}}">Hoạt động</a></td>
                        @else
                            <td style="color: red"><a style="width: 90px;" class="btn btn-primary" href="admin/user/enable/{{$child->id}}">Khóa</a></td>
                        @endif                        
                        <td>{{$child->created_at}}</td>
                        <td>{{$child->updated_at}}</td>                     
                        
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$child->id}}">Edit</a></td>
                    </tr> 
                    @endforeach                  
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection