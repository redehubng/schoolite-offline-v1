<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title'); ?> | Result Print</title>

    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

</head>

<body class="white-bg">
                <div class="wrapper wrapper-content">


                   <?php echo $__env->yieldContent('result-heading'); ?>

                   <?php echo $__env->yieldContent('result-body'); ?>;


    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('js/inspinia.js')); ?>"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
