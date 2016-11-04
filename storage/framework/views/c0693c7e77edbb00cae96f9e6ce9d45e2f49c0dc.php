<?php $__env->startSection('title', 'Houses'); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School sport houses</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('admin')); ?>">Home</a>
                </li>
                <li class="active">
                    <a href="#">Houses</a>
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
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Sport houses</h5>
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
                                        <table class="table table-striped table-bordered table-hover sessions-dataTables" >
                                        <thead>
                                        <tr>
                                            <th>House Name</th>
                                            <th>House master</th>
                                            <th>Females</th>
                                            <th>Males</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td>
                                                <?php echo e($house->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($house->teacher->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($house->females()->count()); ?>

                                            </td>
                                            <td>
                                                <?php echo e($house->males()->count()); ?>

                                            </td>
                                            <td>
                                                <?php echo e($house->total()); ?>

                                            </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <a type="button" class="btn btn-outline btn-xs btn-primary" href="<?php echo e(url('admin/houses/' . $house->id)); ?>" target="_blank">View</a>
                                                </div>
                                            </td>

                                        </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Session Name</th>
                                            <th>Session Status</th>
                                            <th>First Term</th>
                                            <th>Second Term</th>
                                            <th>Third Term</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        </table>
                    </div>
                </div>
            </div>
        </div>
       <div class="col-lg-4">
                           <div class="ibox float-e-margins">
                               <div class="ibox-title">
                                   <h5>Create New House</h5>
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

                                   <form class="form-horizontal" method="POST" action="<?php echo e(url('admin/houses')); ?>">
                                       <?php echo e(csrf_field()); ?>

                                       <p>Add new House</p>
                                        <?php if(count($errors) > 0): ?>
                                           <!-- Form Error List -->
                                           <div class="alert alert-danger">
                                               <strong>Whoops! Something went wrong!</strong>
                                               <ul>
                                                   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       <li><?php echo e($error); ?></li>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                               </ul>
                                           </div>
                                       <?php endif; ?>
                                       <div class="form-group">
                                           <label class="col-lg-4 control-label">House Name *</label>
                                           <div class="col-lg-8">
                                               <input placeholder="house name" class="form-control" type="text" name="name" autofocus="" required="">
                                           </div>
                                       </div>

                                       <div class="form-group">
                                           <label class="col-lg-4 control-label">House master *</label>
                                           <div class="col-lg-8">
                                               <select name="teacher_id" class="form-control" required>
                                               <option value="">--select--</option>
                                               <?php if($teachers->isEmpty()): ?>
                                               <option value="">No teacher available</option>
                                               <?php else: ?>
                                                   <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name . '(' . $teacher->staff_id . ')'); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                               <?php endif; ?>
                                               </select><span class="help-block m-b-none">a teacher in charge of the house</span>
                                           </div>
                                       </div>

                                       <div class="form-group">
                                           <div class="col-lg-offset-4 col-lg-8">
                                               <button class="btn btn-sm btn-white" type="submit">Add House</button>
                                           </div>
                                       </div>
                                   </form>

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


            $('.sessions-dataTables').DataTable({

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