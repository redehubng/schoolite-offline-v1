@extends('layouts.app')

@section('title', $student->name)

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $student->name }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('guardian') }}">Home</a>
                </li>
                <li class="active">
                    <a href="{{ url('guardian/wards/' . $student->id) }}">{{ $student->name }}</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
@endsection

@section('content')

<div class="wrapper wrapper-content">


@include('layouts.partials.student.profile')


<div class="row m-t-sm">
    @if(isset($session) && !is_null($session) && ($student->term_result($session->id, 'first')->count() > 0) )
    <div class="col-lg-4">
    <a href="{{ url('guardian/wards/'. $student->id .  '/results?session_id=' . $session->id . '&&term=' . 'first' . '&&classroom_id=' . $student->classroom_id) }}" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs">{{ $student->term_percentage($student->term_result($session->id, 'first')) . '%' }}</h1>
                <h3 class="font-bold no-margins">
                    1st Term Results
                </h3>
                <small>Total subject recorded: {{ $student->term_result($session->id, 'first')->count() }}</small>
            </div>
        </div>
      </a>
    </div>
    @endif

    @if(isset($session) && !is_null($session) && ($student->term_result($session->id, 'second')->count() > 0) )
    <div class="col-lg-4">
    <a href="{{ url('teacher/classrooms/'.$classroom->id .'/students/'.$student->id.'/results?session_id=' . $session->id . '&&term=' . 'second') }}" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs">{{ $student->term_percentage($student->term_result($session->id, 'second')) . '%' }}</h1>
                <h3 class="font-bold no-margins">
                    2nd Term Results
                </h3>
                <small>Total subject recorded: {{ $student->term_result($session->id, 'second')->count() }}</small>
            </div>
        </div>
      </a>
    </div>
    @endif

    @if(isset($session) && !is_null($session) && ($student->term_result($session->id, 'third')->count() > 0) )
    <div class="col-lg-4">
    <a href="{{ url('teacher/classrooms/'.$classroom->id .'/students/'.$student->id.'/results?session_id=' . $session->id . '&&term=' . 'third') }}" title="click to view results" target="_blank">
        <div class="widget lazur-bg p-lg text-center">
            <div class="m-b-md">
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h1 class="m-xs">{{ $student->term_percentage($student->term_result($session->id, 'third')) . '%' }}</h1>
                <h3 class="font-bold no-margins">
                    3rd Term Results
                </h3>
                <small>Total subject recorded: {{ $student->term_result($session->id, 'third')->count() }}</small>
            </div>
        </div>
      </a>
    </div>
    @endif

</div>

</div>

@endsection