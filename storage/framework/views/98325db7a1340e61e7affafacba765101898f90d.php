<?php $__env->startSection('title', 'Score sheets'); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Scores sheet </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('admin')); ?>">Home</a>
                </li>
                <li class="active">
                    <a href="<?php echo e(url('#')); ?>">Scores sheet</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <div class="wrapper wrapper-content animated fadeInRight ecommerce">

     <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Scores sheet </h5>
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
                            <table class="table table-striped table-bordered table-hover subjects-score-dataTables" >
                            <thead>
                                <tr>
                                    <th>Student name</th>
                                    <th>Admin number</th>
                                    <th>Session</th>
                                    <th>Class</th>
                                    <th>Level</th>
                                    <th>Subject</th>
                                    <th>Term</th>
                                    <th>CA1</th>
                                    <th>CA2</th>
                                    <th>Exam</th>
                                    <th>Total</th>
                                    <th>Grade</th>
                                    <th>Pos</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="gradeX">
                                    <td><?php echo e($result->student->name); ?></td>
                                    <td><?php echo e($result->student->admin_number); ?></td>
                                    <td><?php echo e($result->session->name); ?></td>
                                    <td><?php echo e($result->classroom->name); ?></td>
                                    <td><?php echo e($result->classroom->level->name); ?></td>
                                    <td><?php echo e($result->subject->short_name); ?></td>
                                    <td><?php echo e($result->term); ?></td>
                                    <td><?php echo e(!is_null($result) ? $result->first_ca : ''); ?></td>
                                    <td><?php echo e(!is_null($result) ? $result->second_ca : ''); ?></td>
                                    <td><?php echo e(!is_null($result) ? $result->exam : ''); ?></td>
                                      

                                          
                                          
                                          
                                          
                                          
                                          
                                          

                                          
                                            
                                          
                                          
                                                

                                          
                                          
                                          

                                          
                                      
                                      <td class="total-score">
                                           <?php echo e(!is_null($result) ? $result->total() : ''); ?>

                                      </td>
                                      <td class="score-grade">
                                        <?php echo e(!is_null($result) ? $result->grade() : ''); ?>

                                      </td>
                                      <td class="score-position">
                                        <?php echo e(!is_null($result) ? $result->position() : ''); ?>

                                      </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Student name</th>
                                    <th>Admin number</th>
                                    <th>Session</th>
                                    <th>Class</th>
                                    <th>Level</th>
                                    <th>Subject</th>
                                    <th>Term</th>
                                    <th>CA1</th>
                                    <th>CA2</th>
                                    <th>Exam</th>
                                    <th>Total</th>
                                    <th>Grade</th>
                                    <th>Position</th>
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

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

//                    var $student_score = $('input.first_ca, input.second_ca, input.exam');
//
//
//                    $student_score.change(function(){
//
//                       alert($(this).val());
//                      $update_score = $(this);
//                      $form = $(this).closest('tr').children('form');
//                      $form_url = $form.attr('action');
//
//                       $.ajax({
//                             type: "POST",
//                             url: $form_url,
//                             data: $form.serialize(),
//                             beforeSend: function(){
//                                    //alert('before');
//                             },
//                             success: function(data){
//
//                                    $update_score.closest('tr').children('.total-score').text(data.total);
//                                    $update_score.closest('tr').children('.score-grade').text(data.grade);
//                                    $update_score.closest('tr').children('.score-position').text(data.position);
//
//                                }
//                       });
//
//                    });


        $('.subjects-score-dataTables').DataTable({

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

                  });

         </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>