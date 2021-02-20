<?php $url = url()->current();  ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
        <img src="{{asset('admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">E-com Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ucwords(\Illuminate\Support\Facades\Auth::guard('admin')->user()->name)}}</a>
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
                    <a href="{{url('admin/dashboard')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if(Session::get('page') == 'settings' || Session::get('page') == 'update-admin-details')
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
                            <a href="{{url('/admin/settings')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Admin Password</p>
                            </a>
                        </li>
                            @if(Session::get('page') == 'update-admin-details')
                                <?php $active="active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                        <li class="nav-item">
                            <a href="{{url('admin/update-admin-details')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Admin Details</p>
                            </a>
                        </li>
                    </ul>
                </li>





                @if(Session::get('page') == 'department' || Session::get('page') == 'add-department')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Department
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'add-department')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/add-department')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Department</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'department')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/department')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>

                    </ul>
                </li>








                @if(Session::get('page') == 'batch' || Session::get('page') == 'add-batch')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Batch
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'add-batch')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/add-batch')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Batch</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'batch')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/batch')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batch</p>
                            </a>
                        </li>

                    </ul>
                </li>




                @if(Session::get('page') == 'subject' || Session::get('page') == 'add-subject')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Subject
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'add-subject')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/add-subject')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Subject</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'subject')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/subject')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subject</p>
                            </a>
                        </li>

                    </ul>
                </li>



                @if(Session::get('page') == 'teacher' || Session::get('page') == 'add-teacher')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Teacher
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'add-teacher')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/add-teacher')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Teacher</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'teacher')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/teacher')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teacher</p>
                            </a>
                        </li>

                    </ul>
                </li>






                @if(Session::get('page') == 'student' || Session::get('page') == 'add-student')
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
                        @if(Session::get('page') == 'add-student')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/add-student')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Student</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'student')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/student')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student</p>
                            </a>
                        </li>

                    </ul>
                </li>



                @if(Session::get('page') == 'final_result' || Session::get('page') == 'add-final_result')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Result
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'add-final_result')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/add-final_result')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Result</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'final_result')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/result')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Result</p>
                            </a>
                        </li>

                    </ul>
                </li>


                @if(Session::get('page') == 'add_event' || Session::get('page') == 'event')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Event
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'add_event')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/add_event')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Event</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'event')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/event')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Event</p>
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
                            <a href="{{url('/admin/add-post')}}" class="nav-link {{$active}}">
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
                            <a href="{{url('/admin/posts')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Post</p>
                            </a>
                        </li>

                    </ul>
                </li>





                @if(Session::get('page') == 'add_book' || Session::get('page') == 'book')
                    <?php $active="active"; $action='open'; ?>
                @else
                    <?php $active = ""; $action='close'; ?>
                @endif

                <li class="nav-item has-treeview menu-{{$action}}">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Book
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page') == 'add_book')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/add-book')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Book</p>
                            </a>
                        </li>

                        @if(Session::get('page') == 'book')
                            <?php $active="active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('/admin/book')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Book</p>
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
                            <a href="{{url('/admin/review')}}" class="nav-link {{$active}}">
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
                            <a href="{{url('/admin/comment')}}" class="nav-link {{$active}}">
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
