<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Sửa</small>
                </h1>
                <?php if(session('thongbao')): ?>
                    <div class="alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
                <?php if(count($errors)>0): ?>
                    <div class="alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/tintuc/sua/<?php echo e($tintuc->id); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" id="theloai" onchange="selectTheLoai(this)">
                            <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tl->id); ?>"
                                    <?php if($tintuc ->loaitin ->theloai ->id == $tl ->id): ?>
                                    <?php echo e(" selected"); ?>

                                    <?php endif; ?>
                                    ><?php echo e($tl->Ten); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" id="loaitin" name="loaiTin">
                            <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lt->id); ?>"
                                <?php if($tintuc ->loaitin ->id == $lt->id): ?>
                                <?php echo e("selected"); ?>

                                <?php endif; ?>
                                        ><?php echo e($lt->Ten); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="tieuDe" placeholder="Nhập tiêu đề" value="<?php echo e($tintuc->TieuDe); ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                       <textarea id="demo" class="form-control ckeditor" rows="5" name="tomTat" required><?php echo e($tintuc->TomTat); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="5" name="noiDung" required><?php echo e($tintuc->NoiDung); ?></textarea>
                    </div>
                    <div class="form-group" >
                       <h2>Hình ảnh</h2>
                        <img src="upload/tintuc/<?php echo e($tintuc->Hinh); ?>" width="100px" height="100px"/>
                        <br/>
                        <br/>
                        <input type="file" id="files" name="hinh" accept="image/gif, image/jpeg, image/png" >
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio"  value="1" name="noiBat"
                            <?php if($tintuc->NoiBat ==1): ?>
                                <?php echo e("checked"); ?>

                             <?php endif; ?>
                            />Nổi bật</label>
                        <label class="radio-inline">
                            <input type="radio" value="0" name="noiBat"
                            <?php if($tintuc->NoiBat ==0): ?>
                                <?php echo e("checked"); ?>

                                    <?php endif; ?>
                            />Không nổi bật</label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
                    </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Comment
                <small>Danh sách</small>
            </h1>
        </div>
        <?php if(session('thongbaocomment')=='Xóa comment thành công'): ?>
            <div class="alert-success">
                <?php echo e(session('thongbaocomment')); ?>

            </div>
        <?php elseif(session('thongbaocomment')=='Xóa comment không thành công'): ?>
            <div class="alert-danger">
                <?php echo e(session('thongbaoxoacomment')); ?>

            </div>
        <?php endif; ?>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Người dùng</th>
                <th>Nội dung</th>
                <th>Ngày đăng</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $tintuc->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo e($cm->id); ?></td>
                    <td><?php echo e($cm->user->name); ?></td>
                    <td><?php echo $cm->NoiDung; ?></td>
                    <td><?php echo e($cm->created_at); ?></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/comment/<?php echo e($cm->id); ?>">Xóa</a></td>
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
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>