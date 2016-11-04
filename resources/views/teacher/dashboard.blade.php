@extends('layouts.app')

@section('title', 'Teacher')

@section('styles')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Teacher</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{ url('teacher') }}">Home</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
@endsection

@section('content')
<div class="wrapper wrapper-content">
<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Classes</h5>
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
                    <table class="table table-striped table-bordered table-hover .teacher-classroom-dataTables" >
                    <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Level</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teacher->classrooms as $class)
                    <tr class="gradeA">
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->level->name }}</td>
                        <td>{{ $class->students()->where('sex', '=', 'Male')->count() }}</td>
                        <td>{{ $class->students()->where('sex', '=', 'Female')->count() }}</td>
                        <td>{{ $class->students()->count() }}</td>
                        <td class="center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-outline btn-xs btn-primary" href="{{ url('teacher/classrooms/' . $class->id) }}" target="_blank">View</a>
                            </div>
                        </td>

                    </tr>
                   @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Class Name</th>
                        <th>Level</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Subjects </h5>
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
                        <th>Subject Name</th>
                        <th>Category </th>
                        <th>Subject code</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teacher->classroom_subjects as $subject)
                    <tr class="gradeA">
                        <td>{{ $subject->subject->name }}</td>
                        <td>{{ $subject->subject->category or 'N/A' }}</td>
                        <td>{{ $subject->subject->short_name or 'N/A' }}</td>
                        <td>{{ $subject->classroom->name or 'N/A' }}</td>
                        <td class="center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-outline btn-xs btn-primary" href="{{ url('teacher/classrooms/' . $subject->classroom_id . '/subjects/' . $subject->subject_id) }}">View</a>
                            </div>
                        </td>

                    </tr>
                   @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Subject Name</th>
                        <th>Category </th>
                        <th>Subject code</th>
                        <th>Class</th>
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


            $('.teacher-classroom-dataTables').DataTable({

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

@endsection