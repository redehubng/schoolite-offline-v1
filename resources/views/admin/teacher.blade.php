@extends('layouts.app')

@section('title', $teacher->name)

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $teacher->name . ' ' . $teacher->staff_id }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="{{ url('admin/teachers/') }}">Teachers</a>
                </li>
                <li class="active">
                    <a href="{{ url('#') }}">{{ $teacher->name . ' - ' . $teacher->staff_id  }}</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
</div>
@endsection

@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="{{ asset("storage/" . $teacher->image) }}" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h3 class="no-margins">
                                    {{ $teacher->name }}
                                </h3>
                                <h4>{{ $teacher->email }}( {{ $teacher->staff_id }} )</h4>
                                <h5 class="text-success">Status: {{ $teacher->status }}  Current Salary: #{{ $teacher->salary }}</h5>
                                <small>
                                    {{ $teacher->description }} <br> Current Salary: {{ $teacher->salary }}
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
                                Sex <strong>{{ $teacher->sex }}</strong>
                            </td>
                            <td>
                                Phone <strong>{{ $teacher->phone }}</strong>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                DOB <strong>{{ $teacher->dob }}</strong>
                            </td>
                            <td>
                                <strong>State of origin</strong> {{ $teacher->state->name }}, {{ $teacher->lga->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Marital status</strong> {{ $teacher->marital_status }}
                            </td>
                            <td>
                                <strong>Address</strong> {{ $teacher->address }}
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
                            <h5>{{ $teacher->name  . ' - '}}Subject(s) in charge</h5>
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
                                    @foreach($teacher->classroom_subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->subject->name }}</td>
                                            <td>{{ $subject->classroom->name }}</td>
                                            <td>{{ $subject->classroom->level->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>{{ $teacher->name . ' - '}} Classroom(s) in charge</h5>
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
                                    @foreach($teacher->classrooms as $class)
                                        <tr>
                                            <td>{{ $class->name }}</td>
                                            <td>{{ $class->level->name }}</td>
                                            <td>{{ '' }}</td>
                                            <td>{{ '' }}</td>
                                            <td>{{ '' }}</td>
                                        </tr>
                                    @endforeach
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
                                            <h5>{{ $teacher->name  . ' - '}}Level(s) in charge</h5>
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
                                                    @foreach($teacher->levels as $level)
                                                        <tr>
                                                            <td>{{ $level->name }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-7">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>{{ $teacher->name . ' - '}} House(s) in charge</h5>
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
                                                    @foreach($teacher->houses as $house)
                                                        <tr>
                                                            <td>{{ $house->name }}</td>
                                                            <td>{{ '' }}</td>
                                                            <td>{{ '' }}</td>
                                                            <td>{{ '' }}</td>
                                                        </tr>
                                                    @endforeach
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

@endsection





@section('scripts')

    <script>


    </script>

@endsection