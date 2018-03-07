<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Sửa</small>
                    </h1>
                </div>
                <?php if(count($errors)>0): ?>
                    <div class="alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if(session('thongbao')): ?>
                    <div class="alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('thongbao_error')): ?>
                    <div class="alert-danger">
                        <?php echo e(session('thongbao_error')); ?>

                    </div>
            <?php endif; ?>
            <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/slide/sua/<?php echo e($slide->id); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="ten" placeholder="Nhập tên slide" required maxlength="100" minlength="10" value="<?php echo e($slide->Ten); ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <input class="form-control" name="noiDung" placeholder="Nhập nội dung cho slide" required minlength="10" maxlength="500" value="<?php echo e($slide -> NoiDung); ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input class="form-control" name="link" placeholder="Nhập link cho slide" required minlength="10" maxlength="500" value="<?php echo e($slide -> link); ?>"/>
                        </div>
                        <div class="form-group">
                            <h2>Hình ảnh</h2>
                            <img src="upload/slide/<?php echo e($slide->Hinh); ?>" width="100px" height="100px"/>
                            <input type="file" name="hinh" />
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Nhập lại</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>