<?php $__env->startSection('content'); ?>
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Đăng ký tài khoản</div>
            <div class="panel-body">
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
                <?php if(isset($user_login)): ?>
                <form action="nguoidung" method="POST">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div>
                        <label>Họ tên</label>
                        <input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" required minlength="6" value="<?php echo e($user_login->name); ?>">
                    </div>
                    <br>
                    <div>
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" required value="<?php echo e($user_login->email); ?>" disabled
                        >
                    </div>
                    <br>
                    <div>
                        <label>Đổi mật khẩu</label>
                        <input type="checkbox" name="checkboxPassword" onchange="changePassword()" id="checkbox">
                        <label>Nhập mật khẩu</label>
                        <input id="password" type="password" class="form-control" name="password" aria-describedby="basic-addon1" placeholder="password" required minlength="8" disabled>
                    </div>
                    <br>
                    <div>
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" id="passwordAgain" class="form-control" name="passwordAgain" aria-describedby="basic-addon1" placeholder="password" required minlength="8" disabled>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-default">Sửa thông tin
                        </button>

                    </div>

                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function changePassword() {
            if(document.getElementById('checkbox').checked == true){
                document.getElementById('password').removeAttribute('disabled');
                document.getElementById('passwordAgain').removeAttribute('disabled');
            }else{
                document.getElementById('password').setAttribute('disabled','');
                document.getElementById('passwordAgain').setAttribute('disabled','');
            }


        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front_end.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>