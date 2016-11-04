@extends('layouts.app')

@section('title', 'Admin - dashboard')

@section('styles')

@endsection

@section('content')

<div class="wrapper wrapper-content">
<div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <h5 class="pull-left">Total Active Students</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="text-center">{{ $total_students }}</h1>
                        <div class="pull-left font-bold text-success">{{ $total_male_students }} <i class="fa fa-male"></i></div>
                        <div class="pull-right font-bold text-success">{{ $total_female_students }} <i class="fa fa-female"></i></div>
                    </div>
                </div>
            </div>

           <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <h5 class="pull-left">Total Active Teachers</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="text-center">{{ $total_teachers }}</h1>
                        <div class="pull-left font-bold text-success">{{ $total_male_teachers }} <i class="fa fa-male"></i></div>
                        <div class="pull-right font-bold text-success">{{ $total_female_teachers }} <i class="fa fa-female"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
               <div class="ibox float-e-margins">
                   <div class="ibox-title">
                      <h5 class="pull-left">Total Graduated Students</h5>
                   </div>
                   <div class="ibox-content">
                       <h1 class="text-center">{{  $total_graduated_students or 0  }}</h1>
                       <div class="pull-left font-bold text-success">{{ $total_graduated_male_students or 0 }} <i class="fa fa-male"></i></div>
                       <div class="pull-right font-bold text-success">{{ $total_graduated_female_students or 0}} <i class="fa fa-female"></i></div>
                   </div>
               </div>
           </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">@if(isset($session) && !is_null($session)) {{ $session->term() }}@else{{ 'No session' }} @endif</span>
                        <h5>Expected Payment</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="text-center">@if(isset($session) && !is_null($session)) {{ expected_term_payment($session, $session->term() ) }}@else{{ 'No session' }} @endif</h1>
                        <div class="pull-left font-bold text-success">{{ '75000' }} <i class="fa fa-check"></i></div>
                        <div class="pull-right font-bold text-success">{{ 100 }} <i>&percnt;</i></div>
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