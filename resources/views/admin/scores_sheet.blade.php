@extends('layouts.app')

@section('title', 'Score sheets')

@section('styles')
<link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Scores sheet </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="{{ url('#') }}">Scores sheet</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
@endsection

@section('content')

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
                                @foreach($results as $result)
                                <tr class="gradeX">
                                    <td>{{ $result->student->name }}</td>
                                    <td>{{ $result->student->admin_number }}</td>
                                    <td>{{ $result->session->name }}</td>
                                    <td>{{ $result->classroom->name }}</td>
                                    <td>{{ $result->classroom->level->name }}</td>
                                    <td>{{ $result->subject->short_name }}</td>
                                    <td>{{ $result->term }}</td>
                                    <td>{{ !is_null($result) ? $result->first_ca : '' }}</td>
                                    <td>{{ !is_null($result) ? $result->second_ca : '' }}</td>
                                    <td>{{ !is_null($result) ? $result->exam : '' }}</td>
                                      {{--<form method="POST" action="{{ url('admin/students/'. $result->student_id .'/results/session/' . $result->session_id . '/update') }}">--}}

                                          {{--<input type="hidden" name="result_id" value="{{ $result->id }}">--}}
                                          {{--<input type="hidden" name="student_id" value="{{ $result->student_id }}">--}}
                                          {{--<input type="hidden" name="classroom_id" value="{{ $result->classroom_id }}">--}}
                                          {{--<input type="hidden" name="subject_id" value="{{ $result->subject_id }}">--}}
                                          {{--<input type="hidden" name="teacher_id" value="{{ $result->teacher_id }}">--}}
                                          {{--<input type="hidden" name="session_id" value="{{ $result->session_id }}">--}}
                                          {{--<input type="hidden" name="term" value="{{ $result->term }}">--}}

                                          {{--<td style="max-width: 80px">--}}
                                            {{--<input style="max-width: 80px;" type="number" name="first_ca" class="form-control first_ca" value="{{ !is_null($result) ? $result->first_ca : '' }}" max="20" min="0">--}}
                                          {{--</td>--}}
                                          {{--<td style="max-width: 80px">--}}
                                                {{--<input style="max-width: 80px;" type="number" name="second_ca" class="form-control second_ca" value="{{ !is_null($result) ? $result->second_ca : '' }}" max="20" min="0">--}}

                                          {{--</td>--}}
                                          {{--<td style="max-width: 80px">--}}
                                          {{--<input  style="max-width: 80px;" type="number" name="exam" class="form-control exam" value="{{ !is_null($result) ? $result->exam : '' }}" max="60" min="0">--}}

                                          {{--</td>--}}
                                      {{--</form>--}}
                                      <td class="total-score">
                                           {{ !is_null($result) ? $result->total() : '' }}
                                      </td>
                                      <td class="score-grade">
                                        {{ !is_null($result) ? $result->grade() : '' }}
                                      </td>
                                      <td class="score-position">
                                        {{ !is_null($result) ? $result->position() : '' }}
                                      </td>
                                </tr>
                                @endforeach
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
@endsection