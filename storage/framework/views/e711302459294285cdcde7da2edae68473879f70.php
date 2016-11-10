<?php $__env->startSection('title', $student->name); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?php echo e($student->name); ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('guardian')); ?>">Home</a>
                </li>
                <li class="active">
                    <a href="<?php echo e(url('guardian/wards/' . $student->id)); ?>"><?php echo e($student->name); ?></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="wrapper wrapper-content">


<?php echo $__env->make('layouts.partials.student.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="row m-t-sm">
    <?php if(isset($session) && !is_null($session) && ($student->term_result($session->id, 'first')->count() > 0) ): ?>
    <div class="col-lg-4">
    <a href="<?php echo e(url('guardian/wards/'. $student->id .  '/results?session_id=' . $session->id . '&&term=' . 'first' . '&&classroom_id=' . $student->classroom_id)); ?>" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs"><?php echo e($student->term_percentage($student->term_result($session->id, 'first')) . '%'); ?></h1>
                <h3 class="font-bold no-margins">
                    1st Term Results
                </h3>
                <small>Total subject recorded: <?php echo e($student->term_result($session->id, 'first')->count()); ?></small>
            </div>
        </div>
      </a>
    </div>
    <?php endif; ?>

    <?php if(isset($session) && !is_null($session) && ($student->term_result($session->id, 'second')->count() > 0) ): ?>
    <div class="col-lg-4">
    <a href="<?php echo e(url('teacher/classrooms/'.$classroom->id .'/students/'.$student->id.'/results?session_id=' . $session->id . '&&term=' . 'second')); ?>" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs"><?php echo e($student->term_percentage($student->term_result($session->id, 'second')) . '%'); ?></h1>
                <h3 class="font-bold no-margins">
                    2nd Term Results
                </h3>
                <small>Total subject recorded: <?php echo e($student->term_result($session->id, 'second')->count()); ?></small>
            </div>
        </div>
      </a>
    </div>
    <?php endif; ?>

    <?php if(isset($session) && !is_null($session) && ($student->term_result($session->id, 'third')->count() > 0) ): ?>
    <div class="col-lg-4">
    <a href="<?php echo e(url('teacher/classrooms/'.$classroom->id .'/students/'.$student->id.'/results?session_id=' . $session->id . '&&term=' . 'third')); ?>" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs"><?php echo e($student->term_percentage($student->term_result($session->id, 'third')) . '%'); ?></h1>
                <h3 class="font-bold no-margins">
                    3rd Term Results
                </h3>
                <small>Total subject recorded: <?php echo e($student->term_result($session->id, 'third')->count()); ?></small>
            </div>
        </div>
      </a>
    </div>
    <?php endif; ?>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>