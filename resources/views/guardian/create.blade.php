@extends('layouts.app')

@section('title', 'Add guardian')


@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create guardian record</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="#">Add guardian record</a>
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
                    <h5>Fill the form below to create a new staff record</h5>
                </div>

                <div class="ibox-content">
                    <!-- guardian registration form -->
                    <form method="POST" class="form" enctype="multipart/form-data" action="{{ url('admin/guardians') }}">
                             {{ csrf_field() }}

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
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">Title *</label>
                                                <select class="form-control input-lg" name="title" required>
                                                    <option></option>
                                                    <option value="Mr" {{ old('title') == 'Mr' ? 'selected' : '' }}>Mr</option>
                                                    <option value="Miss" {{ old('title') == 'Miss' ? 'selected' : '' }}>Miss</option>
                                                    <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                                    <option value="Dr" {{ old('title') == 'Dr' ? 'selected' : '' }}>Dr</option>
                                                    <option value="Prof" {{ old('title') == 'Prof' ? 'selected' : '' }}>Prof</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="control-label">Surname *</label>
                                                 <input placeholder="surname" class="form-control input-lg" type="text" name="surname" value="{{ old('surname') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="control-label">First name *</label>
                                                <input placeholder="first name" class="form-control input-lg" type="text" name="first_name" value="{{ old('first_name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">Middle name *</label>
                                                <input placeholder="middle name" class="form-control input-lg" type="text" name="middle_name" value="{{ old('middle_name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">Sex *</label>
                                                <select class="form-control input-lg" name="sex" required="" value="{{ old('sex') }}">
                                                    <option></option>
                                                    <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="control-label">Nationality *</label>
                                                <select class="form-control input-lg" name="country_id" id="country_id" required="">
                                                    <option></option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ (int)$country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="control-label">State of Origin *</label>
                                                <select class="form-control input-lg" name="state_id" id="state" required="">
                                                    <option value="">--select--</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="control-label">LGA *</label>
                                                <select class="form-control input-lg" name="lga_id" id="lga" required="">
                                                    <option value="">--select--</option>
                                                </select>
                                            </div>
                                        </div>

                                         <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="font-normal control-label">Occupation *</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-key"></i></span><input type="text" class="form-control input-lg" name="occupation" required="" value="{{ old('occupation') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-8">
                                            <img id="image_upload_preview" data-holder-rendered="true" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" style="width: 100px; height: 100px;" data-src="holder.js/100x100" class="img-rounded" alt="100x100">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" col-md-offset-2 col-md-6">
                                            <hr style="margin: 5px 0;">
                                            <div class="form-group">
                                                <input type="file" name="image" class="form-control input-lg" id="inputFile" value="{{ old('image') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">Phone *</label>
                                        <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-phone"></i></span><input type="tel" placeholder="phone" class="form-control input-lg" name="phone"  value="{{ old('phone') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">Email *</label>
                                          <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-at"></i></span><input type="email" placeholder="email" name="email" class="form-control input-lg" value="{{ old('email') }}" required="">
                                          </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Address *</label>
                                        <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-home"></i></span><input type="text" placeholder="address" class="form-control input-lg" name="address" required value="{{ old('address') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                           <div class="row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="font-normal control-label">Guardian ID *</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span><input type="text" class="form-control input-lg" name="guardian_id" required="" value="{{ old('guardian_id') }}">
                                        </div>
                                    </div>
                                </div>

                           </div>


                            <div class="hr-line-dashed"></div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-primary" type="submit">Create record</button>
                                    </div>
                                </div>
                            </div>

                    </form>
                    <!-- end gaurdian registration form -->
                </div>

            </div>
         </div>
    </div>

</div>
@endsection


@section('scripts')
<!-- Data picker -->
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

<script>
    $(document).ready(function(){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                     $('#dob').datepicker({
                            todayBtn: "linked",
                            keyboardNavigation: false,
                            forceParse: false,
                            calendarWeeks: true,
                            autoclose: true
                        });

                        $('#date_employed').datepicker({
                            todayBtn: "linked",
                            keyboardNavigation: false,
                            forceParse: false,
                            calendarWeeks: true,
                            autoclose: true
                        });

                       var $country = $('#country_id');

                       var $country_id = $country.val();

                       if($country_id !== ""){
                        $.ajax({
                             type: "POST",
                             url: window.location.protocol + "//" + window.location.host + "/get_list_of_states/" + $country_id,
                             success: function(data){
                                var $state = $('#state');
                                $state.empty();
                                $('<option value="">--select-state--</option>').appendTo('#state');
                                for(var i = 0; i < data.length; i++){
                                  $('<option value="' + data[i].id + '">' + data[i].name + '</option>').appendTo('#state');
                                }
                             }
                           });
                       }

                       $country.change(function(){
                       //$('#country').val([]);
                       var $country_id = $(this).val();

                       $.ajax({
                             type: "POST",
                             url: window.location.protocol + "//" + window.location.host + "/get_list_of_states/" + $country_id,
                             success: function(data){
                                var $state = $('#state');
                                $state.empty();
                                $('<option value="">--select-state--</option>').appendTo('#state');
                                for(var i = 0; i < data.length; i++){
                                  $('<option value="' + data[i].id + '">' + data[i].name + '</option>').appendTo('#state');
                                }
                             }
                           });
                      });

                      var $state = $('#state');

                         $state.change(function(){
                         //$('#country').val([]);
                         var $state_id = $(this).val();

                         $.ajax({
                               type: "POST",
                               url: window.location.protocol + "//" + window.location.host + "/get_list_of_lgas/" + $state_id,
                               success: function(data){
                                  var $lga = $('#lga');
                                  $lga.empty();
                                  $('<option value="">--select-lga--</option>').appendTo('#lga');
                                  for(var i = 0; i < data.length; i++){
                                    $('<option value="' + data[i].id + '">' + data[i].name + '</option>').appendTo('#lga');
                                  }
                               }
                             });
                        });

//

                    $('#dob .input-group.date').datepicker({
                        todayBtn: "linked",
                        keyboardNavigation: false,
                        forceParse: false,
                        calendarWeeks: true,
                        autoclose: true
                    });


                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#image_upload_preview').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $("#inputFile").change(function () {
                        readURL(this);
                    });

                });

</script>

@endsection