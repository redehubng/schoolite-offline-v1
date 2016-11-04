@extends('layouts.app')

@section('title', 'Houses')

@section('styles')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School sport houses</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="#">Houses</a>
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
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Sport houses</h5>
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
                                        <table class="table table-striped table-bordered table-hover sessions-dataTables" >
                                        <thead>
                                        <tr>
                                            <th>House Name</th>
                                            <th>House master</th>
                                            <th>Females</th>
                                            <th>Males</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($houses as $house)

                                        <tr>
                                            <td>
                                                {{ $house->name }}
                                            </td>
                                            <td>
                                                {{ $house->teacher->name }}
                                            </td>
                                            <td>
                                                {{ $house->females()->count() }}
                                            </td>
                                            <td>
                                                {{ $house->males()->count() }}
                                            </td>
                                            <td>
                                                {{ $house->total() }}
                                            </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <a type="button" class="btn btn-outline btn-xs btn-primary" href="{{ url('admin/houses/' . $house->id) }}" target="_blank">View</a>
                                                </div>
                                            </td>

                                        </tr>
                                       @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Session Name</th>
                                            <th>Session Status</th>
                                            <th>First Term</th>
                                            <th>Second Term</th>
                                            <th>Third Term</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        </table>
                    </div>
                </div>
            </div>
        </div>
       <div class="col-lg-4">
                           <div class="ibox float-e-margins">
                               <div class="ibox-title">
                                   <h5>Create New House</h5>
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

                                   <form class="form-horizontal" method="POST" action="{{ url('admin/houses') }}">
                                       {{ csrf_field() }}
                                       <p>Add new House</p>
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
                                       <div class="form-group">
                                           <label class="col-lg-4 control-label">House Name *</label>
                                           <div class="col-lg-8">
                                               <input placeholder="house name" class="form-control" type="text" name="name" autofocus="" required="">
                                           </div>
                                       </div>

                                       <div class="form-group">
                                           <label class="col-lg-4 control-label">House master *</label>
                                           <div class="col-lg-8">
                                               <select name="teacher_id" class="form-control" required>
                                               <option value="">--select--</option>
                                               @if($teachers->isEmpty())
                                               <option value="">No teacher available</option>
                                               @else
                                                   @foreach($teachers as $teacher)
                                                       <option value="{{ $teacher->id }}">{{ $teacher->name . '(' . $teacher->staff_id . ')' }}</option>
                                                   @endforeach
                                               @endif
                                               </select><span class="help-block m-b-none">a teacher in charge of the house</span>
                                           </div>
                                       </div>

                                       <div class="form-group">
                                           <div class="col-lg-offset-4 col-lg-8">
                                               <button class="btn btn-sm btn-white" type="submit">Add House</button>
                                           </div>
                                       </div>
                                   </form>

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


            $('.sessions-dataTables').DataTable({

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