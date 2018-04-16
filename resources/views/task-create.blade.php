<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/anytime.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/styling/switch.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/picker_date.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/form_checkboxes_radios.js') }}"></script>

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
            <li><a href="form_layout_horizontal.html">Form layouts</a></li>
            <li class="active">Horizontal</li>
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
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Form Layouts</span> - Horizontal</h4>
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
                                    <li><a href="{{-- route('task-create') --}}" id="layout1">Create task</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-copy"></i> <span>Groups</span></a>
                                <ul>
                                    <li><a href="{{-- route('group-list') --}}" id="layout1">Group list</a></li>
                                    <li><a href="{{-- route('group-create') --}}" id="layout1">Group create</a></li>
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

            <!-- Horizontal form options -->
            <div class="row">
                <div class="col-md-6">

                    <!-- Basic layout-->
                    <form method="post" {{--action="{{ route('institutions.store') }}" --}} id="task-create"
                          enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Create task</h5>
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Title</label>
                                    <div class="col-lg-9">
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Description</label>
                                    <div class="col-lg-9">
                                        <input name="description" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Deadline</label>
                                    <div class="col-lg-9">
                                        <div class="content-group-lg">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                                                <input name="deadline" type="text" class="form-control pickadate picker__input" placeholder="Try me…" readonly="" id="P1978734162" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="P1978734162_root">
                                                <div class="picker" id="P1978734162_root" aria-hidden="true">
                                                    <div class="picker__holder" tabindex="-1">
                                                        <div class="picker__frame">
                                                            <div class="picker__wrap">
                                                                <div class="picker__box">
                                                                    <div class="picker__header">
                                                                        <div class="picker__month">June</div>
                                                                        <div class="picker__year">2018</div>
                                                                        <div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="P1978734162_table" title="Previous month"> </div>
                                                                        <div class="picker__nav--next" data-nav="1" role="button" aria-controls="P1978734162_table" title="Next month"> </div>
                                                                    </div>
                                                                    <table class="picker__table" id="P1978734162_table" role="grid" aria-controls="P1978734162" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="Sunday">Sun</th><th class="picker__weekday" scope="col" title="Monday">Mon</th><th class="picker__weekday" scope="col" title="Tuesday">Tue</th><th class="picker__weekday" scope="col" title="Wednesday">Wed</th><th class="picker__weekday" scope="col" title="Thursday">Thu</th><th class="picker__weekday" scope="col" title="Friday">Fri</th><th class="picker__weekday" scope="col" title="Saturday">Sat</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527368400000" role="gridcell" aria-label="27 May, 2018">27</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527454800000" role="gridcell" aria-label="28 May, 2018">28</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527541200000" role="gridcell" aria-label="29 May, 2018">29</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527627600000" role="gridcell" aria-label="30 May, 2018">30</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527714000000" role="gridcell" aria-label="31 May, 2018">31</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1527800400000" role="gridcell" aria-label="1 June, 2018">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1527886800000" role="gridcell" aria-label="2 June, 2018">2</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1527973200000" role="gridcell" aria-label="3 June, 2018">3</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528059600000" role="gridcell" aria-label="4 June, 2018">4</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528146000000" role="gridcell" aria-label="5 June, 2018">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528232400000" role="gridcell" aria-label="6 June, 2018">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528318800000" role="gridcell" aria-label="7 June, 2018">7</div></td><td role="presentation"><div class="picker__day picker__day--infocus picker__day--selected picker__day--highlighted" data-pick="1528405200000" role="gridcell" aria-label="8 June, 2018" aria-selected="true" aria-activedescendant="true">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528491600000" role="gridcell" aria-label="9 June, 2018">9</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528578000000" role="gridcell" aria-label="10 June, 2018">10</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528664400000" role="gridcell" aria-label="11 June, 2018">11</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528750800000" role="gridcell" aria-label="12 June, 2018">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528837200000" role="gridcell" aria-label="13 June, 2018">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528923600000" role="gridcell" aria-label="14 June, 2018">14</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529010000000" role="gridcell" aria-label="15 June, 2018">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529096400000" role="gridcell" aria-label="16 June, 2018">16</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529182800000" role="gridcell" aria-label="17 June, 2018">17</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529269200000" role="gridcell" aria-label="18 June, 2018">18</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529355600000" role="gridcell" aria-label="19 June, 2018">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529442000000" role="gridcell" aria-label="20 June, 2018">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529528400000" role="gridcell" aria-label="21 June, 2018">21</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529614800000" role="gridcell" aria-label="22 June, 2018">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529701200000" role="gridcell" aria-label="23 June, 2018">23</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529787600000" role="gridcell" aria-label="24 June, 2018">24</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529874000000" role="gridcell" aria-label="25 June, 2018">25</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529960400000" role="gridcell" aria-label="26 June, 2018">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1530046800000" role="gridcell" aria-label="27 June, 2018">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1530133200000" role="gridcell" aria-label="28 June, 2018">28</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1530219600000" role="gridcell" aria-label="29 June, 2018">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1530306000000" role="gridcell" aria-label="30 June, 2018">30</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530392400000" role="gridcell" aria-label="1 July, 2018">1</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530478800000" role="gridcell" aria-label="2 July, 2018">2</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530565200000" role="gridcell" aria-label="3 July, 2018">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530651600000" role="gridcell" aria-label="4 July, 2018">4</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530738000000" role="gridcell" aria-label="5 July, 2018">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530824400000" role="gridcell" aria-label="6 July, 2018">6</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530910800000" role="gridcell" aria-label="7 July, 2018">7</div></td></tr></tbody></table>
                                                                    <div class="picker__footer">
                                                                        <button class="picker__button--today" type="button" data-pick="1523826000000" aria-controls="P1978734162" disabled="disabled">
                                                                            Today
                                                                        </button>
                                                                        <button class="picker__button--clear" type="button" data-clear="1" aria-controls="P1978734162" disabled="disabled">
                                                                            Clear
                                                                        </button>
                                                                        <button class="picker__button--close" type="button" data-close="true" aria-controls="P1978734162" disabled="disabled">
                                                                            Close
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Project</label>
                                    <div class="col-lg-9">
                                        <select name="project_id" class="select">
                                            {{-- @foreach($projects as $project)
                                                <option value="{{ $project->id }}"> {{ $project->name }} </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Priority</label>
                                    <div class="col-lg-9">
                                        <select name="priority" class="select">
                                            <option value="1">Low</option>
                                            <option value="2">Normal</option>
                                            <option value="3">High</option>
                                            <option value="4">Urgent</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Your avatar:</label>
                                    <div class="col-lg-9">
                                        <input name="avatar" type="file" class="file-styled">
                                        <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /basic layout -->

                </div>
            </div>
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
