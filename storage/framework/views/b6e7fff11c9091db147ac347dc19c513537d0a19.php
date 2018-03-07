<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Tin
                    <small>Sửa</small>
                </h1>
            </div>
            <!--Hiển thị session thành công-->
            <?php if( session( 'thongbao' ) ): ?>
                <div class="alert-success">
                    <?php echo e(session( 'thongbao' )); ?>

                </div>
            <?php endif; ?>
            <!------------------------------>
            <!--Hiển thị các lỗi-->
            <?php if( count( $errors ) > 0 ): ?>
                <div class="alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-------------------->
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/loaitin/sua/<?php echo e($loaitin -> id); ?>" method="POST">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" required name="sltTheLoai">
                            <!--Hiển thị danh sách thể loại-->
                            <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tl -> id); ?>"
                            <?php if( $tl -> id == $loaitin -> idTheLoai ): ?>
                                <?php echo e(" selected "); ?>

                            <?php endif; ?>
                            ><?php echo e($tl -> Ten); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!--./Hiển thị danh sách thể loại-->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại tin</label>
                        <input class="form-control" name="Ten" placeholder="Nhập tên thể loại" value="<?php echo e($loaitin -> Ten); ?>" required/>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
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