<?php $__env->startSection( 'content' ); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Tin
                    <small>Danh sách</small>
                </h1>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <!--Hiển thị session thông báo-->
                <?php if( session( 'thongbao' ) ): ?>
                        <div class="alert-success">
                            <?php echo e(session( 'thongbao' )); ?>

                        </div>
                    <?php endif; ?>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Thể Loại</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo e($lt->id); ?></td>
                    <td><?php echo e($lt->Ten); ?></td>
                    <td><?php echo e($lt->theloai->Ten); ?></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaitin/xoa/<?php echo e($lt->id); ?>">Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/sua/<?php echo e($lt->id); ?>">Sửa</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'admin.layouts.index' , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>