<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i=0; ?>
                <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($i); ?>"
                <?php if($i==0): ?>
                class="active">
                <?php endif; ?>
                </li>

                 <?php $i++; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ol>
            <div class="carousel-inner">
                <?php $i=0; ?>
                <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                        <?php if($i==0): ?>
                        class="item active"
                        <?php else: ?>
                        class="item"
                        <?php endif; ?>
                    >
                        <a> <img class="slide-image" src="upload/slide/<?php echo e($sl->Hinh); ?>" alt="" style="height: 300px; width: 1000px"></a>
                 <?php $i++; ?>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>