<?php $__env->startSection('title', 'Sessions'); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School Sessions</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('admin')); ?>">Home</a>
                </li>
                <li class="active">
                    <a href="<?php echo e(url('admin/sessions')); ?>">Sessions</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="wrapper wrapper-content">

   <div class="row m-t-sm">

          <?php if(isset($session) && !is_null($session)): ?>

            <?php if($session->first_term === 'inactive'): ?>
                  <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-spinner fa-4x"></i>
                            <h1 class="m-xs">0.0%</h1>
                            <h3 class="font-bold no-margins">
                                Ready to start
                            </h3>
                            <form class="m-t-md" method="POST" action="<?php echo e(url('admin/sessions/' . $session->id . "/start_first_term" )); ?>">
                             <?php echo e(csrf_field()); ?>

                             <?php echo e(method_field('PUT')); ?>

                             <input type="hidden" name="session_id" value="<?php echo e($session->id); ?>">
                             <button type="submit" class="btn btn-block btn-info">Start</button>
                             </form>
                        </div>
                    </div>
                </div>

            <?php elseif($session->first_term === 'active'): ?>
                <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-spinner fa-4x"></i>
                            <h1 class="m-xs"><?php echo e(term_percentage_done($session->id, 'first') . '%'); ?></h1>
                            <h3 class="font-bold no-margins">
                                active
                            </h3>
                            
                        </div>
                        <form class="m-t-md" method="POST" action="<?php echo e(url('admin/sessions/' . $session->id . "/close_first_term" )); ?>">
                         <?php echo e(csrf_field()); ?>

                         <?php echo e(method_field('PUT')); ?>

                         <input type="hidden" name="session_id" value="<?php echo e($session->id); ?>">
                         <button type="submit" class="btn btn-block btn-info">Close</button>
                         </form>
                    </div>

                </div>
            <?php elseif($session->first_term === 'closed'): ?>

                <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center text-info">
                        <div class="m-b-md">
                            <i class="fa fa-check fa-4x"></i>
                            <h1 class="m-xs"><?php echo e(term_percentage_done($session->id, 'first') . '%'); ?></h1>
                            <h3 class="font-bold no-margins">
                                closed
                            </h3>
                            
                        </div>
                    </div>

                </div>
            <?php endif; ?>


            <?php if($session->second_term === 'inactive'): ?>
                  <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-spinner fa-4x"></i>
                            <h1 class="m-xs">0.0%</h1>
                            <h3 class="font-bold no-margins">
                                <?php if($session->first_term === 'closed'): ?>  Next term <?php else: ?> Waiting... <?php endif; ?>
                            </h3>
                            
                        </div>
                        <?php if($session->first_term === 'closed'): ?>
                        <form class="m-t-md" method="POST" action="<?php echo e(url('admin/sessions/' . $session->id . "/start_second_term" )); ?>">
                         <?php echo e(csrf_field()); ?>

                         <?php echo e(method_field('PUT')); ?>

                         <input type="hidden" name="session_id" value="<?php echo e($session->id); ?>">
                         <button type="submit" class="btn btn-block btn-info">Start</button>
                         </form>
                         <?php endif; ?>
                    </div>

                </div>
            <?php elseif($session->second_term === 'active'): ?>
                <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-check fa-4x"></i>
                            <h1 class="m-xs"><?php echo e(term_percentage_done($session->id, 'second') . '%'); ?></h1>
                            <h3 class="font-bold no-margins">
                                active
                            </h3>
                            
                        </div>
                        <form class="m-t-md" method="POST" action="<?php echo e(url('admin/sessions/' . $session->id . "/close_second_term" )); ?>">
                         <?php echo e(csrf_field()); ?>

                         <?php echo e(method_field('PUT')); ?>

                         <input type="hidden" name="session_id" value="<?php echo e($session->id); ?>">
                         <button type="submit" class="btn btn-block btn-info">Close</button>
                         </form>
                    </div>

                </div>
            <?php elseif($session->second_term === 'closed'): ?>

                <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center text-info">
                        <div class="m-b-md">
                            <i class="fa fa-check fa-4x"></i>
                            <h1 class="m-xs"><?php echo e(term_percentage_done($session->id, 'second') . '%'); ?></h1>
                            <h3 class="font-bold no-margins">
                                closed
                            </h3>
                            
                        </div>
                    </div>

                </div>
            <?php endif; ?>


            <?php if($session->third_term === 'inactive'): ?>
                  <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-spinner fa-4x"></i>
                            <h1 class="m-xs">0.0%</h1>
                            <h3 class="font-bold no-margins">
                                <?php if($session->second_term === 'closed'): ?>  Next term <?php else: ?> Waiting... <?php endif; ?>
                            </h3>
                        </div>
                        <?php if($session->second_term === 'closed'): ?>
                        <form class="m-t-md" method="POST" action="<?php echo e(url('admin/sessions/' . $session->id . "/start_third_term" )); ?>">
                         <?php echo e(csrf_field()); ?>

                         <?php echo e(method_field('PUT')); ?>

                         <input type="hidden" name="session_id" value="<?php echo e($session->id); ?>">
                         <button type="submit" class="btn btn-block btn-info">Start</button>
                         </form>
                         <?php endif; ?>
                    </div>

                </div>
            <?php elseif($session->third_term === 'active'): ?>
                <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-check fa-4x"></i>
                            <h1 class="m-xs"><?php echo e(term_percentage_done($session->id, 'third') . '%'); ?></h1>
                            <h3 class="font-bold no-margins">
                                active
                            </h3>
                            
                        </div>
                        <form class="m-t-md" method="POST" action="<?php echo e(url('admin/sessions/' . $session->id . "/close_third_term" )); ?>">
                         <?php echo e(csrf_field()); ?>

                         <?php echo e(method_field('PUT')); ?>

                         <input type="hidden" name="session_id" value="<?php echo e($session->id); ?>">
                         <button type="submit" class="btn btn-block btn-info">Close</button>
                         </form>
                    </div>

                </div>
            <?php elseif($session->third_term === 'closed'): ?>

                <div class="col-lg-4">
                    <div class="widget white-bg p-lg text-center text-info">
                        <div class="m-b-md">
                            <i class="fa fa-check fa-4x"></i>
                            <h1 class="m-xs"><?php echo e(term_percentage_done($session->id, 'third') . '%'); ?></h1>
                            <h3 class="font-bold no-margins">
                                closed
                            </h3>
                            
                        </div>
                    </div>

                </div>
            <?php endif; ?>

          <?php endif; ?>

        </div>
        <?php if( isset($session) && !is_null($session) && $session->first_term === 'closed' && $session->third_term === 'closed' && $session->second_term === 'closed'): ?>
        <div class="row">
            <form class="m-t-md m-b-md text-center" method="POST" action="<?php echo e(url('admin/sessions/' . $session->id . "/close" )); ?>">
             <?php echo e(csrf_field()); ?>

             <?php echo e(method_field('PUT')); ?>

             <input type="hidden" name="session_id" value="<?php echo e($session->id); ?>">
             <button type="submit" class="btn btn-lg btn-info">Close session</button>
             </form>
        </div>
        <?php endif; ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Past Sessions</h5>
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
                                            <th>Session Name</th>
                                            <th>Session Status</th>
                                            <th>First Term</th>
                                            <th>Second Term</th>
                                            <th>Third Term</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <tr class="<?php echo e($session->status === "active" ? "text-info" : ""); ?>">
                                            <td>
                                                <?php echo e($session->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($session->status); ?>

                                            </td>
                                            <td>
                                                <?php echo e($session->first_term); ?>

                                            </td>
                                            <td>
                                                <?php echo e($session->second_term); ?>

                                            </td>
                                            <td>
                                                <?php echo e($session->third_term); ?>

                                            </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <?php if($session->first_term === 'closed' && $session->second_term === 'closed' && $session->third_term == 'closed'): ?>
                                                        <a type="button" class="btn btn-outline btn-xs btn-primary" href="<?php echo e(url('admin/sessions/' . $session->id)); ?>" target="_blank">View</a>
                                                    <?php endif; ?>

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
                    <h5>Create New Session</h5>
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

                    <form class="form-horizontal" method="POST" action="<?php echo e(url('admin/sessions/create')); ?>">
                     <?php echo csrf_field(); ?>


                        <p>Add new session</p>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Session Name *</label>
                            <div class="col-lg-8">
                                <input placeholder="session name" class="form-control" type="text" name="name" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-4 col-lg-8">
                                <button class="btn btn-sm btn-white" type="submit">Create session</button>
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