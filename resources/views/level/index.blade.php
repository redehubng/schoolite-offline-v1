@extends('layouts.app')

@section('title', 'Levels')

@section('styles')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School Levels</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="#">Manage levels</a>
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
                    <h5>Levels</h5>
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
                                        <table class="table table-striped table-bordered table-hover levels-dataTables" >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Adviser</th>
                                                <th>Rank</th>
                                                <th>Number of classes</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($levels as $level)
                                            <tr class="gradeX">
                                                <td>{{ $level->name }}</td>
                                                <td>{{ $level->teacher->name }}</td>
                                                <td>{{ $level->rank }}</td>
                                                <td class="center">{{ $level->classes()->count() }}</td>
                                                <td class="center">
                                                    <div class="btn-group">
                                                          <a type="button" class="btn btn-outline btn-xs btn-primary" href="{{ url('admin/levels/' . $level->id) }}" target="_blank">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Adviser</th>
                                                <th>Rank</th>
                                                <th>Number of classes</th>
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
                          <h5>Create New Level</h5>
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
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li> {{ $error }} </li>
                                  @endforeach
                              </ul>
                          </div>
                       @endif
                          <form class="form-horizontal" method="POST" action="{{ url('admin/levels') }}  ">
                            {{ csrf_field() }}

                              <p>Add new level</p>
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Level Name *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="level name" class="form-control" type="text" name="name" autofocus="" required="">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Level Rank *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="enter rank" class="form-control" type="number" name="rank" required=""><span class="help-block m-b-none">a number showing the position of the level</span>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Level Adviser</label>
                                  <div class="col-lg-8">
                                      <select name="teacher_id" class="form-control">
                                          <option>--select--</option>
                                           @foreach($teachers as $teacher)
                                              <option value="{{ $teacher->id }} ">{{ $teacher->name }}</option>
                                          @endforeach
                                      </select><span class="help-block m-b-none">a teacher in charge of the level</span>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-lg-offset-4 col-lg-8">
                                      <button class="btn btn-sm btn-white" type="submit">Add level</button>
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


            $('.levels-dataTables').DataTable({

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