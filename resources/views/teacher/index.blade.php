@extends('layouts.app')

@section('title', 'Teachers')

@section('styles')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School teachers</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="#">All school teachers</a>
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
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Searchable list of teachers</h5>
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
                                        <table class="table table-striped table-bordered table-hover students-dataTables" >
                                        <thead>
                                            <tr>
                                                <th>Staff ID</th>
                                                <th>Name</th>
                                                <th>Sex</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                {{--<th>Action</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($teachers as $teacher)
                                            <tr class="gradeX">
                                                <td>{{ $teacher->staff_id }}</td>
                                                <td>
                                                    <a class="link-info" href="{{ url('admin/teachers/' . $teacher->id) }}" target="_blank" title="{{ "View " . $teacher->name . ' details'}}">{{ $teacher->name }}</a>
                                                 </td>
                                                <td>{{ $teacher->sex }}</td>
                                                <td class="center">{{ $teacher->address }}</td>
                                                <td class="center">{{ $teacher->phone }}</td>
                                                <td class="center">{{ $teacher->email }}</td>
                                                {{--<td class="center">--}}
                                                    {{--<div class="btn-group">--}}
                                                          {{--<a type="button" class="btn btn-outline btn-xs btn-primary" href="{{ url('admin/teachers/' . $teacher->id) }}" target="_blank">View</a>--}}
                                                    {{--</div>--}}
                                                {{--</td>--}}
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Staff ID</th>
                                                <th>Name</th>
                                                <th>Sex</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                {{--<th>Action</th>--}}
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


            $('.students-dataTables').DataTable({

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