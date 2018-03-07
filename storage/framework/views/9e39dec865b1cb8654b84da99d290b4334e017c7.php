<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('front_end.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-9 ">
        <div class="panel panel-default ">
            <div class="panel-heading" style="background-color:#337AB7; color:white;">
                <h4><b><?php echo e($loaitin->Ten); ?></b></h4>
            </div>
            <?php $__currentLoopData = $tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row-item row">
                <div class="col-md-3">

                    <a href="tintuc/<?php echo e($tin->id); ?>">
                        <br>
                        <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/<?php echo e($tin->Hinh); ?>" alt="">
                    </a>
                </div>

                <div class="col-md-9">
                    <h3><?php echo $tin->TieuDe; ?></h3>
                    <p><?php echo $tin->TomTat; ?></p>
                    <a class="btn btn-primary" href="tintuc/<?php echo e($tin->id); ?>">Xem chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div class="break"></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($tintuc ->links()); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_end.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>