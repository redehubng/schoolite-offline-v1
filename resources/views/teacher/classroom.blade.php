@extends('layouts.app')

@section('title', $classroom->name)

@section('styles')

@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $classroom->name }} Students</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('teacher') }}">Home</a>
                </li>
                <li class="active">
                    <a href="{{ url('admin/classrooms/' . $classroom->id) }}">{{ $classroom->name }}</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
@endsection

@section('content')
<div class="wrapper wrapper-content">
@if(isset($session) && !is_null($session) && ($session->term() == 'third' || $session->third_term == 'closed'))
<div class="row m-b-md">
    <div class="col-lg-6">
            <form action="{{ url('teacher/classrooms/' . $classroom->id . '/promote') }}" method="post" id="promote">
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
        <form action="{{ url('teacher/classrooms/' . $classroom->id . '/repeat') }}" method="post" id="repeat">
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


<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>List of all students in {{ $classroom->name }}</h5>
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
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>Admin NO.</th>
                                        <th>Name </th>
                                        <th>Sex </th>
                                        <th>House</th>
                                        <th>Parent</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($classroom->students as $student)
                                    <tr class="gradeA">
                                        <td>{{ $student->admin_number }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->sex }}</td>
                                        <td>{{ $student->house->name }}</td>
                                        <td>{{ $student->guardian->name }}</td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-outline btn-xs btn-primary" href="{{ url('teacher/classrooms/' .  $classroom->id  . '/students/' . $student->id ) }}">View</a>
                                            </div>
                                        </td>

                                    </tr>
                                   @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Admin NO.</th>
                                        <th>Name </th>
                                        <th>Sex </th>
                                        <th>House</th>
                                        <th>Parent</th>
                                        <th>Action</th>
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

            $('.dataTables-example').DataTable({
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

            /* Init DataTables */
            var oTable = $('#editable').DataTable();
            });


         </script>
@endsection