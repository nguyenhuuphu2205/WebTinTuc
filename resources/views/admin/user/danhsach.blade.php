@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <!-- Hiển thị trạng thái xóa-->
                @if( session( 'thongbao' ))
                    <div class="alert-success">
                        {{session( 'thongbao' )}}
                    </div>
                 @elseif( session( 'error' ) )
                     <script language="javascript"> alert( 'Xóa không thành công' ) </script>
                 @endif

                <tr align="center">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Quyền</th>
                    <th>Ngày tạo</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                <!-- Hiển thị danh sách user -->
                @foreach( $user as $us )
                <tr class="odd gradeX" align="center">
                    <td>{{ $us -> id }}</td>
                    <td>{{ $us -> name }}</td>
                    <td>{{ $us  -> email }}</td>
                    <td>
                        @if( $us -> quyen == 1)
                            {{ "Admin" }}
                        @else
                            {{ "Thường" }}
                        @endif
                    </td>
                    <td>{{ $us -> created_at }}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{ $us -> id }}">Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{ $us -> id }}">Sửa</a></td>
                </tr>
                 @endforeach
                <!--./Hiển thị danh sách user-->

                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection