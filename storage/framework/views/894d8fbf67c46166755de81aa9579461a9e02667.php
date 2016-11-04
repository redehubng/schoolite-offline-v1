<?php $__env->startSection('title', $classroom->name); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?php echo e($student->name); ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('teacher')); ?>">Home</a>
                </li>
                <li class="active">
                    <a href="<?php echo e(url('admin/classrooms/' . $classroom->id)); ?>"><?php echo e($classroom->name); ?></a>
                </li>
                <li class="active">
                    <a href="<?php echo e(url('admin/classrooms/' . $classroom->id)); ?>"><?php echo e($classroom->name); ?></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="wrapper wrapper-content">

<?php if(isset($session) && !is_null($session) && $session->term() == 'third'): ?>
<div class="row m-b-md">
    <div class="col-lg-6">
            <form action="<?php echo e(url('teacher/classrooms/' . $classroom->id . '/students/'.$student->id.'/promote')); ?>" method="post" id="promote-all">
            <?php echo e(csrf_field()); ?>

                 <div class="input-group m-b"><span class="input-group-btn">
                     <button  type="submit" class="btn btn-primary btn-block" id="promote-all">Promote all to</button></span> <select class="form-control" name="classroom_id">
                        <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promoted_to_class): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($promoted_to_class->level->rank > $classroom->level->rank): ?>
                                <option value="<?php echo e($promoted_to_class->id); ?>"><?php echo e($promoted_to_class->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     </select>
                 </div>

            </form>
        </div>

    <div class="col-lg-6">
        <form action="<?php echo e(url('teacher/classrooms/' . $classroom->id . 'students/'.$student->id.'/repeat')); ?>" method="post" id="repeat-all">
        <?php echo csrf_field(); ?>

                <div class="input-group m-b"><span class="input-group-btn">
                     <button  type="submit" class="btn btn-warning btn-block" id="repeat-all">Repeat all to</button></span> <select class="form-control">
                     <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repeated_to_class): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                         <?php if($classroom->level->rank >= $repeated_to_class->level->rank ): ?>
                             <option value="<?php echo e($repeated_to_class->id); ?>"><?php echo e($repeated_to_class->name); ?></option>
                         <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     </select>
                 </div>
        </form>
    </div>
</div>
<?php endif; ?>

<?php echo $__env->make('layouts.partials.student.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="row m-t-sm">
    <?php if(isset($session) && !is_null($session) && ($student->term_results($session->id, 'first')->count() > 0) ): ?>
    <div class="col-lg-4">
    <a href="<?php echo e(url('teacher/classrooms/'.$classroom->id .'/students/'.$student->id.'/results?session_id=' . $session->id . '&&term=' . 'first')); ?>" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs"><?php echo e($student->term_percentage($student->term_results($session->id, 'first')) . '%'); ?></h1>
                <h3 class="font-bold no-margins">
                    1st Term Results
                </h3>
                <small>Total subject recorded: <?php echo e($student->term_results($session->id, 'first')->count()); ?></small>
            </div>
        </div>
      </a>
    </div>
    <?php endif; ?>

    <?php if(isset($session) && !is_null($session) && ($student->term_results($session->id, 'second')->count() > 0) ): ?>
    <div class="col-lg-4">
    <a href="<?php echo e(url('teacher/classrooms/'.$classroom->id .'/students/'.$student->id.'/results?session_id=' . $session->id . '&&term=' . 'second')); ?>" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs"><?php echo e($student->term_percentage($student->term_results($session->id, 'second')) . '%'); ?></h1>
                <h3 class="font-bold no-margins">
                    2nd Term Results
                </h3>
                <small>Total subject recorded: <?php echo e($student->term_results($session->id, 'second')->count()); ?></small>
            </div>
        </div>
      </a>
    </div>
    <?php endif; ?>

    <?php if(isset($session) && !is_null($session) && ($student->term_results($session->id, 'third')->count() > 0) ): ?>
    <div class="col-lg-4">
    <a href="<?php echo e(url('teacher/classrooms/'.$classroom->id .'/students/'.$student->id.'/results?session_id=' . $session->id . '&&term=' . 'third')); ?>" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs"><?php echo e($student->term_percentage($student->term_results($session->id, 'third')) . '%'); ?></h1>
                <h3 class="font-bold no-margins">
                    3rd Term Results
                </h3>
                <small>Total subject recorded: <?php echo e($student->term_results($session->id, 'third')->count()); ?></small>
            </div>
        </div>
      </a>
    </div>
    <?php endif; ?>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>