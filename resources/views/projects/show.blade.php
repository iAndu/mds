<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('limitless/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('limitless/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('limitless/assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('limitless/assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('limitless/assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/user_pages_list.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body class="navbar-bottom">

<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="{{ URL::asset('limitless/assets/images/logo_light.png') }}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-git-compare"></i>
                    <span class="visible-xs-inline-block position-right">Git updates</span>
                    <span class="badge bg-warning-400">9</span>
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-heading">
                        Git updates
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-sync"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body width-350">
                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>

                            <div class="media-body">
                                Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                <div class="media-annotation">4 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
                            </div>

                            <div class="media-body">
                                Add full font overrides for popovers and tooltips
                                <div class="media-annotation">36 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
                                <div class="media-annotation">2 hours ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
                                <div class="media-annotation">Dec 18, 18:36</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>

                            <div class="media-body">
                                Have Carousel ignore keyboard events
                                <div class="media-annotation">Dec 12, 05:46</div>
                            </div>
                        </li>
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>
        </ul>

        <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ URL::asset('limitless/assets/images/flags/gb.png') }}" class="position-left" alt="">
                    English
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="deutsch"><img src="{{ URL::asset('limitless/assets/images/flags/de.png') }}" alt=""> Deutsch</a></li>
                    <li><a class="ukrainian"><img src="{{ URL::asset('limitless/assets/images/flags/ua.png') }}" alt=""> Українська</a></li>
                    <li><a class="english"><img src="{{ URL::asset('limitless/assets/images/flags/gb.png') }}" alt=""> English</a></li>
                    <li><a class="espana"><img src="{{ URL::asset('limitless/assets/images/flags/es.png') }}" alt=""> España</a></li>
                    <li><a class="russian"><img src="{{ URL::asset('limitless/assets/images/flags/ru.png') }}" alt=""> Русский</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="visible-xs-inline-block position-right">Messages</span>
                    <span class="badge bg-warning-400">2</span>
                </a>

                <div class="dropdown-menu dropdown-content width-350">
                    <div class="dropdown-content-heading">
                        Messages
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-compose"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body">
                        <li class="media">
                            <div class="media-left">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt="">
                                <span class="badge bg-danger-400 media-badge">5</span>
                            </div>

                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">James Alexander</span>
                                    <span class="media-annotation pull-right">04:58</span>
                                </a>

                                <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt="">
                                <span class="badge bg-danger-400 media-badge">4</span>
                            </div>

                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">Margo Baker</span>
                                    <span class="media-annotation pull-right">12:16</span>
                                </a>

                                <span class="text-muted">That was something he was unable to do because...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left"><img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>
                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">Jeremy Victorino</span>
                                    <span class="media-annotation pull-right">22:48</span>
                                </a>

                                <span class="text-muted">But that would be extremely strained and suspicious...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left"><img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>
                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">Beatrix Diaz</span>
                                    <span class="media-annotation pull-right">Tue</span>
                                </a>

                                <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left"><img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>
                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">Richard Vango</span>
                                    <span class="media-annotation pull-right">Mon</span>
                                </a>

                                <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                            </div>
                        </li>
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" alt="">
                    <span>Victoria</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                    <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page header -->
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="user_pages_list.html">User pages</a></li>
            <li class="active">User list</li>
        </ul>

        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Pages</span> - User List</h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-indigo-400"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-indigo-400"></i><span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-indigo-400"></i><span>Schedule</span></a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default">
            <div class="sidebar-content">

                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="sidebar-user-material">
                        <div class="category-content">
                            <div class="sidebar-user-material-content">
                                <a href="#"><img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-responsive" alt=""></a>
                                <h6>Victoria Baker</h6>
                                <span class="text-size-small">Santa Ana, CA</span>
                            </div>

                            <div class="sidebar-user-material-menu">
                                <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                            </div>
                        </div>

                        <div class="navigation-wrapper collapse" id="user-nav">
                            <ul class="navigation">
                                <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                                <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                                <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                                <li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                            <li><a href="{{-- route('index') --}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>Projects</span></a>
                                <ul>
                                    <li><a href="{{-- route('project-create') --}}">Project list</a></li>
                                    <li><a href="{{-- route('project-list') --}}">Project create</a></li>
                                    <li><a href="{{-- route('project-view') --}}">Project view</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-copy"></i> <span>Tasks</span></a>
                                <ul>
                                    <li><a href="{{ route('tasks.create') }}" id="layout1">Create task</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-copy"></i> <span>Groups</span></a>
                                <ul>
                                    <li><a href="{{-- route('group-list') --}}" id="layout1">Group list</a></li>
                                    <li><a href="{{ route('groups.create') }}" id="layout1">Group create</a></li>
                                    <li><a href="{{-- route('group-view') --}}" id="layout1">Group view</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Simple lists -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Simple list -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Project list</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <ul class="media-list">
                                <li class="media-header">Project members</li>

                                @foreach($users as $user)
                                    <li class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <img src="{{ $user->avatar }}" class="img-circle img-md" alt="">
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <div class="media-heading text-semibold">{{ $user->name }}</div>
                                            <span class="text-muted">Development</span>
                                        </div>

                                        <div class="media-right media-middle">
                                            <ul class="icons-list icons-list-extended text-nowrap">
                                                <li><a href="#" data-popup="tooltip" title="Call" data-toggle="modal" data-target="#call"><i class="icon-phone2"></i></a></li>
                                                <li><a href="#" data-popup="tooltip" title="Chat" data-toggle="modal" data-target="#chat"><i class="icon-comment"></i></a></li>
                                                <li><a href="#" data-popup="tooltip" title="Video" data-toggle="modal" data-target="#video"><i class="icon-video-camera"></i></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /simple list -->

                </div>
            </div>
            <!-- /simple lists -->

            <!-- Phone call modal -->
            <div id="call" class="modal fade">
                <div class="modal-dialog modal-xs">
                    <div class="modal-content">
                        <div class="thumbnail no-border no-margin">
                            <div class="thumb thumb-rounded">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" alt="">
                                <div class="caption-overflow">
										<span>
											<a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="btn btn-success btn-icon btn-xs"><i class="icon-plus2"></i></a>
											<a href="user_pages_profile.html" class="btn btn-success btn-icon btn-xs"><i class="icon-link"></i></a>
										</span>
                                </div>
                            </div>

                            <div class="caption text-center">
                                <h6 class="text-semibold no-margin-top content-group">Nathan Jacobson <small class="display-block">Lead UX designer</small></h6>

                                <ul class="list-inline list-inline-condensed no-margin">
                                    <li><a href="#" class="btn btn-success btn-rounded btn-float"><i class="icon-phone2"></i></a></li>
                                    <li><a href="#" class="btn btn-danger btn-rounded btn-float" data-dismiss="modal"><i class="icon-phone-slash"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /phone call modal -->


            <!-- Chat modal -->
            <div id="chat" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title"><span class="status-mark bg-success position-left"></span> James Alexander</h6>
                        </div>

                        <div class="modal-body">
                            <ul class="media-list chat-list content-group">
                                <li class="media date-step">
                                    <span>Monday, Feb 10</span>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-content">Below mounted advantageous spread yikes bat stubbornly crud a and a excepting</div>
                                        <span class="media-annotation display-block mt-10">Mon, 9:54 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>
                                </li>

                                <li class="media reversed">
                                    <div class="media-body">
                                        <div class="media-content">Far squid and that hello fidgeted and when. As this oh darn but slapped casually husky sheared that cardinal hugely one and some unnecessary factiously hedgehog a feeling one rudely much but one owing sympathetic regardless more astonishing evasive tasteful much.</div>
                                        <span class="media-annotation display-block mt-10">Mon, 10:24 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>

                                    <div class="media-right">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-content">Darn over sour then cynically less roadrunner up some cast buoyant. Macaw krill when and upon less contrary warthog jeez some koala less since therefore minimal.</div>
                                        <span class="media-annotation display-block mt-10">Mon, 10:56 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>
                                </li>

                                <li class="media reversed">
                                    <div class="media-body">
                                        <div class="media-content">Some upset impious a and submissive when far crane the belched coquettishly. More the puerile dove wherever</div>
                                        <span class="media-annotation display-block mt-10">Mon, 11:29 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>

                                    <div class="media-right">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>
                                </li>

                                <li class="media date-step">
                                    <span>Yesterday</span>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-content">Regardless equitably hello heron glum cassowary jocosely before reliably a jeepers wholehearted shuddered more that some where far by koala.</div>
                                        <span class="media-annotation display-block mt-10">Tue, 6:40 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-content">Crud reran and while much withdrew ardent much crab hugely met dizzily that more jeez gent equivalent unsafely far one hesitant so therefore.</div>
                                        <span class="media-annotation display-block mt-10">Tue, 10:28 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>
                                </li>

                                <li class="media reversed">
                                    <div class="media-body">
                                        <div class="media-content">Thus superb the tapir the wallaby blank frog execrably much since dalmatian by in hot. Uninspiringly arose mounted stared one curt safe</div>
                                        <span class="media-annotation display-block mt-10">Tue, 8:12 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>

                                    <div class="media-right">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>
                                </li>

                                <li class="media date-step">
                                    <span>Today</span>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-content">Tolerantly some understood this stubbornly after snarlingly frog far added insect into snorted more auspiciously heedless drunkenly jeez foolhardy oh.</div>
                                        <span class="media-annotation display-block mt-10">Wed, 4:20 pm <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>
                                </li>

                                <li class="media reversed">
                                    <div class="media-body">
                                        <div class="media-content">Satisfactorily strenuously while sleazily dear frustratingly insect menially some shook far sardonic badger telepathic much jeepers immature much hey.</div>
                                        <span class="media-annotation display-block mt-10">2 hours ago <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>

                                    <div class="media-right">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-content">Grunted smirked and grew less but rewound much despite and impressive via alongside out and gosh easy manatee dear ineffective yikes.</div>
                                        <span class="media-annotation display-block mt-10">13 minutes ago <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>
                                </li>

                                <li class="media reversed">
                                    <div class="media-body">
                                        <div class="media-content"><i class="icon-menu display-block"></i></div>
                                    </div>

                                    <div class="media-right">
                                        <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                                        </a>
                                    </div>
                                </li>
                            </ul>

                            <textarea name="enter-message" class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..."></textarea>

                            <div class="row">
                                <div class="col-xs-6">
                                    <ul class="icons-list icons-list-extended mt-10">
                                        <li><a href="#" data-popup="tooltip" title="Send photo" data-container="body"><i class="icon-file-picture"></i></a></li>
                                        <li><a href="#" data-popup="tooltip" title="Send video" data-container="body"><i class="icon-file-video"></i></a></li>
                                        <li><a href="#" data-popup="tooltip" title="Send file" data-container="body"><i class="icon-file-plus"></i></a></li>
                                    </ul>
                                </div>

                                <div class="col-xs-6 text-right">
                                    <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /chat modal -->


            <!-- Video call modal -->
            <div id="video" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="thumbnail no-margin">
                                        <figure class="thumb">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" alt="">
                                            <figcaption>
                                                <ul class="icons-list pull-left">
                                                    <li><a href="#"><i class="icon-screen-full"></i></a></li>
                                                </ul>

                                                <ul class="icons-list pull-right">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-cog3"></i>
                                                            <span class="caret"></span>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-inbox pull-right"></i> Action</a></li>
                                                            <li><a href="#"><i class="icon-googleplus5 pull-right"></i> Another action</a></li>
                                                            <li><a href="#"><i class="icon-grid-alt pull-right"></i> Something else</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-spinner2 spinner pull-right"></i> One more line</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>

                                        <div class="caption text-center">
                                            <h6 class="text-semibold no-margin">Adriana Linders <small class="display-block">Chief accountant</small></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="thumbnail no-margin">
                                        <figure class="thumb">
                                            <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" alt="">
                                            <figcaption>
                                                <ul class="icons-list pull-left">
                                                    <li><a href="#"><i class="icon-screen-full"></i></a></li>
                                                </ul>

                                                <ul class="icons-list pull-right">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-cog3"></i>
                                                            <span class="caret"></span>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-inbox pull-right"></i> Action</a></li>
                                                            <li><a href="#"><i class="icon-googleplus5 pull-right"></i> Another action</a></li>
                                                            <li><a href="#"><i class="icon-grid-alt pull-right"></i> Something else</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-spinner2 spinner pull-right"></i> One more line</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>

                                        <div class="caption text-center">
                                            <h6 class="text-semibold no-margin">Victoria Ansley <small class="display-block">Lead UX designer</small></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-inline list-inline-condensed text-center">
                                <li><a href="#" class="btn bg-purple-300 btn-rounded btn-float"><i class="icon-mic2"></i></a></li>
                                <li><a href="#" class="btn bg-success-400 btn-rounded btn-float"><i class="icon-video-camera2"></i></a></li>
                                <li><a href="#" class="btn bg-blue btn-rounded btn-float"><i class="icon-comment"></i></a></li>
                                <li><a href="#" class="btn bg-danger btn-rounded btn-float" data-dismiss="modal"><i class="icon-phone-slash"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /video call modal -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom footer">
    <ul class="nav navbar-nav visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="footer">
        <div class="navbar-text">
            &copy; 2015. <a href="#" class="navbar-link">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" class="navbar-link" target="_blank">Eugene Kopyov</a>
        </div>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /footer -->

</body>
</html>
