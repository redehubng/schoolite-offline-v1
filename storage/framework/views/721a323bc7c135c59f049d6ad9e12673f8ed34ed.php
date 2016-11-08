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
             <button type="button" class="btn btn-primary m-t-md" data-toggle="modal" data-target="#edit-teacher-info">
                Edit info
            </button>
             <div class="modal inmodal" id="edit-teacher-info" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <img id="image_upload_preview" data-holder-rendered="true" src="<?php echo e(asset('storage/' . $teacher->image)); ?>"  class="img-circle circle-border m-b-md" alt="student passport" width="100px">

                                <h4 class="modal-title"><?php echo e($teacher->name); ?></h4>

                            </div>
                            <form method="POST" class="form" enctype="multipart/form-data" action="<?php echo e(url('admin/teachers/' . $teacher->id)); ?>">
                            <div class="modal-body">



                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PUT')); ?>


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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">Surname *</label>

                                                 <input placeholder="surname" class="form-control input-lg" type="text" name="surname" value="<?php echo e(trim(explode(' ', $teacher->name)[0])); ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">First name *</label>
                                                <input placeholder="first name" class="form-control input-lg" type="text" name="first_name" value="<?php echo e(trim(explode(' ', $teacher->name)[1])); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">Middle name *</label>
                                                <input placeholder="middle name" class="form-control input-lg" type="text" name="middle_name" value="<?php echo e(isset(explode(' ', $teacher->name)[2]) ? trim(explode(' ', $teacher->name)[2]) : null); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">Sex *</label>
                                                <select class="form-control input-lg" name="sex" required="">
                                                    <option></option>
                                                    <option value="Male" <?php echo e($teacher->sex == 'Male' ? 'selected' : ''); ?>>Male</option>
                                                    <option value="Female" <?php echo e($teacher->sex == 'Female' ? 'selected' : ''); ?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="font-normal control-label">DOB *</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="dob" class="form-control input-lg" name="dob" value="<?php echo e($teacher->dob->format('m/d/Y')); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <div class="input-group">
                                                   <span class="input-group-addon"><i class="fa fa-phone"></i></span><input type="tel" placeholder="phone" class="form-control input-lg" name="phone"  value="<?php echo e($teacher->phone); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                           <div class="row">
                               <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                          <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-at"></i></span><input type="email" placeholder="email" name="email" class="form-control input-lg" value="<?php echo e($teacher->email); ?>">
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-group">
                                       <label class="control-label">Address *</label>
                                       <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-home"></i></span><input type="text" placeholder="address" class="form-control input-lg" name="address" required value="<?php echo e($teacher->address); ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>


                           <div class="row">
                                 <div class="col-lg-12">
                                   <div class="form-group">
                                       <label class="control-label">Salary *</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-money"></i></span><input type="number" class="form-control input-lg" name="salary" required="" value="<?php echo e(isset($teacher->salary) ? $teacher->salary : old('salary')); ?>">
                                        </div>
                                   </div>
                               </div>
                               <div class="col-lg-3">
                                   <div class="form-group">
                                       <label class="control-label">Marital status *</label>
                                       <select class="form-control input-lg" name="marital_status" required="">
                                           <option value="Single" <?php echo e($teacher->marital_status == 'Single' ? 'selected' : ''); ?>>Single</option>
                                           <option value="Married" <?php echo e($teacher->marital_status == 'Married' ? 'selected' : ''); ?>>Married</option>
                                           <option value="Other" <?php echo e($teacher->marital_status == 'Other' ? 'selected' : ''); ?>>Other</option>
                                       </select>
                                   </div>
                               </div>
                           </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                     </form>
                     </div>
                </div>
            </div>
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
                                DOB <strong><?php echo e($teacher->dob->format('m/d/Y') . ' ('  . $teacher->dob->diffInYears() . 'yrs)'); ?></strong>
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
                                    <?php $__currentLoopData = $teacher->classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($classroom->name); ?></td>
                                            <td><?php echo e($classroom->level->name); ?></td>
                                            <td><?php echo e($classroom->female_students()->count()); ?></td>
                                            <td><?php echo e($classroom->male_students()->count()); ?></td>
                                            <td><?php echo e($classroom->total_students()); ?></td>
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
                                                            <td><?php echo e($house->females()->count()); ?></td>
                                                            <td><?php echo e($house->males()->count()); ?></td>
                                                            <td><?php echo e($house->total()); ?></td>
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