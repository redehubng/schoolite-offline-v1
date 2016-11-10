  <div class="row m-b-lg m-t-lg">
                <div class="col-md-5">

                    <div class="profile-image">
                        <img src="{{ is_file(asset('storage/' . $student->image)) ? asset('storage/' . $student->image) : asset('storage/images/' . strtolower($student->sex) . '.png') }}" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h3 class="no-margins">
                                    {{ $student->name }}
                                </h3>
                                <h4>{{ $student->email or 'no email' }}( {{ $student->admin_number }} )</h4>
                                Guardian:<a href=" {{ url('admin/guardians/' . $student->guardian->id) }}" title="{{ 'view ' . $student->guardian->name . ' profile' }}" target="_blank"> {{ $student->guardian->title .' '. $student->guardian->name }}</a>
                                <br>Guardian's Email: <a href="{{ "mailto:" . $student->guardian->email }}"> {{ $student->guardian->email }}</a>
                                <br>Guardian's Phone: {{ $student->guardian->phone }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                Sex <strong> {{ $student->sex }} </strong>
                            </td>
                            <td>
                                Phone <strong>{{ $student->phone }}</strong>
                            </td>
                            <td>
                                <strong>Class</strong> {{ $student->classroom->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                DOB <strong>{{ $student->dob->format('m/d/Y') }}</strong>
                            </td>
                             <td>
                                <strong>Level</strong> {{ $student->classroom->level->name }}
                            </td>
                            <td>
                                <strong>State of origin</strong> {{ $student->state->name }}, {{ $student->lga->name }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>Age</strong> {{ $student->dob->diffInYears() }}
                            </td>
                            <td>
                                <strong>House </strong> {{ $student->house->name }}
                            </td>
                            <td>
                                <strong>Address</strong> {{ $student->address }}
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>