<?php $__env->startSection('slide'); ?>
    <?php echo $__env->make('front_end.layouts.slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?php echo e($tintuc->TieuDe); ?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">PhuNHb</a>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="upload/tintuc/<?php echo e($tintuc->Hinh); ?>" alt="">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo e($tintuc->created_at); ?>  <br>Số lượt xem : <?php echo e($tintuc ->SoLuotXem); ?></p>

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $tintuc->TomTat; ?></p>
            <p><?php echo $tintuc -> NoiDung; ?></p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <?php if(session('thongbao')): ?>
                    <div class="alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
                <?php if(Auth::check()==false): ?>
                <p>Đăng nhập để bình luận</p>
                <?php endif; ?>
                <div>
                    <input id="token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                    <input id="idTinTuc" type="hidden"  value="<?php echo e($tintuc->id); ?>">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" id="noiDungComment" required></textarea>
                    </div>
                    <button class="btn btn-primary" onclick="clickComment()"
                    <?php if(Auth::check()==false): ?>
                        <?php echo e("disabled"); ?>

                    <?php endif; ?>
                    >Gửi</button>
                </div>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div id="danhsachcomment">
            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo e($cm->user->name); ?>

                        <small><?php echo e($cm->created_at); ?></small>
                    </h4>
                    <?php echo e($cm->NoiDung); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
                    <?php $__currentLoopData = $tinlienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="tintuc/<?php echo e($tin->id); ?>">
                                <img class="img-responsive" src="upload/tintuc/<?php echo e($tin->Hinh); ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="tintuc/<?php echo e($tin->id); ?>"><b><?php echo e($tin->TieuDe); ?></b></a>
                        </div>
                        <p><?php echo $tin->TomTat; ?></p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
                    <?php $__currentLoopData = $tinnoibat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tinnb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="detail.html">
                                <img class="img-responsive" src="upload/tintuc/<?php echo e($tinnb->Hinh); ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="tintuc/<?php echo e($tinnb->id); ?>"><b><?php echo e($tinnb->TieuDe); ?></b></a>
                        </div>
                        <p><?php echo e($tinnb->TomTat); ?></p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function clickComment() {
            var idTinTuc = document.getElementById('idTinTuc').value;
            var noiDungComment = document.getElementById('noiDungComment').value;
            var token = document.getElementById('token').value;
            if(noiDungComment != ""){
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                xhttp.onreadystatechange = function () {
                    if(this.readyState==4 && this.status==200){
                        document.getElementById('danhsachcomment').innerHTML=this.responseText;
                        console.log(this.responseText);
                    }
                }
                xhttp.open('POST','binhluan/'+idTinTuc,true);
                xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                var data = "_token="+token+"&noiDung="+noiDungComment;
                xhttp.send(data);
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_end.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>