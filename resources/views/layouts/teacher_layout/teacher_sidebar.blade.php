<?php $url = url()->current();  ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/teacher/dashboard')}}" class="brand-link">
        <img src="{{asset('admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Teacher Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ucwords(\Illuminate\Support\Facades\Auth::guard('teacher')->user()->name)}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    @if(Session::get('page') == 'dashboard')
                        <?php $active="active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
                    <a href="{{url('teacher/dashboard')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if(Session::get('page') == 'settings' || Session::get('page') == 'update-teacher-details')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'settings')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/settings')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Teacher Password</p>
                            </a>
                        </li>
                        @if(Session::get('page') == 'update-teacher-details')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('teacher/update-teacher-details')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Teacher Details</p>
                            </a>
                        </li>
                    </ul>
                </li>


                @if(Session::get('page') == 'student' || Session::get('page') == 'view-student')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Student
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'student')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/students')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department Student</p>
                            </a>
                        </li>
                        {{--@if(Session::get('page') == 'update-teacher-details')--}}
                            {{--<?php $active="active"; ?>--}}
                        {{--@else--}}
                            {{--<?php $active = ""; ?>--}}
                        {{--@endif--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="{{url('teacher/update-teacher-details')}}" class="nav-link {{$active}}">--}}
                                {{--<i class="far fa-circle nav-icon"></i>--}}
                                {{--<p>Update Teacher Details</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>



                @if(Session::get('page') == 'exam' || Session::get('page') == 'view-exam')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Examination
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'exam')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/add_exam')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Exam</p>
                            </a>
                        </li>
                        @if(Session::get('page') == 'view-exam')
                        <?php $active="active"; ?>
                        @else
                        <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                        <a href="{{url('teacher/exam')}}" class="nav-link {{$active}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam</p>
                        </a>
                        </li>
                    </ul>
                </li>



                @if(Session::get('page') == 'marking' || Session::get('page') == 'marking')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Marking
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'exam')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/add-marking')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Marking</p>
                            </a>
                        </li>
                        @if(Session::get('page') == 'marking')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('teacher/marking')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Marking</p>
                            </a>
                        </li>
                    </ul>
                </li>



                @if(Session::get('page') == 'attendance' || Session::get('page') == 'view-attendance')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Attendance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'attendance')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/add-attendance')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Attendance</p>
                            </a>
                        </li>
                        @if(Session::get('page') == 'view-attendance')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('teacher/view-attendance')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Attendance</p>
                            </a>
                        </li>
                    </ul>
                </li>





                @if(Session::get('page') == 'add_post' || Session::get('page') == 'posts')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'add_post')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/add-post')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'posts')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/posts')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Post</p>
                            </a>
                        </li>

                    </ul>
                </li>



                @if(Session::get('page') == 'review')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Review
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'review')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/review')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Review</p>
                            </a>
                        </li>

                    </ul>
                </li>



                @if(Session::get('page') == 'comment')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Comment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @if(Session::get('page') == 'comment')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/teacher/comment')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Comment</p>
                            </a>
                        </li>

                    </ul>
                </li>






            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
