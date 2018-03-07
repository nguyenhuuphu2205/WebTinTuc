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
                <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
            </div>

            <div class="panel-body">
                <!-- item -->
                <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>

                <div class="break"></div>
                <h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                <p>Đại Học Bách Khoa Hà Nội </p>

                <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                <p>nguyenhuuphu2205@gmail.com </p>

                <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                <p>01658529200 </p>



                <br><br>
                <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                <div class="break"></div><br>
                
                <iframe
                        width="800"
                        height="450"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCeNkdz8H9gRA5kmf605jC2xaniq55lhns&q= Đại Học Bách Khoa Hà Nội" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_end.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>