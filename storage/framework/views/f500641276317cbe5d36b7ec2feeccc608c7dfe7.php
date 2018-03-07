<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('front_end.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slide'); ?>
    <?php echo $__env->make('front_end.layouts.slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
            </div>

            <div class="panel-body">
                <!-- item -->
                <p>
                    Đây là project tin tức của Nguyễn Hữu Phú
                </p>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_end.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>