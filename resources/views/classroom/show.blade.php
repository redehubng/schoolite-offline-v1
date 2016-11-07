@extends('layouts.app')

@section('title', $classroom->name)

@section('styles')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School Class - {{ $classroom->name }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('admin/classrooms') }}">Classrooms</a>
                </li>
                 <li class="active">
                    <a href="{{ url('admin/classrooms/' . $classroom->id ) }}"> {{ $classroom->name }}</a>
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
                                <h4 class="modal-title">{{ $classroom->name }}</h4>

                            </div>
                            <form class="form-horizontal" method="POST" action="{{ url('admin/classrooms/' . $classroom->id ) }}  ">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="modal-body">

                             @if (count($errors) > 0)
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li> {{ $error }} </li>
                                          @endforeach
                                      </ul>
                                  </div>
                               @endif

                            {{ csrf_field() }}

                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Class Name *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="classroom aname" class="form-control" type="text" name="name"  required="" value="{{ $classroom->name }}">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-lg-4 control-label">First term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for first term" class="form-control" type="number" name="first_term_charges" required="" value="{{ $classroom->first_term_charges }}">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Second term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for second term" class="form-control" type="number" name="second_term_charges" required="" value="{{ $classroom->second_term_charges }}">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Third term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for third term" class="form-control" type="number" name="third_term_charges" required="" value="{{ $classroom->third_term_charges }}">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Class teacher</label>
                                  <div class="col-lg-8">
                                      <select name="teacher_id" class="form-control">
                                          <option>--select--</option>
                                           @foreach($teachers as $teacher)
                                              <option value="{{ $teacher->id }}" {{ $classroom->teacher->id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                          @endforeach
                                      </select><span class="help-block m-b-none">a teacher in charge of the class</span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Level</label>
                                  <div class="col-lg-8">
                                      <select name="level_id" class="form-control">
                                          <option>--select--</option>
                                           @foreach($levels as $level)
                                              <option value="{{ $level->id }} " {{ $classroom->level->id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                                          @endforeach
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
@endsection

@section('content')

<div class="wrapper wrapper-content">

@if(isset($session) && !is_null($session) && ($session->term() == 'third' || $session->third_term == 'closed'))
<div class="row m-b-md">
    <div class="col-lg-6">
            <form action="{{ url('admin/classrooms/' . $classroom->id . '/promote') }}" method="post" id="promote">
            {{ csrf_field() }}
                 <div class="input-group m-b"><span class="input-group-btn">
                      <button  type="submit" class="btn btn-primary btn-block" id="promote">Promote all to</button></span>

                      <select class="form-control" name="promoted_to_classroom_id">
                         @foreach($classrooms as $promoted_to_classroom)
                             @if($classroom->level->rank < $promoted_to_classroom->level->rank)
                                 <option value="{{ $promoted_to_classroom->id }}">{{ $promoted_to_classroom->name }}</option>
                             @endif
                         @endforeach
                      </select>
                  </div>

            </form>
        </div>

    <div class="col-lg-6">
        <form action="{{ url('admin/classrooms/' . $classroom->id . '/repeat') }}" method="post" id="repeat">
        {!! csrf_field() !!}
                <div class="input-group m-b"><span class="input-group-btn">
                     <button  type="submit" class="btn btn-warning btn-block" id="repeat-all">Repeat to</button></span>
                     <select class="form-control" name="repeated_to_classroom_id">
                     @foreach($classrooms as $repeated_to_class)
                         @if($classroom->level->rank >= $repeated_to_class->level->rank )
                             <option value="{{ $repeated_to_class->id }}">{{ $repeated_to_class->name }}</option>
                         @endif
                     @endforeach
                     </select>
                 </div>
        </form>
    </div>
</div>
@endif

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Students in {{ $classroom->name }}</h5>
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
                        @if($classroom->students()->count() == 0)
                            {{ "no student added yet" }}
                        @else
                            @foreach($classroom->students as $student)
                                <tr class="gradeA">
                                    <td>{{ $student->admin_number }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->sex }}</td>
                                    <td>{{ $student->dob->format('d/m/Y') }}</td>
                                    <td>{{ $student->house->name }}</td>
                                    <td>{{ $student->guardian->name }}</td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-outline btn-xs btn-primary" href="{{ url('admin/students/' . $student->id) }}" target="_blank">View</a>
                                        </div>
                                    </td>

                                </tr>
                               @endforeach
                        @endif
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
                <h5>Subjects taken in {{ $classroom->name }}</h5>
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

                                @foreach($classroom_subjects as $subject)

                                             <div class="modal inmodal" id="change-class-subject-teacher{{ $subject->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated bounceInRight">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title">{{ $classroom->name . ' '  . $subject->subject->name}}</h4>

                                                            </div>
                                                            <form class="form-horizontal" method="POST" action="{{ url('admin/classroom_subjects/' . $subject->id ) }}  ">

                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}

                                                            <div class="modal-body m-b-md">

                                                             @if (count($errors) > 0)
                                                                  <div class="alert alert-danger">
                                                                      <ul>
                                                                          @foreach ($errors->all() as $error)
                                                                              <li> {{ $error }} </li>
                                                                          @endforeach
                                                                      </ul>
                                                                  </div>
                                                               @endif

                                                            {{ csrf_field() }}

                                                              <div class="form-group">
                                                                  <label class="col-lg-4 control-label">Subject teacher</label>
                                                                  <div class="col-lg-8">
                                                                      <select name="teacher_id" class="form-control">
                                                                          <option>--select--</option>
                                                                           @foreach($teachers as $teacher)
                                                                              <option value="{{ $teacher->id }}" {{ $subject->teacher->id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                                                          @endforeach
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
                                        <td>{{ $subject->subject->name }}</td>
                                        <td>{{ $subject->teacher->name }}</td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline btn-xs btn-primary">View</button>
                                                <button type="button" class="btn btn-outline btn-xs btn-primary" data-toggle="modal" data-target="#change-class-subject-teacher{{ $subject->id }}">Edit</button>
                                            </div>
                                        </td>

                                    </tr>
                                   @endforeach

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
                    <h5>Add subject {{ $classroom->name }}</h5>
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
                     @if (count($errors) > 0)
                             <!-- Form Error List -->
                             <div class="alert alert-danger">
                                 <strong>Whoops! Something went wrong!</strong>
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
                    <form class="form-horizontal" method="POST" action="{{ url('admin/classroom_subjects/') }}">
                     {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Subject *</label>
                            <div class="col-lg-8">
                                <select name="subject_id" class="form-control" required>
                                <option value="">--select--</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Teacher *</label>
                            <div class="col-lg-8">
                                <select name="teacher_id" class="form-control">
                                <option value="">--select--</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                                </select><span class="help-block m-b-none">a teacher taking the subject</span>
                            </div>
                        </div>

                        <input type="hidden" value="{{ $classroom->id }}" name="classroom_id" required>
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

@endsection

@section('scripts')
<script src=" {{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
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

@endsection