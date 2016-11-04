<?php $__env->startSection('title', 'Teacher'); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Teacher</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="<?php echo e(url('teacher')); ?>">Home</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">
<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Classes</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover .teacher-classroom-dataTables" >
                    <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Level</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $teacher->classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="gradeA">
                        <td><?php echo e($class->name); ?></td>
                        <td><?php echo e($class->level->name); ?></td>
                        <td><?php echo e($class->students()->where('sex', '=', 'Male')->count()); ?></td>
                        <td><?php echo e($class->students()->where('sex', '=', 'Female')->count()); ?></td>
                        <td><?php echo e($class->students()->count()); ?></td>
                        <td class="center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-outline btn-xs btn-primary" href="<?php echo e(url('teacher/classrooms/' . $class->id)); ?>" target="_blank">View</a>
                            </div>
                        </td>

                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Class Name</th>
                        <th>Level</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Subjects </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Category </th>
                        <th>Subject code</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $teacher->classroom_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="gradeA">
                        <td><?php echo e($subject->subject->name); ?></td>
                        <td><?php echo e(isset($subject->subject->category) ? $subject->subject->category : 'N/A'); ?></td>
                        <td><?php echo e(isset($subject->subject->short_name) ? $subject->subject->short_name : 'N/A'); ?></td>
                        <td><?php echo e(isset($subject->classroom->name) ? $subject->classroom->name : 'N/A'); ?></td>
                        <td class="center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-outline btn-xs btn-primary" href="<?php echo e(url('teacher/classrooms/' . $subject->classroom_id . '/subjects/' . $subject->subject_id)); ?>">View</a>
                            </div>
                        </td>

                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Subject Name</th>
                        <th>Category </th>
                        <th>Subject code</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script src=" <?php echo e(asset('js/plugins/dataTables/datatables.min.js')); ?>"></script>

<script>
 $(document).ready(function(){


            $('.teacher-classroom-dataTables').DataTable({

                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'students'},
                    {extend: 'pdf', title: 'students'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');

                    }
                    }
                ]

            });

})


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>