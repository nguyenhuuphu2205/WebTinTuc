<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <?php if(session('thongbao')): ?>
                        <div class="alert-success">
                            <?php echo e(session('thongbao')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(count($errors)>0): ?>
                        <div class="alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors ->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" id="theloai" onchange="selectTheLoai(this)">
                                <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tl->id); ?>"><?php echo e($tl->Ten); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select class="form-control" name="loaiTin" id="loaitin">
                                <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lt->id); ?>"><?php echo e($lt->Ten); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="form-control" name="tieuDe" placeholder="Nhập tiêu đề tin tức" />
                        </div>
                        <div class="form-group">
                            <label>Tóm Tắt</label>
                            <textarea id="demo" class="form-control ckeditor" rows="5" name="tomTat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="demo" class="form-control ckeditor" rows="5" name="noiDung"></textarea>
                        </div>
                       <div class="form-group">
                           <label>Hình ảnh</label>
                               <input type="file" id="files" name="hinh" accept="image/gif, image/jpeg, image/png"  >

                       </div>
                        <div class="form-group">
                            <label class="radio-inline">
                            <input type="radio"  value="1" name="noiBat"/>Nổi bật</label>
                            <label class="radio-inline">
                            <input type="radio" value="0" name="noiBat" checked />Không nổi bật</label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Nhập lại</button>
                        </form>
                    <p id="result"></p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function selectTheLoai(sel) {
            var idTheLoai=sel.options[sel.selectedIndex].value;
            var xhttp;
            if(window.XMLHttpRequest){
                xhttp = new XMLHttpRequest();
            }else
                xhttp = new ActiveXObject();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200) {
                    document.getElementById('loaitin').innerHTML = this.responseText;

                }

            }
            xhttp.open('GET','admin/ajax/loaitin/'+idTheLoai,true);
            xhttp.send();

        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>