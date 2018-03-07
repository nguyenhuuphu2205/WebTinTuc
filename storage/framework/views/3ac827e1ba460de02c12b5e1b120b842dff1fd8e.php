<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Danh sách</small>
                </h1>
                <?php if(session('thongbao')=="Xóa thành công"): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('thongbao')=='Xóa không thành công'): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tiêu Đề</th>
                    <th>Tóm tắt</th>
                    <th>Nội dung</th>
                    <th>Nội bật</th>
                    <th>Số lượt xem</th>
                    <th>Loại tin</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $tintucs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tintuc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo e($tintuc->id); ?></td>
                    <td><?php echo e($tintuc->TieuDe); ?><br><img src="upload/tintuc/<?php echo e($tintuc->Hinh); ?>" width="200" height="100"/></td>
                    <td><?php echo $tintuc->TomTat; ?></td>
                    <td><?php echo $tintuc->NoiDung; ?></td>
                    <td>
                        <?php if($tintuc->NoiBat ==1): ?>
                            <?php echo e("Có"); ?>

                        <?php else: ?>
                            <?php echo e("Không"); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($tintuc->SoLuotXem); ?></td>
                    <td><?php echo e($tintuc->loaitin->Ten); ?></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/<?php echo e($tintuc->id); ?>">Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/<?php echo e($tintuc->id); ?>">Sửa</a></td>
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