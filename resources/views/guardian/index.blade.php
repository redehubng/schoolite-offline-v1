@extends('layouts.app')

@section('title', 'Guardians')

@section('styles')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School guardians</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="#">All school guardians</a>
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
                    <h5>Searchable list of guardians</h5>
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
                                        <table class="table table-striped table-bordered table-hover guardians-dataTables" >
                                        <thead>
                                            <tr>
                                                <th>Guardian ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Sex</th>
                                                <th>Ward(s)</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($guardians as $guardian)
                                            <tr class="gradeX">
                                                <td>{{ $guardian->guardian_id }}</td>
                                                <td><a href="#" title="Guardian profile" target="_blank">{{ $guardian->name }}</a></td>
                                                <td class="center">{{ $guardian->address }}</td>
                                                <td class="center">{{ $guardian->phone }}</td>
                                                <td class="center">{{ $guardian->email }}</td>
                                                <td>{{ $guardian->sex }}</td>
                                                <td>{{ $guardian->wards()->count() }}</td>
                                                <td class="center">
                                                    <div class="btn-group">
                                                          <a type="button" class="btn btn-outline btn-xs btn-primary" href="{{ url('admin/guardians/' . $guardian->id) }}" target="_blank">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Guardian ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Sex</th>
                                                <th>Ward(s)</th>
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


            $('.guardians-dataTables').DataTable({

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