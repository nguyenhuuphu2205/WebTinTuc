<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <!-- Hiển thị lỗi -->
                    <?php if( count($errors ) ): ?>
                        <div class="alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <!-- Hiển thị thông báo thêm thành công -->
                    <?php if( session( 'thongbao' ) ): ?>
                        <div class="alert-success">
                            <?php echo e(session( 'thongbao' )); ?>

                        </div>
                    <?php endif; ?>
                    <!------------------------------>
                    <form action="admin/user/them" method="POST">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input class="form-control" name="ten" placeholder="Nhập họ và tên" required />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Nhập email" type="email" required/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" placeholder="Nhập password" type="password" required />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại password</label>
                            <input class="form-control" name="passwordAgain" placeholder="Nhập lại password" type="password" required />
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="quyen" value="0" checked="" type="radio">Người dùng thường
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="1" type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Nhập lại</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>