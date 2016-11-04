<?php $__env->startSection('title', 'Guarrdian'); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Guardian</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="<?php echo e(url('guardian')); ?>">Home</a>
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
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Wards</h5>
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
                        <th>Admin number</th>
                        <th>Wards Name</th>
                        <th>Sex</th>
                        <th>Level</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $guardian->wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ward): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="gradeA">
                        <td><?php echo e($ward->admin_number); ?></td>
                        <td><?php echo e($ward->name); ?></td>
                        <td><?php echo e($ward->sex); ?></td>
                        <td><?php echo e($ward->classroom->level->name); ?></td>
                        <td><?php echo e($ward->classroom->name); ?></td>
                        <td class="center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-outline btn-xs btn-primary" href="<?php echo e(url('guardian/wards/' . $ward->id)); ?>" target="_blank">View</a>
                            </div>
                        </td>

                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Admin number</th>
                        <th>Wards Name</th>
                        <th>Sex</th>
                        <th>Level</th>
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