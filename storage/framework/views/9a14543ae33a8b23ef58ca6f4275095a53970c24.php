<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="trangchu">Website Tin Tức</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="gioithieu">Giới thiệu</a>
                </li>
                <li>
                    <a href="lienhe">Liên hệ</a>
                </li>
            </ul>

            <div class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" id="noiDungTimKiem" onkeypress="timkiemTinTuc()">
                </div>
                <button  class="btn btn-default" id="search" onclick="timkiemTinTuc()">Tìm kiếm</button>
            </div>

            <ul class="nav navbar-nav pull-right">
                <?php if(Auth::check()==false): ?>
                <li>
                    <a href="dangky">Đăng ký</a>
                </li>
                <li>
                    <a href="dangnhap">Đăng nhập</a>
                </li>
                <?php else: ?>
                <li>

                    <a href="nguoidung">
                        <span class ="glyphicon glyphicon-user"></span>
                        <?php echo e(Auth::user()->name); ?>

                    </a>
                </li>

                <li>
                    <a href="dangxuat">Đăng xuất</a>
                </li>
                <?php endif; ?>

            </ul>
        </div>



        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>