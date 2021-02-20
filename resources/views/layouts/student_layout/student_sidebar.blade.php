<?php $url = url()->current();  ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
        <img src="{{asset('admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Student Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ucwords(\Illuminate\Support\Facades\Auth::guard('student')->user()->name)}}</a>
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
                    <a href="{{url('student/dashboard')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if(Session::get('page') == 'settings' || Session::get('page') == 'update-student-details')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-users-cog"></i>
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
                            <a href="{{url('/student/settings')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Student Password</p>
                            </a>
                        </li>
                        @if(Session::get('page') == 'update-student-details')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('student/update-student-details')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Student Details</p>
                            </a>
                        </li>
                    </ul>
                </li>





                @if(Session::get('page') == 'exam')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Exam
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
                            <a href="{{url('/student/exam')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>exam</p>
                            </a>
                        </li>

                    </ul>
                </li>



                @if(Session::get('page') == 'result')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Mark
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'result')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/student/result')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mark</p>
                            </a>
                        </li>

                    </ul>
                </li>


                @if(Session::get('page') == 'attendance')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-users-cog"></i>
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
                            <a href="{{url('/student/view-attendance')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Attendance</p>
                            </a>
                        </li>

                    </ul>
                </li>


                @if(Session::get('page') == 'final_result')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Result
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'final_result')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/student/view-result')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Result</p>
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
                            <a href="{{url('/student/add-post')}}" class="nav-link {{$active}}">
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
                            <a href="{{url('/student/posts')}}" class="nav-link {{$active}}">
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
                            <a href="{{url('/student/review')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Review</p>
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
                            Review
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
                            <a href="{{url('/student/comment')}}" class="nav-link {{$active}}">
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
