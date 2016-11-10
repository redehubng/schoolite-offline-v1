@extends('layouts.result')

@section('title',  $student->name)


@section('result-heading')
<img src="{{ asset('img/banner.jpg') }}" class="m-b-xs" alt="profile" width="100%">
  <div class="row m-b-xs m-t-xs">
                <div class="col-md-12">

                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td rowspan="3">
                                <div class="profile-image">
                                    <img src="{{ is_file(asset('storage/' . $student->image)) ? asset('storage/' . $student->image) : asset('storage/images/' . strtolower($student->sex) . '.png') }}" class="img-rounded m-b-md" alt="profile">
                                </div>
                            </td>
                            <td>
                                Name: <strong> {{ $student->name }} </strong>
                            </td>
                            <td>
                                Reg Number: <strong> {{ $student->admin_number }} </strong>
                            </td>
                            <td>
                                <strong>Level</strong> {{ $results->first()->classroom->level->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Class: <strong> {{ $results->first()->classroom->name }} </strong>
                            </td>
                            <td>
                                No in class: <strong> {{ $results->first()->classroom_students_count() }} </strong>
                            </td>
                            <td>
                              <strong>Class teacher</strong> {{ $student->classroom->teacher->name }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Percentage: <strong> {{ round($student->term_percentage($results), 2) . '%' }} </strong>
                            </td>
                            <td>
                                Position: <strong> {{ $student->first_term_position($results->first()->session_id) }} </strong>
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
        <table class="table result-table">
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
                <td class="text-center">{{ str_pad($result->first_ca, 2, '0', 0) }}</td>
                <td class="text-center">{{ str_pad($result->second_ca, 2, '0', 0) }}</td>
                <td class="text-center">{{ str_pad($result->first_ca + $result->second_ca, 2, 0)}}</td>
                <td class="text-center">{{ str_pad($result->exam, 2, '0') }}</td>
                <td class="text-center">{{ str_pad($result->total(), 2, '0', 0) }}</td>
                <td class="text-center">{{ $result->grade() }}</td>
                <td class="text-center">{{ $result->position() }}</td>
                <td class="text-center">{{ $result->remark() }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection