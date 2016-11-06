<?php $__env->startSection('title', $classroom->name); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School Class - <?php echo e($classroom->name); ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('admin')); ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/classrooms')); ?>">Classrooms</a>
                </li>
                 <li class="active">
                    <a href="<?php echo e(url('admin/classrooms/' . $classroom->id )); ?>"> <?php echo e($classroom->name); ?></a>
                </li>
            </ol>
        </div>
               <div class="col-lg-2">
            <button type="button" class="btn btn-primary m-t-md" data-toggle="modal" data-target="#edit-student-info">
                Edit classroom
            </button>
             <div class="modal inmodal" id="edit-student-info" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title"><?php echo e($classroom->name); ?></h4>

                            </div>
                            <form class="form-horizontal" method="POST" action="<?php echo e(url('admin/classrooms/' . $classroom->id )); ?>  ">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            <div class="modal-body">

                             <?php if(count($errors) > 0): ?>
                                  <div class="alert alert-danger">
                                      <ul>
                                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                              <li> <?php echo e($error); ?> </li>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      </ul>
                                  </div>
                               <?php endif; ?>

                            <?php echo e(csrf_field()); ?>


                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Class Name *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="classroom aname" class="form-control" type="text" name="name"  required="" value="<?php echo e($classroom->name); ?>">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-lg-4 control-label">First term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for first term" class="form-control" type="number" name="first_term_charges" required="" value="<?php echo e($classroom->first_term_charges); ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Second term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for second term" class="form-control" type="number" name="second_term_charges" required="" value="<?php echo e($classroom->second_term_charges); ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Third term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for third term" class="form-control" type="number" name="third_term_charges" required="" value="<?php echo e($classroom->third_term_charges); ?>">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Class teacher</label>
                                  <div class="col-lg-8">
                                      <select name="teacher_id" class="form-control">
                                          <option>--select--</option>
                                           <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                              <option value="<?php echo e($teacher->id); ?>" <?php echo e($classroom->teacher->id == $teacher->id ? 'selected' : ''); ?>><?php echo e($teacher->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      </select><span class="help-block m-b-none">a teacher in charge of the class</span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Level</label>
                                  <div class="col-lg-8">
                                      <select name="level_id" class="form-control">
                                          <option>--select--</option>
                                           <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                              <option value="<?php echo e($level->id); ?> " <?php echo e($classroom->level->id == $level->id ? 'selected' : ''); ?>><?php echo e($level->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      </select><span class="help-block m-b-none">class level</span>
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


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Students in <?php echo e($classroom->name); ?></h5>
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
                    <table class="table table-striped table-bordered table-hover class-students-dataTables" >
                    <thead>
                    <tr>
                        <th>Reg Number</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>DOB</th>
                        <th>House</th>
                        <th>Guardian</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if($classroom->students()->count() == 0): ?>
                            <?php echo e("no student added yet"); ?>

                        <?php else: ?>
                            <?php $__currentLoopData = $classroom->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="gradeA">
                                    <td><?php echo e($student->admin_number); ?></td>
                                    <td><?php echo e($student->name); ?></td>
                                    <td><?php echo e($student->sex); ?></td>
                                    <td><?php echo e($student->dob->format('d/m/Y')); ?></td>
                                    <td><?php echo e($student->house->name); ?></td>
                                    <td><?php echo e($student->guardian->name); ?></td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-outline btn-xs btn-primary" href="<?php echo e(url('admin/students/' . $student->id)); ?>" target="_blank">View</a>
                                        </div>
                                    </td>

                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Reg Number</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>DOB</th>
                        <th>House</th>
                        <th>Guardian</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-lg-7">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Subjects taken in <?php echo e($classroom->name); ?></h5>
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
                                <table class="table table-striped table-bordered table-hover class-subjects-dataTables" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Teacher</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $classroom_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                             <div class="modal inmodal" id="change-class-subject-teacher<?php echo e($subject->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated bounceInRight">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title"><?php echo e($classroom->name . ' '  . $subject->subject->name); ?></h4>

                                                            </div>
                                                            <form class="form-horizontal" method="POST" action="<?php echo e(url('admin/classroom_subjects/' . $subject->id )); ?>  ">

                                                            <?php echo e(csrf_field()); ?>

                                                            <?php echo e(method_field('PUT')); ?>


                                                            <div class="modal-body m-b-md">

                                                             <?php if(count($errors) > 0): ?>
                                                                  <div class="alert alert-danger">
                                                                      <ul>
                                                                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                              <li> <?php echo e($error); ?> </li>
                                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                      </ul>
                                                                  </div>
                                                               <?php endif; ?>

                                                            <?php echo e(csrf_field()); ?>


                                                              <div class="form-group">
                                                                  <label class="col-lg-4 control-label">Subject teacher</label>
                                                                  <div class="col-lg-8">
                                                                      <select name="teacher_id" class="form-control">
                                                                          <option>--select--</option>
                                                                           <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                              <option value="<?php echo e($teacher->id); ?>" <?php echo e($subject->teacher->id == $teacher->id ? 'selected' : ''); ?>><?php echo e($teacher->name); ?></option>
                                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                      </select><span class="help-block m-b-none">a teacher in charge of the class</span>
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
                                    <tr class="gradeA">
                                        <td><?php echo e($subject->subject->name); ?></td>
                                        <td><?php echo e($subject->teacher->name); ?></td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline btn-xs btn-primary">View</button>
                                                <button type="button" class="btn btn-outline btn-xs btn-primary" data-toggle="modal" data-target="#change-class-subject-teacher<?php echo e($subject->id); ?>">Edit</button>
                                            </div>
                                        </td>

                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Reg Number</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                </table>
                            </div>
            </div>
        </div>
    </div>
     <div class="col-lg-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add subject <?php echo e($classroom->name); ?></h5>
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
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('admin/classroom_subjects/')); ?>">
                     <?php echo csrf_field(); ?>


                        <div class="form-group">
                            <label class="col-lg-4 control-label">Subject *</label>
                            <div class="col-lg-8">
                                <select name="subject_id" class="form-control" required>
                                <option value="">--select--</option>
                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Teacher *</label>
                            <div class="col-lg-8">
                                <select name="teacher_id" class="form-control">
                                <option value="">--select--</option>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select><span class="help-block m-b-none">a teacher taking the subject</span>
                            </div>
                        </div>

                        <input type="hidden" value="<?php echo e($classroom->id); ?>" name="classroom_id" required>
                        <div class="form-group">
                            <div class="col-lg-offset-4 col-lg-8">
                                <button class="btn btn-sm btn-white" type="submit">Add subject to class</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src=" <?php echo e(asset('js/plugins/dataTables/datatables.min.js')); ?>"></script>
<script>
 $(document).ready(function(){


            $('.class-students-dataTables').DataTable({
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


              $('.class-subjects-dataTables').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'pdf', title: 'Classroom Subjects'},
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