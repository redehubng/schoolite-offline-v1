@extends('layouts.result')

@section('title',  $student->name)

@section('result-heading')

@section('result-heading')
<img src="{{ asset('img/banner.jpg') }}" class="m-b-xs" alt="profile" width="100%">
  <div class="row m-b-xs m-t-xs">
                {{--<div class="col-sm-3">--}}
                    {{--<div class="profile-image">--}}
                        {{--<img src="{{ asset('img/profile/' . $student->image) }}" class="img-rounded m-b-md" alt="profile">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-12">

                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td rowspan="3">
                                <div class="profile-image">
                                    <img src="{{ asset('storage/' . $student->image) }}" class="img-rounded m-b-md" alt="profile">
                                </div>
                            </td>
                            <td>
                                Name: <strong> {{ $student->name }} </strong>
                            </td>
                            <td>
                                Reg Number: <strong> {{ $student->admin_number }} </strong>
                            </td>
                            <td>
                                <strong>Level</strong> {{ $student->classroom->level->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Class: <strong> {{ $student->classroom->name }} </strong>
                            </td>
                            <td>
                                No in class: <strong> {{ $student->classroom->students()->count() }} </strong>
                            </td>
                            <td>
                              <strong>Class teacher</strong> {{ $student->classroom->teacher->name }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Percentage: <strong> {{ $student->term_percentage($results) . '%' }} </strong>
                            </td>
                            <td>
                                Position: <strong> {{ $student->second_term_position($session_id) }} </strong>
                            </td>
                            <td>
                              <strong>Next term begins</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection

@section('result-body')
        <table class="table" >
            <thead>
            <tr>
                <th>Subjects</th>
                <th class="text-center">CA1/20</th>
                <th class="text-center">CA2/20</th>
                <th class="text-center">CA Total</th>
                <th class="text-center">Exam/60</th>
                <th class="text-center">Grand Total</th>
                <th class="text-center">Grade</th>
                <th class="text-center">Position</th>
                <th class="text-center">Remarks</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result->subject->name }}</td>
                <td class="text-center">{{ $result->first_ca }}</td>
                <td class="text-center">{{ $result->second_ca }}</td>
                <td class="text-center">{{ $result->first_ca + $result->second_ca}}</td>
                <td class="text-center">{{ $result->exam }}</td>
                <td class="text-center">{{ $result->total() }}</td>
                <td class="text-center">{{ $result->grade() }}</td>
                <td class="text-center">{{ $result->position() }}</td>
                <td class="text-center">{{ $result->remark() }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection