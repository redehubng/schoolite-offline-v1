@extends('layouts.app')

@section('title', $classroom->name)

@section('styles')
<link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $classroom->name }} - {{ $subject->subject->name }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('teacher') }}">Home</a>
                </li>
                <li class="active">
                    <a href="{{ url('teacher/classrooms/' . $classroom->id . '/subjects/' . $subject->id) }}">{{ $subject->subject->name }}</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
@endsection

@section('content')

 <div class="wrapper wrapper-content animated fadeInRight ecommerce">


@if(isset($session) && !is_null($session) && $session->term() == 'first')
     <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Update students {{ $session->term() }} term result</h5>
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
                                    <th>Admin Number</th>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>CA1</th>
                                    <th>CA2</th>
                                    <th>Exam</th>
                                    <th>Total</th>
                                    <th>Grade</th>
                                    <th>Position</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                <tr class="gradeX">
                                    <td>{{ $student->admin_number }}</td>
                                    <td><a href="#" title="Alaba profile" target="_blank">{{ $student->name }}</a></td>
                                    <td>{{ $student->sex }}</td>

                                    <?php $score = $student->student_subject_session_term_result($subject->subject->id, $session->id, 'first') ?>

                                      <form method="POST" action="{{ url('teacher/classrooms/'. $classroom->id .'/subjects/' . $subject->id . '/students/' .$student->id. '/results/create') }}">

                                          <input type="hidden" name="student_id" value="{{ $student->id }}">
                                          <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                                          <input type="hidden" name="subject_id" value="{{ $subject->subject->id }}">
                                          <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                                          <input type="hidden" name="session_id" value="{{ $session->id }}">
                                          <input type="hidden" name="term" value="{{ $session->term() }}">

                                          <td style="width: 13%;">
                                              <div class="input-group">
                                                  <input type="number" name="first_ca" class="form-control first_ca" value="{{ !is_null($score) ? $score->first_ca : '' }}" max="20" min="0"><span class="input-group-addon"><i>/20</i></span>
                                              </div>
                                          </td>
                                          <td style="width: 13%;">
                                              <div class="input-group">
                                                  <input type="number" name="second_ca" class="form-control second_ca" value="{{ !is_null($score) ? $score->second_ca : '' }}" max="20" min="0"><span class="input-group-addon"><i>/20</i></span>
                                              </div>
                                          </td>
                                          <td style="width: 13%;">
                                              <div class="input-group">
                                                  <input type="number" name="exam" class="form-control exam" value="{{ !is_null($score) ? $score->exam : '' }}" max="60" min="0"><span class="input-group-addon"><i>/60</i></span>
                                              </div>
                                          </td>
                                      </form>
                                      <td class="total-score">
                                           {{ !is_null($score) ? $score->total() : '' }}
                                      </td>
                                      <td class="score-grade">
                                        {{ !is_null($score) ? $score->grade() : '' }}
                                      </td>
                                      <td class="score-position">
                                        {{ !is_null($score) ? $score->position() : '' }}
                                      </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Admin Number</th>
                                    <th>Name</th>
                                    <th>Sex</th>
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
@elseif(isset($session) && !is_null($session) && $session->term() == 'second')
          <div class="row">
             <div class="col-lg-12">
                 <div class="ibox float-e-margins">
                     <div class="ibox-title">
                         <h5>Update students {{ $session->term() }} term result</h5>
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
                                         <th>Admin Number</th>
                                         <th>Name</th>
                                         <th>Sex</th>
                                         <th>CA1</th>
                                         <th>CA2</th>
                                         <th>Exam</th>
                                         <th>Total</th>
                                         <th>Grade</th>
                                         <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($students as $student)
                                     <tr class="gradeX">
                                         <td>{{ $student->admin_number }}</td>
                                         <td><a href="#" title="Alaba profile" target="_blank">{{ $student->name }}</a></td>
                                         <td>{{ $student->sex }}</td>

                                         <?php $score = $student->student_subject_session_term_result($subject->subject->id, $session->id, 'second') ?>

                                           <form method="POST" action="{{ url('teacher/classrooms/'. $classroom->id .'/subjects/' . $subject->id . '/students/' .$student->id. '/results/create') }}">
                                               <input type="hidden" name="student_id" value="{{ $student->id }}">
                                               <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                                               <input type="hidden" name="subject_id" value="{{ $subject->subject->id }}">
                                               <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                                               <input type="hidden" name="session_id" value="{{ $session->id }}">
                                               <input type="hidden" name="term" value="{{ $session->term() }}">

                                               <td style="width: 13%;">
                                                   <div class="input-group">
                                                       <input type="number" name="first_ca" class="form-control first_ca" value="{{ !is_null($score) ? $score->first_ca : '' }}" max="20" min="0"><span class="input-group-addon"><i>/20</i></span>
                                                   </div>
                                               </td>
                                               <td style="width: 13%;">
                                                   <div class="input-group">
                                                       <input type="number" name="second_ca" class="form-control second_ca" value="{{ !is_null($score) ? $score->second_ca : '' }}" max="20" min="0"><span class="input-group-addon"><i>/20</i></span>
                                                   </div>
                                               </td>
                                               <td style="width: 13%;">
                                                   <div class="input-group">
                                                       <input type="number" name="exam" class="form-control exam" value="{{ !is_null($score) ? $score->exam : '' }}" max="60" min="0"><span class="input-group-addon"><i>/60</i></span>
                                                   </div>
                                               </td>
                                           </form>
                                           <td class="total-score">
                                                {{ !is_null($score) ? $score->total() : '' }}
                                           </td>
                                           <td class="score-grade">
                                             {{ !is_null($score) ? $score->grade() : '' }}
                                           </td>
                                           <td class="score-position">
                                             {{ !is_null($score) ? $score->position() : '' }}
                                           </td>
                                     </tr>
                                     @endforeach
                                     </tbody>
                                     <tfoot>
                                     <tr>
                                         <th>Admin Number</th>
                                         <th>Name</th>
                                         <th>Sex</th>
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

         @elseif(isset($session) && !is_null($session) && $session->term() == 'third')
                   <div class="row">
                      <div class="col-lg-12">
                          <div class="ibox float-e-margins">
                              <div class="ibox-title">
                                  <h5>Update students {{ $session->term() }} term result</h5>
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
                                                  <th>Admin Number</th>
                                                  <th>Name</th>
                                                  <th>Sex</th>
                                                  <th>CA1</th>
                                                  <th>CA2</th>
                                                  <th>Exam</th>
                                                  <th>Total</th>
                                                  <th>Grade</th>
                                                  <th>Position</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($students as $student)
                                              <tr class="gradeX">
                                                  <td>{{ $student->admin_number }}</td>
                                                  <td><a href="#" title="Alaba profile" target="_blank">{{ $student->name }}</a></td>
                                                  <td>{{ $student->sex }}</td>

                                                  <?php $score = $student->student_subject_session_term_result($subject->subject->id, $session->id, 'third') ?>

                                                    <form method="POST" action="{{ url('teacher/classrooms/'. $classroom->id .'/subjects/' . $subject->id . '/students/' .$student->id. '/results/create') }}">
                                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                        <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                                                        <input type="hidden" name="subject_id" value="{{ $subject->subject->id }}">
                                                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                                                        <input type="hidden" name="session_id" value="{{ $session->id }}">
                                                        <input type="hidden" name="term" value="{{ $session->term() }}">

                                                        <td style="width: 13%;">
                                                            <div class="input-group">
                                                                <input type="number" name="first_ca" class="form-control first_ca" value="{{ !is_null($score) ? $score->first_ca : '' }}" max="20" min="0"><span class="input-group-addon"><i>/20</i></span>
                                                            </div>
                                                        </td>
                                                        <td style="width: 13%;">
                                                            <div class="input-group">
                                                                <input type="number" name="second_ca" class="form-control second_ca" value="{{ !is_null($score) ? $score->second_ca : '' }}" max="20" min="0"><span class="input-group-addon"><i>/20</i></span>
                                                            </div>
                                                        </td>
                                                        <td style="width: 13%;">
                                                            <div class="input-group">
                                                                <input type="number" name="exam" class="form-control exam" value="{{ !is_null($score) ? $score->exam : '' }}" max="60" min="0"><span class="input-group-addon"><i>/60</i></span>
                                                            </div>
                                                        </td>
                                                    </form>
                                                    <td class="total-score">
                                                         {{ !is_null($score) ? $score->total() : '' }}
                                                    </td>
                                                    <td class="score-grade">
                                                      {{ !is_null($score) ? $score->grade() : '' }}
                                                    </td>
                                                    <td class="score-position">
                                                      {{ !is_null($score) ? $score->position() : '' }}
                                                    </td>
                                              </tr>
                                              @endforeach
                                              </tbody>
                                              <tfoot>
                                              <tr>
                                                  <th>Admin Number</th>
                                                  <th>Name</th>
                                                  <th>Sex</th>
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
@endif

 </div>

