<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?php echo e(asset('/')); ?>">
    <title>Website Tin Tức</title>
    <link rel="shortcut icon" href="title.ico" />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<?php echo $__env->make('front_end.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Page Content -->
<div class="container">

    <!-- slider -->
   <?php echo $__env->yieldContent('slide'); ?>
    <!-- end slide -->

    <div class="space20"></div>
    <div class="row main-left">
        
        <?php echo $__env->yieldContent('menu'); ?>
    <div id="page">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- /.row -->
</div>
<!-- end Page Content -->

<?php echo $__env->make('front_end.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- end Footer -->
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>
<script>
    function timkiemTinTuc() {
        var tukhoa=document.getElementById('noiDungTimKiem').value;
        var xhttp;
        if(window.XMLHttpRequest){
            xhttp = new XMLHttpRequest();
        }else
            xhttp = new ActiveXObject();
        xhttp.onreadystatechange = function () {
            if( this.readyState == 4 && this.status==200){
                document.getElementById('page').innerHTML=this.responseText;
            }
        }
        xhttp.open('GET','timkiem/'+tukhoa,true);
        xhttp.send();
    }
</script>
<?php echo $__env->yieldContent('script'); ?>
</div>
</body>

</html>
