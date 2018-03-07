<?php $__env->startSection('content'); ?>
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
                <?php if( session( 'thongbao' )): ?>
                    <div class="alert-success">
                        <?php echo e(session( 'thongbao' )); ?>

                    </div>
                 <?php elseif( session( 'error' ) ): ?>
                     <script language="javascript"> alert( 'Xóa không thành công' ) </script>
                 <?php endif; ?>

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
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo e($us -> id); ?></td>
                    <td><?php echo e($us -> name); ?></td>
                    <td><?php echo e($us  -> email); ?></td>
                    <td>
                        <?php if( $us -> quyen == 1): ?>
                            <?php echo e("Admin"); ?>

                        <?php else: ?>
                            <?php echo e("Thường"); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($us -> created_at); ?></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/<?php echo e($us -> id); ?>">Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/<?php echo e($us -> id); ?>">Sửa</a></td>
                </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--./Hiển thị danh sách user-->

                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>