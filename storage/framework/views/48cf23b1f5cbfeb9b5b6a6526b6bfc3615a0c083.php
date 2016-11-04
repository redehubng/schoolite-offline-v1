<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> </title>


        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

        <?php echo $__env->yieldContent('styles'); ?>

        <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">


</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">




        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- breadcrumbs -->
            <?php echo $__env->yieldContent('page-heading'); ?>

            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->


    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo e(asset('js/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

<?php echo $__env->yieldContent('scripts'); ?>


</body>
</html>
