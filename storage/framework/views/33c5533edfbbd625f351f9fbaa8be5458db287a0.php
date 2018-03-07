<?php $__env->startSection('slide'); ?>
    <?php echo $__env->make('front_end.layouts.slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('front_end.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
            </div>

            <div class="panel-body">
                <!-- item -->
                <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if(count($tl->loaitin)>0): ?>
                <div class="row-item row">
                    <h3>
                        <?php echo e($tl->Ten); ?>

                        <?php $__currentLoopData = $tl->loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <small><a href="loaitin/<?php echo e($lt->id); ?>"><i><?php echo e($lt->Ten); ?></i></a>/</small>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h3>
                    <?php
                    $data = $tl -> tintuc ->where('NoiBat','1') ->sortByDesc('created_at') ->take(6);
                    $tin1 = $data ->shift();
                    ?>
                    <div class="col-md-8 border-right">
                        <div class="col-md-5">
                            <a href="tintuc/<?php echo e($tin1->id); ?>">
                                <img class="img-responsive" src="upload/tintuc/<?php echo e($tin1->Hinh); ?>" alt="">
                            </a>
                        </div>

                        <div class="col-md-7">
                            <a href="tintuc/<?php echo e($tin1->id); ?>"><h3><?php echo e($tin1 -> TieuDe); ?></h3></a>
                            <p><?php echo $tin1->TomTat; ?></p>
                            <a class="btn btn-primary" href="tintuc/<?php echo e($tin1->id); ?>">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>

                    </div>


                    <div class="col-md-4">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="tintuc/<?php echo e($tin->id); ?>">
                            <h4>
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <?php echo $tin ->TieuDe; ?>

                            </h4>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="break"></div>
                </div>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- end item -->
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_end.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>