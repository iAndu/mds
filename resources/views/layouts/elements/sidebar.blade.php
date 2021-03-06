<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="sidebar-user-material">
                <div class="category-content">
                    <div class="sidebar-user-material-content">
                        <a href="#"><img src={{ asset(Auth::user()->avatar) }} class="img-circle img-responsive" alt=""></a>
                        <h6>{{ Auth::user()->name }}</h6>
                        <span class="text-size-small">{{ Auth::user()->email }}</span>
                    </div>
                </div>
            </div>

            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li><a href="/"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>Projects</span></a>
                        <ul>
                            <li><a href="{{ route('projects.index', $group_id) }}">Project list</a></li>
                            <li><a href="{{ route('projects.create', $group_id) }}">Project create</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-copy"></i> <span>Tasks</span></a>
                        <ul>
                            <li><a href="{{ route('tasks.index', $group_id) }}" id="layout1">My tasks</a></li>
                            <li><a href="{{ route('tasks.create', $group_id) }}" id="layout1">Create task</a></li>
                            <li><a href="{{ route('tasks.all', $group_id) }}" id="layout1">All tasks</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-copy"></i> <span>Groups</span></a>
                        <ul>
                            <li><a href="{{ route('groups.index', $group_id) }}" id="layout1">Group list</a></li>
                            <li><a href="{{ route('groups.create', $group_id) }}" id="layout1">Group create</a></li>
                            <li><a href="{{ route('groups.change', $group_id) }}" id="layout1">Group change</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->