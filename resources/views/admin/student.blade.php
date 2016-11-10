@extends('layouts.app')

@section('title', $student->name)

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $student->name . ' ' . $student->admin_number }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="{{ url('admin/students/') }}">Students</a>
                </li>
                <li class="active">
                    <a href="{{ url('#') }}">{{ $student->name }}</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <button type="button" class="btn btn-primary m-t-md" data-toggle="modal" data-target="#edit-student-info">
                Edit info
            </button>
             <div class="modal inmodal" id="edit-student-info" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <img id="image_upload_preview" data-holder-rendered="true" src="{{ is_file(asset('storage/' . $student->image)) ? asset('storage/' . $student->image) : asset('storage/images/' . strtolower($student->sex) . '.png') }}"  class="img-circle circle-border m-b-md" alt="student passport" width="100px">

                                <h4 class="modal-title">{{ $student->name }}</h4>

                            </div>
                            <form method="POST" class="form" enctype="multipart/form-data" action="{{ url('admin/students/' . $student->id) }}">
                            <div class="modal-body">



                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

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
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">Surname *</label>

                                                 <input placeholder="surname" class="form-control input-lg" type="text" name="surname" value="{{ trim(explode(' ', $student->name)[0]) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">First name *</label>
                                                <input placeholder="first name" class="form-control input-lg" type="text" name="first_name" value="{{ trim(explode(' ', $student->name)[1]) }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">Middle name *</label>
                                                <input placeholder="middle name" class="form-control input-lg" type="text" name="middle_name" value="{{ isset(explode(' ', $student->name)[2]) ? trim(explode(' ', $student->name)[2]) : null }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">Sex *</label>
                                                <select class="form-control input-lg" name="sex" required="">
                                                    <option></option>
                                                    <option value="Male" {{ $student->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ $student->sex == 'Female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="font-normal control-label">DOB *</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" id="dob" class="form-control input-lg" name="dob" value="{{ $student->dob->format('m/d/Y') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <div class="input-group">
                                                   <span class="input-group-addon"><i class="fa fa-phone"></i></span><input type="tel" placeholder="phone" class="form-control input-lg" name="phone"  value="{{ $student->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                           <div class="row">
                               <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                          <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-at"></i></span><input type="email" placeholder="email" name="email" class="form-control input-lg" value="{{ $student->email }}">
                                          </div>
                                    </div>
                                </div>
                                   <div class="col-lg-4">
                                       <div class="form-group">
                                           <label class="control-label">Class *</label>
                                           <select class="form-control input-lg" name="classroom_id" required="">
                                           <option>--select--</option>
                                           @foreach($classrooms as $classroom)
                                               <option value="{{ $classroom->id }}" {{ $student->classroom_id == $classroom->id ? 'selected' : ''}}>{{ $classroom->name }}</option>
                                           @endforeach
                                           </select>
                                       </div>
                                   </div>

                                   <div class="col-lg-4">
                                       <div class="form-group">
                                           <label class="control-label">Sport house *</label>
                                           <select class="form-control input-lg" name="house_id" required="">
                                               <option>--select--</option>
                                               @foreach($houses as $house)
                                               <option value="{{ $house->id }}" {{ $student->house_id == $house->id ? 'selected' : ''}}>{{ $house->name }}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>

                               </div>
                               <div class="row">
                                <div class="col-lg-6">
                                   <div class="form-group">
                                       <label class="control-label">Address *</label>
                                       <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-home"></i></span><input type="text" placeholder="address" class="form-control input-lg" name="address" required value="{{ $student->address }}">
                                       </div>
                                   </div>
                               </div>
                                <div class="col-lg-6">
                                       <div class="form-group">
                                           <label class="control-label">Guardian *</label>
                                           <select class="form-control input-lg" name="guardian_id" required="">
                                               <option>--select-</option>
                                               @foreach($guardians as $guardian)
                                                <option value="{{ $guardian->id }}" {{ $student->guardian_id == $guardian->id ? 'selected' : ''}}>{{ $guardian->name }}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>

                               </div>
                           <div class="row">
                               <div class="col-lg-12">
                                   <div class="form-group">
                                       <label class="control-label">Comment</label>
                                       <textarea class="form-control" name="comment" placeholder="note about students">{{ $student->comment }}</textarea>
                                   </div>
                               </div>
                           </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                     </form>
                     </div>
                </div>
            </div>
        </div>
</div>
@endsection

@section('content')

<div class="wrapper wrapper-content">

@if(isset($session) && !is_null($session) && ($session->term() == 'third' || $session->third_term == 'closed'))
<div class="row m-b-md">
    <div class="col-lg-6">
            <form action="{{ url('admin/students/' . $student->id . '/promote') }}" method="post" id="promote">
            {{ csrf_field() }}
                 <div class="input-group m-b"><span class="input-group-btn">
                      <button  type="submit" class="btn btn-primary btn-block" id="promote">Promote to</button></span>

                      <select class="form-control" name="promoted_to_classroom_id">
                         @foreach($classrooms as $promoted_to_classroom)
                             @if($student->classroom->level->rank < $promoted_to_classroom->level->rank)
                                 <option value="{{ $promoted_to_classroom->id }}">{{ $promoted_to_classroom->name }}</option>
                             @endif
                         @endforeach
                      </select>
                  </div>

            </form>
        </div>

    <div class="col-lg-6">
        <form action="{{ url('admin/students/' . $student->id . '/repeat') }}" method="post" id="repeat">
        {!! csrf_field() !!}
                <div class="input-group m-b"><span class="input-group-btn">
                     <button  type="submit" class="btn btn-warning btn-block" id="repeat-all">Repeat to</button></span>
                     <select class="form-control" name="repeated_to_classroom_id">
                     @foreach($classrooms as $repeated_to_class)
                         @if($student->classroom->level->rank >= $repeated_to_class->level->rank )
                             <option value="{{ $repeated_to_class->id }}">{{ $repeated_to_class->name }}</option>
                         @endif
                     @endforeach
                     </select>
                 </div>
        </form>
    </div>
</div>
@endif

</div>



@include('layouts.partials.student.profile')


 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Academic history  - {{ $student->name }}</h5>
                        </div>
                        <div class="ibox-content">


                                <table class="table" >
                                        <thead>
                                        <tr>
                                            <th>Class</th>
                                            <th>Level</th>
                                           <th>action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                @foreach($sessions as $session)
                                        <tr>
                                            <td>{{ $student->session_classroom($session->id)->name }}</td>
                                            <td>{{ $student->session_classroom($session->id)->level->name }}</td>
                                            <td class="text-left">

                                                <div class="btn-group">
                                                    {{--<a class="btn btn-white" type="button" href="{{ url('admin/students/'. $student->id .'/results/session/'.$session->id.'/edit') }}">Edit</a>--}}
                                                    <a class="btn btn-primary" type="button" href="{{ url('admin/students/'. $student->id .'/results/session/'.$session->id.'/view') }}">View</a>
                                                    {{--<a class="btn btn-white" type="button" href="{{ url('admin/students/'.$student->id.'/results/session/'.$session->id.'/print') }}">Print</a>--}}
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach

                                    </tbody>
                                </table>

                        </div>
                    </div>
                </div>
            </div>

</div>



@endsection





@section('scripts')
    <!-- ChartJS-->
    <script src="{{ asset('js/plugins/chartJs/Chart.min.js') }}"></script>
    <script>

        $(function () {

            var barData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", 'Auguast', 'September', 'October'],

                datasets: [
                    {
                        label: "First Term",
                        backgroundColor: 'rgba(220, 220, 220, 0.5)',
                        pointBorderColor: "#fff",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "Second Term",
                        backgroundColor: 'rgba(26,179,148,0.5)',
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: "Third Term",
                        backgroundColor: '#2F4050',
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };

            var barOptions = {
                responsive: true,
                scaleSteps: 1,
                scaleStartValue: 0,
                scaleOveride: true
            };


            var ctx2 = document.getElementById("barChart").getContext("2d");
            new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});



        });

    </script>

@endsection