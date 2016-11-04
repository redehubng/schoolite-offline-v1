  <div class="row m-b-lg m-t-lg">
                <div class="col-md-5">

                    <div class="profile-image">
                        <img src="{{ asset('storage/' . $student->image) }}" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h3 class="no-margins">
                                    {{ $student->name }}
                                </h3>
                                <h4>{{ $student->email or 'no email' }}( {{ $student->admin_number }} )</h4>
                                Guardian:<a> {{ $student->guardian->title .' '. $student->guardian->name }}</a>
                                <br>Guardian's Email: <a href="{{ "mailto:" . $student->guardian->email }}"> {{ $student->classroom->teacher->email }}</a>
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
                                DOB <strong>{{ $student->dob }}</strong>
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
                                <strong>Class</strong> JSS 1A
                            </td>
                            <td>
                                <strong>House </strong> Green
                            </td>
                            <td>
                                <strong>Address</strong> {{ $student->address }}
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>