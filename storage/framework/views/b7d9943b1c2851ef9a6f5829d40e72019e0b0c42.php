<?php $__env->startSection('content'); ?>
    <div class="row carousel-holder">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">Đăng nhập</div>
                <div class="panel-body">
                    <?php if(count($errors)>0): ?>
                        <div class="alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="dangnhap" method="POST">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" required
                            >
                        </div>
                        <br>
                        <div >
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="password" required minlength="8">
                        </div>
                        <br>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-default" style="text-align: center;width: 340px"  >Đăng nhập
                            </button>

                            <a href="auth/facebook" class="form-control" style="text-align: center;">Facebook Login</a>

                            <a href="auth/google" class="form-control" style="text-align: center;">Google Login</a>

                            <?php if(session('thongbao_error')): ?>
                                <div class="alert-danger">
                                    <?php echo e(session('thongbao_error')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_end.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>