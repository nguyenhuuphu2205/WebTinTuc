<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Danh sách</small>
                </h1>
            </div>
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                    <th>Link</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo e($sl->id); ?></td>
                    <td><?php echo e($sl->Ten); ?></td>
                    <td>
                        <img src="upload/slide/<?php echo e($sl->Hinh); ?>" width="100px" height="100px"/>
                    </td>
                    <td><?php echo e($sl->NoiDung); ?></td>
                    <td><?php echo e($sl->link); ?></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/<?php echo e($sl->id); ?>"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/<?php echo e($sl->id); ?>">Sửa</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>