<?php $__env->startSection('title', $teacher->name); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?php echo e($teacher->name . ' ' . $teacher->staff_id); ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('admin')); ?>">Home</a>
                </li>
                <li class="active">
                    <a href="<?php echo e(url('admin/teachers/')); ?>">Teachers</a>
                </li>
                <li class="active">
                    <a href="<?php echo e(url('#')); ?>"><?php echo e($teacher->name . ' - ' . $teacher->staff_id); ?></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="<?php echo e(asset("storage/" . $teacher->image)); ?>" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h3 class="no-margins">
                                    <?php echo e($teacher->name); ?>

                                </h3>
                                <h4><?php echo e($teacher->email); ?>( <?php echo e($teacher->staff_id); ?> )</h4>
                                <h5 class="text-success">Status: <?php echo e($teacher->status); ?>  Current Salary: #<?php echo e($teacher->salary); ?></h5>
                                <small>
                                    <?php echo e($teacher->description); ?> <br> Current Salary: <?php echo e($teacher->salary); ?>

                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                Sex <strong><?php echo e($teacher->sex); ?></strong>
                            </td>
                            <td>
                                Phone <strong><?php echo e($teacher->phone); ?></strong>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                DOB <strong><?php echo e($teacher->dob); ?></strong>
                            </td>
                            <td>
                                <strong>State of origin</strong> <?php echo e($teacher->state->name); ?>, <?php echo e($teacher->lga->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Marital status</strong> <?php echo e($teacher->marital_status); ?>

                            </td>
                            <td>
                                <strong>Address</strong> <?php echo e($teacher->address); ?>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>


</div>



<div class="row animated fadeInRight">
                <div class="col-md-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo e($teacher->name  . ' - '); ?>Subject(s) in charge</h5>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Class Name</th>
                                            <th>Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $teacher->classroom_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($subject->subject->name); ?></td>
                                            <td><?php echo e($subject->classroom->name); ?></td>
                                            <td><?php echo e($subject->classroom->level->name); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo e($teacher->name . ' - '); ?> Classroom(s) in charge</h5>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Level</th>
                                            <th>Females</th>
                                            <th>Males</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $teacher->classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($class->name); ?></td>
                                            <td><?php echo e($class->level->name); ?></td>
                                            <td><?php echo e(''); ?></td>
                                            <td><?php echo e(''); ?></td>
                                            <td><?php echo e(''); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Level</th>
                                            <th>Females</th>
                                            <th>Males</th>
                                            <th>Total</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
                 <div class="col-md-5">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5><?php echo e($teacher->name  . ' - '); ?>Level(s) in charge</h5>
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
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $teacher->levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($level->name); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-7">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5><?php echo e($teacher->name . ' - '); ?> House(s) in charge</h5>
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
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>House Name</th>
                                                            <th>Females</th>
                                                            <th>Males</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $teacher->houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($house->name); ?></td>
                                                            <td><?php echo e(''); ?></td>
                                                            <td><?php echo e(''); ?></td>
                                                            <td><?php echo e(''); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th>House Name</th>
                                                            <th>Females</th>
                                                            <th>Males</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
</div>

<?php $__env->stopSection(); ?>





<?php $__env->startSection('scripts'); ?>

    <script>


    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>