@endsection


@section('scripts')

<script src=" {{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
        <script>
                 $(document).ready(function(){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('input.first_ca').change(function(){
                        if($(this).val() > 20){
                            $(this).addClass('text-danger');
                        }else{
                            if($(this).hasClass('text-danger')) {
                                $(this).removeClass('text-danger')
                                }
                        }
                    });

                    $('input.second_ca').change(function(){
                        if($(this).val() > 20){
                            $(this).addClass('text-danger');
                        }else{
                             if($(this).hasClass('text-danger')) {
                                 $(this).removeClass('text-danger')
                                 }
                         }
                    });


                    $('input.exam').change(function(){
                        if($(this).val() > 60){
                            $(this).addClass('text-danger');
                        }else{
                             if($(this).hasClass('text-danger')) {
                                 $(this).removeClass('text-danger')
                                 }
                         }
                    });

                    var $student_score = $('input.first_ca, input.second_ca, input.exam');


                    $student_score.change(function(){

                     //  alert($(this).val());
                      $update_score = $(this);
                      $form = $(this).closest('tr').children('form');
                      $form_url = $form.attr('action');

                       $.ajax({
                             type: "POST",
                             url: $form_url,
                             data: $form.serialize(),
                             beforeSend: function(){
                                    //alert('before');
                             },
                             success: function(data){

                                    $update_score.closest('tr').children('.total-score').text(data.total);
                                    $update_score.closest('tr').children('.score-grade').text(data.grade);
                                    $update_score.closest('tr').children('.score-position').text(data.position);

                                }
                       });

                    });


        $('.subjects-score-dataTables').DataTable({

                pageLength: 50,
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
@endsection