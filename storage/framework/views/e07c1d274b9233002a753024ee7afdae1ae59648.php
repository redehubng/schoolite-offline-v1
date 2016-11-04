<?php $__env->startSection('title', $classroom->name); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?php echo e($classroom->name); ?> Students</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('teacher')); ?>">Home</a>
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
<?php if(isset($session) && !is_null($session) && $session->term() === 'third'): ?>
<div class="row m-b-md">

    <div class="col-lg-6">
        <form action="<?php echo e(url('teacher/classrooms/' . $classroom->id . '/promote_all')); ?>" method="post" id="promote-all">
        <?php echo csrf_field(); ?>

             <div class="input-group m-b"><span class="input-group-btn">
                 <button  type="submit" class="btn btn-primary btn-block" id="promote-all">Promote all to</button></span> <select class="form-control" name="class_id">
                    <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promoted_to_class): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($promoted_to_class->level->rank > $class->level->rank): ?>
                            <option value="<?php echo e($promoted_to_class->id); ?>"><?php echo e($promoted_to_class->name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                 </select>
             </div>

        </form>
    </div>

    <div class="col-lg-6">
        <form action="<?php echo e(url('teacher/classrooms/' . $classroom->id . '/repeat_all')); ?>" method="post" id="repeat-all">
        <?php echo e(csrf_field()); ?>

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


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>List of all students in <?php echo e($classroom->name); ?></h5>
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
                                        <th>Admin NO.</th>
                                        <th>Name </th>
                                        <th>Sex </th>
                                        <th>House</th>
                                        <th>Parent</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $classroom->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr class="gradeA">
                                        <td><?php echo e($student->admin_number); ?></td>
                                        <td><?php echo e($student->name); ?></td>
                                        <td><?php echo e($student->sex); ?></td>
                                        <td><?php echo e($student->house->name); ?></td>
                                        <td><?php echo e($student->guardian->name); ?></td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-outline btn-xs btn-primary" href="<?php echo e(url('teacher/classrooms/' .  $classroom->id  . '/students/' . $student->id )); ?>">View</a>
                                            </div>
                                        </td>

                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Admin NO.</th>
                                        <th>Name </th>
                                        <th>Sex </th>
                                        <th>House</th>
                                        <th>Parent</th>
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

            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

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

            /* Init DataTables */
            var oTable = $('#editable').DataTable();
            });


         </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>