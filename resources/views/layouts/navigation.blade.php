<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
       @if(Auth::user())
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle" src="{{ asset(Auth::user()->profile_image()) }}" width="70px" height="70px"></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->username }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::user()->roles()->first()->name }}<b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    rh+
                </div>
            </li>
            @if(Auth::user()->isAdmin())

                <li class="{{ isActiveRoute('admin_dashboard') }}">
                    <a href="{{ url('/admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li class="{{ isActiveRoute('admin_students') or isActiveRoute('admin_guardians') or isActiveRoute('admin_teachers') }}">
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Active Records</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ isActiveRoute('admin_students') }}">
                            <a href="{{ url('/admin/students') }}"><i class="fa fa-users"></i>Students</a>
                        </li>
                        <li><a href="{{ url('/admin/teachers') }}"><i class="fa fa-users"></i>Staff</a></li>
                        <li><a href="{{ url('/admin/guardians') }}"><i class="fa fa-users"></i>Guardian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Registration</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('/admin/students/create') }}"><i class="fa fa-users"></i>Students</a></li>
                        <li><a href="{{ url('/admin/teachers/create') }}"><i class="fa fa-users"></i>Staff</a></li>
                        <li><a href="{{ url('/admin/guardians/create') }}"><i class="fa fa-users"></i>Guardian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bank"></i> <span class="nav-label">Management</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('/admin/classrooms') }}"><i class="fa fa-th"></i>Classes</a></li>
                        <li><a href="{{ url('/admin/levels') }}"><i class="fa fa-level-up"></i>Levels</a></li>
                        <li><a href="{{ url('/admin/subjects') }}"><i class="fa fa-pencil"></i>Subjects</a></li>
                        <li><a href="{{ url('/admin/houses') }}"><i class="fa fa-futbol-o"></i>Sport Houses</a></li>
                        <li><a href="{{ url('admin/sessions') }}"><i class="fa fa-plus"></i>Sessions</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Scores sheet</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            @if( isset($session) && !is_null($session) )

                            <a href="{{ url('/admin/results?session_id=' . $session->id )}}">
                                <i class="fa fa-file"></i>Current Session
                            </a>

                            @else

                            <a href="{{ url('/admin/results?session_id=N/A')}}" aria-disabled>
                                <i class="fa fa-file"></i>Current Session
                            </a>
                            @endif

                        </li>
                        <li><a href="{{ url('/admin/results?session_id=All') }}"><i class="fa fa-files-o"></i>All Sessions</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/admin/users') }}"><i class="fa fa-user"></i> <span class="nav-label">User Account</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cloud"></i> <span class="nav-label">Backup</span></a>
                </li>
            @endif

            @if(Auth::user()->isTeacher())
                <li class="{{ isActiveRoute('teacher_dashboard') }}">
                    <a href="{{ url('/teacher') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>

                <li class="{{ isActiveRoute('teacher_levels') }}">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Levels</span></a>
                </li>

                <li class="{{ isActiveRoute('teacher_classrooms') }}">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Classrooms</span></a>
                    <ul class="nav nav-second-level collapse">
                         @if($teacher->classrooms->count() == 0)
                          <li>
                             <a href="#"><span class="nav-label">No class yet</span></a>
                          </li>
                         @else
                         @foreach($teacher->classrooms as $classroom)
                             <li>
                                <a href="{{ url('teacher/classrooms/' . $classroom->id) }}" target="_blank"><i class="fa fa-expand"></i> <span class="nav-label">{{ $classroom->name }}</span></a>
                             </li>
                         @endforeach
                         @endif

                    </ul>
                </li>

                <li class="{{ isActiveRoute('teacher_subjects') }}">
                    <a href="{{ url('/admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Subjects</span></a>
                    <ul class="nav nav-second-level collapse">
                        @if($teacher->classroom_subjects->count() == 0)
                          <li>
                             <a href="#"><span class="nav-label">No subject yet</span></a>
                          </li>
                         @else
                         @foreach($teacher->classroom_subjects as $subject)
                             <li>
                                <a href="{{ url('teacher/classrooms/' . $subject->classroom_id . '/subjects/' . $subject->subject_id) }}" target="_blank"><i class="fa fa-expand"></i> <span class="nav-label">{{  $subject->classroom->name . ' - ' . $subject->subject->short_name }}</span></a>
                             </li>
                         @endforeach
                         @endif
                    </ul>
                </li>
            @endif



        </ul>
       @endif
    </div>
</nav>
