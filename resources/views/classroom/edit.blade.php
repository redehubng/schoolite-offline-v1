@extends('layouts.app')

@section('title', 'Classrooms')

@section('styles')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School Classrooms</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="#">Manage classrooms</a>
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
                          <h5>Create New Classroom</h5>
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
                          <form class="form-horizontal" method="POST" action="{{ url('admin/classrooms') }}  ">
                            {{ csrf_field() }}

                              <div class="form-group">
                                  <label class="col-lg-2 control-label">Class Name *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="level name" class="form-control" type="text" name="name" autofocus="" required="">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-lg-2 control-label">First term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for first term" class="form-control" type="number" name="first_term_charges" required="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 control-label">Second term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for second term" class="form-control" type="number" name="second_term_charges" required="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 control-label">Third term charges *</label>
                                  <div class="col-lg-8">
                                      <input placeholder="fee for third term" class="form-control" type="number" name="third_term_charges" required="">
                                  </div>
                              </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Class teacher</label>
                                  <div class="col-lg-8">
                                      <select name="teacher_id" class="form-control">
                                          <option>--select--</option>
                                           @foreach($teachers as $teacher)
                                              <option value="{{ $teacher->id }} ">{{ $teacher->name }}</option>
                                          @endforeach
                                      </select><span class="help-block m-b-none">a teacher in charge of the class</span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-lg-2 control-label">Level</label>
                                  <div class="col-lg-8">
                                      <select name="level_id" class="form-control">
                                          <option>--select--</option>
                                           @foreach($levels as $level)
                                              <option value="{{ $level->id }} ">{{ $level->name }}</option>
                                          @endforeach
                                      </select><span class="help-block m-b-none">class level</span>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-8">
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
