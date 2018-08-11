<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alpstein CRM</title>
    <link href="{{ URL::asset('css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/dropzone.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery.atwho.min.css') }}" rel="stylesheet" type="text/css">
   <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('images/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('images/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('images/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('images/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('images/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('images/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('images/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('images/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('images/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::asset('images/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ URL::asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ URL::asset('images/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset(elixir('css/app.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body>

<div id="wrapper">

    <button type="button" class="navbar-toggle menu-txt-toggle" style="">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="navbar navbar-default navbar-top">
        <!--NOTIFICATIONS START-->
        <div class="menu">

            <div class="notifications-header"><p>Notifications</p></div>
            <!-- Menu -->
            <ul>
                <?php $notifications = auth()->user()->unreadNotifications; ?>

                @foreach($notifications as $notification)

                    <a href="{{ route('notification.read', ['id' => $notification->id])  }}"
                       onClick="postRead({{ $notification->id }})">
                        <li>
                            <img src="/{{ auth()->user()->avatar }}" class="notification-profile-image">
                            <p>{{ $notification->data['message']}}</p></li>
                    </a>
                @endforeach
            </ul>
        </div>

        <div class="dropdown" id="nav-toggle">
            <a id="notification-clock" role="button" data-toggle="dropdown">
                <?php if ($notifications->count() > 0) : ?>
                    <i class="glyphicon glyphicon-bell" style="font-size: larger; color: blue;"><span id="notifycount"></span></i>
                <?php else : ?>
                    <i class="glyphicon glyphicon-bell" style="font-size: larger; color: white;"><span id="notifycount"></span></i>
                <?php endif; ?>
            </a>
        </div>
        @push('scripts')
            <script>
                $('#notification-clock').click(function (e) {
                    e.stopPropagation();
                    $(".menu").toggleClass('bar')
                });
                $('body').click(function (e) {
                    if ($('.menu').hasClass('bar')) {
                        $(".menu").toggleClass('bar')
                    }
                })
                id = {};

                function postRead(id) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('/notifications/markread')}}',
                        data: {
                            id: id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                }

            </script>
    @endpush
    <!--NOTIFICATIONS END-->
        <button type="button" id="mobile-toggle" class="navbar-toggle mobile-toggle" data-toggle="offcanvas"
                data-target="#myNavmenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>


    <!-- /#sidebar-wrapper -->
    <!-- Sidebar menu -->

    <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">
        <div class="list-group panel">
            <p class=" list-group-item siderbar-top" title="">
                <a href="https://www.alpstein.my/">
                    <img src="{{asset('images/alpstein_logo_square.png')}}"  alt="Alpstein Main Logo" >
                </a>
            </p>
            <a href="{{route('dashboard', \Auth::id())}}" class=" list-group-item" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-dashboard"></i><span
                        id="menu-txt">{{ __('Dashboard') }}</span> </a>
            <a href="{{route('users.show', \Auth::id())}}" class=" list-group-item" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-user"></i><span id="menu-txt">{{ __('Profile') }}</span>
            </a>


            <a href="#clients" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-tag"></i><span id="menu-txt">{{ __('Clients') }}</span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="clients">

                <a href="{{ route('clients.index')}}" class="list-group-item childlist">{{ __('All Clients') }}</a>
                @if(Entrust::can('client-create'))
                    <a href="{{ route('clients.create')}}"
                       class="list-group-item childlist">{{ __('New Client') }}</a>
                @endif
            </div>

            <a href="#tasks" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-tasks"></i><span id="menu-txt">{{ __('Tasks') }}</span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="tasks">
                <a href="{{ route('tasks.index')}}" class="list-group-item childlist">{{ __('All Tasks') }}</a>
                @if(Entrust::can('task-create'))
                    <a href="{{ route('tasks.create')}}" class="list-group-item childlist">{{ __('New Task') }}</a>
                @endif
            </div>

            <a href="#user" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="sidebar-icon fa fa-users"></i><span id="menu-txt">{{ __('Users') }}</span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="user">
                <a href="{{ route('users.index')}}" class="list-group-item childlist">{{ __('Users All') }}</a>
                @if(Entrust::can('user-create'))
                    <a href="{{ route('users.create')}}"
                       class="list-group-item childlist">{{ __('New User') }}</a>
                @endif
            </div>

            <a href="#leads" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-hourglass"></i><span
                        id="menu-txt">{{ __('Leads') }}</span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="leads">
                <a href="{{ route('leads.index')}}" class="list-group-item childlist">{{ __('All Leads') }}</a>
                @if(Entrust::can('lead-create'))
                    <a href="{{ route('leads.create')}}"
                       class="list-group-item childlist">{{ __('New Lead') }}</a>
                @endif
            </div>
            <a href="#departments" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="sidebar-icon glyphicon glyphicon-list-alt"></i><span
                        id="menu-txt">{{ __('Departments') }}</span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="departments">
                <a href="{{ route('departments.index')}}"
                   class="list-group-item childlist">{{ __('All Departments') }}</a>
                @if(Entrust::hasRole('administrator'))
                    <a href="{{ route('departments.create')}}"
                       class="list-group-item childlist">{{ __('New Department') }}</a>
                @endif
            </div>

            @if(Entrust::hasRole('administrator'))
                <a href="#settings" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                            class="glyphicon sidebar-icon glyphicon-cog"></i><span
                            id="menu-txt">{{ __('Settings') }}</span>
                    <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
                <div class="collapse" id="settings">
                    <a href="{{ route('settings.index')}}"
                       class="list-group-item childlist">{{ __('Overall Settings') }}</a>

                    <a href="{{ route('roles.index')}}"
                       class="list-group-item childlist">{{ __('Role Management') }}</a>
                    <a href="{{ route('integrations.index')}}"
                       class="list-group-item childlist">{{ __('Integrations') }}</a>
                </div>


            @endif
            <a href="{{ url('/logout') }}" class=" list-group-item impmenu" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-log-out"></i><span
                        id="menu-txt">{{ __('Sign Out') }}</span> </a>

        </div>
    </nav>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>@yield('heading')</h1>
                    @yield('content')
                </div>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>

        @endif
        @if(Session::has('flash_message_warning'))
            <message message="{{ Session::get('flash_message_warning') }}" type="warning"></message>
        @endif
        @if(Session::has('flash_message'))
            <message message="{{ Session::get('flash_message') }}" type="success"></message>
        @endif
    </div>
    <!-- /#page-content-wrapper -->
</div>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.caret.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.atwho.min.js') }}"></script>
@stack('scripts')
</body>

</html>