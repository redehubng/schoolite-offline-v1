<?php $__env->startSection('title', 'Classrooms'); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School Classrooms</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('admin')); ?>">Home</a>
                </li>
                <li class="active">
                    <a href="#">Manage classrooms</a>
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
                          <h5>Create New Classroom</h5>
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
                      <?php if(count($errors) > 0): ?>
                          <div class="alert alert-danger">
                              <ul>
                                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <li> <?php echo e($error); ?> </li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </ul>
                          </div>
                       <?php endif; ?>
                          <form class="form-horizontal" method="POST" action="<?php echo e(url('admin/classrooms')); ?>  ">
                            <?php echo e(csrf_field()); ?>


                              <div class="form-group">
                                  <label class="col-lg-2 control-label">Class Name *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="level name" class="form-control" type="text" name="name" autofocus="" required="">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-lg-2 control-label">First term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for first term" class="form-control" type="number" name="first_term_charges" required="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 control-label">Second term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for second term" class="form-control" type="number" name="second_term_charges" required="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 control-label">Third term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for third term" class="form-control" type="number" name="third_term_charges" required="">
                                  </div>
                              </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Class teacher</label>
                                  <div class="col-lg-8">
                                      <select name="teacher_id" class="form-control">
                                          <option>--select--</option>
                                           <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                              <option value="<?php echo e($teacher->id); ?> "><?php echo e($teacher->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      </select><span class="help-block m-b-none">a teacher in charge of the class</span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 control-label">Level</label>
                                  <div class="col-lg-8">
                                      <select name="level_id" class="form-control">
                                          <option>--select--</option>
                                           <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                              <option value="<?php echo e($level->id); ?> "><?php echo e($level->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      </select><span class="help-block m-b-none">class level</span>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-8">
                                      <button class="btn btn-sm btn-white" type="submit">Add level</button>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>