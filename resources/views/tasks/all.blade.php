@extends('layouts.app')

@section('content')
    @foreach($tasksByProjects as $tasksByProject)
        <div class="text-center content-group text-muted content-divider">
            <span class="pt-10 pb-10">{{ $tasksByProject['project']->name }}</span>
        </div>
        @foreach (array_chunk($tasksByProject['tasks'], 3) as $collection)
            <div class="row">
                @foreach ($collection as $taskInfo)
                    @php
                        $taskStyle = $priorityToStyle[$taskInfo['task']->priority];
                        if($taskInfo['task']->finished == 1)
                            $style = "success";
                    @endphp
                    <div class="col-md-4">
                        <div class="panel border-left-lg border-left-{{ $taskStyle }} animation"
                             data-animation="{{ $loop->index == 0 ? 'zoomInLeft' : ($loop->index == 1 ? 'zoomIn' : ($loop->index == 2 ? 'zoomInRight' : 'flip')) }}">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="no-margin-top">
                                            <a href="#" data-toggle="modal" data-target="#modal_task{{ $taskInfo['task']->id }}">{{ $taskInfo['task']->title }}</a></h6>
                                        <p class="mb-15">@php
                                                if(strlen($taskInfo['task']->title) <= 50)
                                                    echo $taskInfo['task']->title;
                                                else
                                                {
                                                    $descSubstr = substr($taskInfo['task']->title, 0, 50) . "..";
                                                    echo $descSubstr;
                                                }
                                            @endphp</p>

                                        @foreach($taskInfo['usersWithAssigned'] as $userInfo)
                                            <a href="#"><img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-xs" alt=""></a>
                                            @php
                                                if($loop->index > 2)
                                                    break;
                                            @endphp
                                        @endforeach
                                        <a href="#" class="text-default">&nbsp;<i class="icon-plus22"></i></a>
                                    </div>

                                    <div class="col-md-4">
                                        <ul class="list task-details">
                                            <li>@php
                                                    $date = new DateTime($taskInfo['task']->created_at);
                                                    echo $date->format('j F');
                                                @endphp</li>
                                            <li class="dropdown">
                                                Priority: &nbsp;
                                                    <a href="#" class="label label-{{ $taskStyle }} dropdown-toggle" data-toggle="dropdown">@php echo ucfirst($taskInfo['task']->priority) @endphp <span class="caret"></span></a>
                                                <ul class="dropdown-menu dropdown-menu-right active" data-priority="{{ $taskInfo['task']->priority }}">
                                                    <li onClick = "Change({{ $taskInfo['task']->id }}, 'low')" class="@if($taskInfo['task']->priority == "low") active @endif lowPriority"><a href="#"><span class="status-mark position-left bg-primary"></span> Low</a></li>
                                                    <li onClick = "Change({{ $taskInfo['task']->id }}, 'normal')" class="@if($taskInfo['task']->priority == "normal") active @endif normalPriority"><a href="#"><span class="status-mark position-left bg-info"></span> Normal</a></li>
                                                    <li onClick = "Change({{ $taskInfo['task']->id }}, 'high')" class="@if($taskInfo['task']->priority == "high") active @endif highPriority"><a href="#"><span class="status-mark position-left bg-warning"></span> High</a></li>
                                                    <li onClick = "Change({{ $taskInfo['task']->id }}, 'urgent')" class="@if($taskInfo['task']->priority == "urgent") active @endif urgentPriority"><a href="#"><span class="status-mark position-left bg-danger"></span> Urgent</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">{{ $tasksByProject['project']->name }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                <div class="heading-elements">
                                    <span class="heading-text">Due: <span class="text-semibold">@php
                                                $date = new DateTime($taskInfo['task']->deadline);
                                                if($taskInfo['task']->deadline == null)
                                                    echo "no deadline set";
                                                else
                                                    echo $date->format('Y-m-d  H:i');
                                            @endphp</span></span>

                                    <ul class="list-inline list-inline-condensed heading-text pull-right">
                                        <li class="dropdown">
                                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown">Open <span class="caret"></span></a>
                                            <ul class="dropdown-menu dropdown-menu-right active">
                                                <li class="active"><a href="#">Open</a></li>
                                                <li><a href="#">On hold</a></li>
                                                <li><a href="#">Resolved</a></li>
                                                <li><a href="#">Closed</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Dublicate</a></li>
                                                <li><a href="#">Invalid</a></li>
                                                <li><a href="#">Wontfix</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown">
                                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-alarm-add"></i> Check in</a></li>
                                                <li><a href="#"><i class="icon-attachment"></i> Attach screenshot</a></li>
                                                <li><a href="#"><i class="icon-rotate-ccw2"></i> Reassign</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="icon-pencil7"></i> Edit task</a></li>
                                                <li><a href="#"><i class="icon-cross2"></i> Remove</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- modal for task -->
                        <div id="modal_task{{ $taskInfo['task']->id }}" class="modal fade" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h3 class="modal-title"> {{ $taskInfo['task']->title }}</h3>
                                    </div>

                                    <div class="modal-body">
                                        <ul class="media-list">
                                            <li class="media-header">
                                                <i class="glyphicon glyphicon-align-left"></i> Description
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <div class="col-lg-10">
                                                        <textarea rows="3" cols="5" class="form-control" placeholder="Default textarea">
                                                            {{ $taskInfo['task']->description }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                            <li class="media-header">
                                                <i class="icon-calendar5"></i> Deadline
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <input
                                                            name="deadline"
                                                            type="text"
                                                            class="form-control pickadate picker__input"
                                                            placeholder="
                                                            @php
                                                                $date = new DateTime($taskInfo['task']->deadline);
                                                                if($taskInfo['task']->deadline == null)
                                                                    echo "no deadline set";
                                                                else
                                                                    echo $date->format('Y-m-d  H:i');
                                                            @endphp
                                                            "
                                                            readonly=""
                                                            id="P1978734162"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                            aria-readonly="false"
                                                            aria-owns="P1978734162_root"
                                                    >
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                            <li class="media-header">
                                                <i class="glyphicon glyphicon-time"></i> Priority
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body priority">
                                                    <div class="alert bg-@php echo $priorityToStyle[$taskInfo['task']->priority] @endphp alert-styled-left">
                                                        @php echo ucfirst($taskInfo['task']->priority) @endphp
                                                    </div>
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                            @if(!empty($taskInfo['subTasks']))
                                                <li class="media-header">
                                                    <i class="glyphicon glyphicon-list-alt"></i> Subtasks
                                                </li>
                                                <li class="media">
                                                    <div class="media-left media-middle">
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="col-lg-12">
                                                            <div class="panel-group panel-group-control content-group-lg">
                                                                @foreach($taskInfo['subTasks'] as $subTask)
                                                                    @php
                                                                        $style = $priorityToStyle[$subTask->priority];
                                                                        $circleIcon = "icon-circle";
                                                                        $popupTitle = "Mark as checked";
                                                                        if($subTask->finished == 1)
                                                                        {
                                                                            $style = "success";
                                                                            $circleIcon = "icon-checkmark-circle";
                                                                            $popupTitle = "Mark as unchecked";
                                                                        }
                                                                    @endphp
                                                                    <div class="panel">
                                                                        <div class="panel-heading bg-{{ $style }}">
                                                                            <h6 class="panel-title">
                                                                                <a data-toggle="collapse" href="#collapsible-control-group{{ $subTask->id }}"
                                                                                   aria-expanded="false" class="collapsed">{{ $subTask->title }}</a>
                                                                            </h6>
                                                                            <div class="heading-elements">
                                                                                <button type="button" class="btn btn-{{ $style }} check"
                                                                                        data-initial-style="{{ $priorityToStyle[$subTask->priority] }}"
                                                                                        data-checked="{{ $subTask->finished == 1 ? "1" : "0" }}"
                                                                                        data-task-id="{{ $subTask->id }}"
                                                                                        data-popup="tooltip"
                                                                                        data-placement="top"
                                                                                        title="{{ $popupTitle }}"
                                                                                >
                                                                                    <i class="{{ $circleIcon }}"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div id="collapsible-control-group{{ $subTask->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                                            <div class="panel-body">
                                                                                {{ $subTask->description }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="media-right media-middle">
                                                    </div>
                                                </li>
                                            @endif
                                            <li class="media-header">
                                                <i class="glyphicon glyphicon-user"></i> Assignees
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <div class="col-lg-12">

                                                            @csrf
                                                            @foreach($taskInfo['usersWithAssigned'] as $userInfo)
                                                                <div class="checkbox">
                                                                    <label for="{{ $userInfo['user']->name }}"> {{ $userInfo['user']->name }} </label>
                                                                    <input
                                                                            id="{{ 'assignedUser' . $userInfo['user']->id }}"
                                                                            name="assignedUsers{{ $taskInfo['task']->id }}"
                                                                            type="checkbox"
                                                                            class="styled userassign{{ $taskInfo['task']->id }}"
                                                                            @if($userInfo['isAssigned'] == true)
                                                                                checked
                                                                            @endif
                                                                    >
                                                                </div>
                                                            @endforeach
                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary" onClick = "assignUsers( {{ $taskInfo['task']->id }} )">Submit<i class="icon-arrow-right14 position-right" ></i></button>
                                                            </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                            <li class="media-header">
                                                <i class="glyphicon glyphicon-comment"></i> Comments
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <!--<div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title text-semiold"><i class="icon-bubbles4 position-left"></i> Comments<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                                                            <div class="heading-elements">
                                                                <a href="#" class="btn bg-blue btn-xs btn-icon legitRipple"><i class="icon-plus2"></i></a>
                                                            </div>
                                                        </div>

                                                        <div class="panel-body">-->
                                                            <ul class="media-list content-group-lg stack-media-on-mobile">
                                                                <!-- if we want to add replies, replies to replies, etc.
                                                                we need comment_id on comments and a recursive function -->
                                                                @foreach($taskInfo['task']->comments as $comment)
                                                                    <li class="media">
                                                                        <div class="media-left">
                                                                            <a href="#"><img src="{{ asset($comment->user->avatar) }}" class="img-circle img-sm" alt=""></a>
                                                                        </div>

                                                                        <div class="media-body">
                                                                            <div class="media-heading">
                                                                                <a href="#" class="text-semibold">{{ $comment->user->name }}</a>
                                                                                <span class="media-annotation dotted">
                                                                                    @php
                                                                                        $date = new DateTime($comment->created_at);
                                                                                        echo $date->format('Y-m-d  H:i:s');
                                                                                    @endphp
                                                                                </span>
                                                                            </div>

                                                                            <p>{!! $comment->content /* parse the string as html */ !!}</p>
                                                                            <!-- upvote, downvote, reply, edit
                                                                            <ul class="list-inline list-inline-separate text-size-small">
                                                                                <li>114 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                                                <li><a href="#">Reply</a></li>
                                                                                <li><a href="#">Edit</a></li>
                                                                            </ul>
                                                                            -->
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                                <span id="dummyInsertPoint{{ $taskInfo['task']->id }}"></span>
                                                            </ul>

                                                            <h6 class="text-semibold"><i class="icon-pencil7 position-left"></i> Your comment</h6>
                                                            <div class="content-group">
                                                                <div id="add_comment{{ $taskInfo['task']->id }}" style="visibility: hidden; display: none;"></div>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="button" class="btn bg-blue legitRipple btnAddComment" data-id="{{ $taskInfo['task']->id }}">
                                                                    <i class="icon-plus22"></i> Add comment</button>
                                                            </div>
                                                        <!--</div>
                                                    </div>-->
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close<span class="legitRipple-ripple" style="left: 60.6506%; top: 46.3158%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endforeach
@endsection

@push('css')
    <link href="{{ URL::asset('limitless/assets/css/extras/animate.min.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .panel.animation {
            visibility: hidden; /* set to hidden until all is loaded, so we have smooth animation */
        }

        .panel.animation { /* small fix for better appearance */
            margin: 5px 5px 5px 5px;
        }
    </style>
@endpush

@push('js')

    {{-- <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/animations_css3.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/jquery_ui/touch.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/components_navs.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/jquery_ui/widgets.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/components_popups.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/pnotify.min.js') }}"></script>

    <script type="text/javascript">
        $(window).load(function(){
            var animations = $(".animation");

            for(var i = 0 ; i < animations.length ; i++)
            {
                let animationData = $(animations[i]).data("animation");
                $(animations[i]).css('visibility', 'visible');
                $(animations[i]).addClass("animated " + animationData).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                    $(this).removeClass("animated " + animationData);
                });
            }


            let checks = $('.check');
            for(let i = 0 ; i < checks.length ; i++)
            {
                $(checks[i]).hover(function() {
                    let checked = $(this).data('checked');
                    if(checked === 0)
                    {
                        $(this).find('i').attr('class', 'icon-checkmark-circle');
                    }
                }, function() {
                    let checked = $(this).data('checked');
                    if(checked === 0)
                    {
                        $(this).find('i').attr('class', 'icon-circle');
                    }
                });

                //need to make an ajax request here, to mark subtasks as checked
                $(checks[i]).click(function() {
                    let style = $(this).data('initial-style');
                    let checked = $(this).data('checked');
                    let task = $(this).data('task-id');
                    let $this = $(this); //save it because the $(this) will change in the ajax success
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:{task:task},
                        url:'/tasks/toggleSubtask',
                        method:'POST',
                        //dataType : "text/csv",
                        success:function(data){
                            console.log($this);
                            if(checked === 0)
                            {
                                $this.closest('div.panel-heading').removeClass('bg-' + style).addClass('bg-success');
                                $this.removeClass('btn-' + style).addClass('btn-success');
                                $this.data('checked', 1).attr('title', 'Mark as unchecked');
                                $this.find('i').attr('class', 'icon-checkmark-circle');
                            }
                            else {
                                $this.closest('div.panel-heading').removeClass('bg-success').addClass('bg-' + style);
                                $this.removeClass('btn-success').addClass('btn-' + style);
                                $this.data('checked', 0).attr('title', 'Mark as checked');
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("Status: " + textStatus); alert("Error: " + errorThrown);
                        }
                    });
                });
            }

            //CKEditor stuff
            {{-- <div class="heading-elements">
                                    <a href="#" class="btn btn-icon bg-@php echo $priorityToStyle[$taskInfo['task']->priority] @endphp legitRipple"
                                               data-toggle="modal" data-target="#modal_task{{ $taskInfo['task']->id }}">
                                                <i class="icon-eye"></i>
                                            </a>

                                </div> --}}
            @foreach($tasksByProjects as $tasksByProject)
                @foreach ($tasksByProject['tasks'] as $taskInfo)
                    CKEDITOR.replace( 'add_comment{{ $taskInfo['task']->id }}', {
                        height: '200px',
                        removeButtons: 'Subscript,Superscript',
                        toolbarGroups: [
                            { name: 'styles' },
                            { name: 'editing',     groups: [ 'find', 'selection' ] },
                            { name: 'forms' },
                            { name: 'basicstyles', groups: [ 'basicstyles' ] },
                            { name: 'paragraph',   groups: [ 'list', 'blocks', 'align' ] },
                            { name: 'links' },
                            { name: 'insert' },
                            { name: 'colors' },
                            { name: 'tools' },
                            { name: 'others' },
                            { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] }
                        ]
                    });
                @endforeach
            @endforeach

            //comments
            $('.btnAddComment').each(function(i) {
                $(this).on('click', function(e) {
                    let instance_name = 'add_comment' + $(this).data('id');
                    let _data = CKEDITOR.instances[instance_name].getData();

                    let route = "{{ route('comments.store') }}";
                    let $this = $(this);
                    let taskId = $this.data('id');
                    let userId = @php echo Auth::user()->id @endphp;

                    $.ajax({
                        url: route,
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            task_id: taskId,
                            user_id: userId,
                            content: _data
                        },
                        success: function (resp) {
                            if(resp.status === "success")
                            {
                                let elToAdd = '<li class="media">' +
                                    '<div class="media-left">' +
                                    '    <a href="#"><img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>' +
                                    '</div>' +
                                    '' +
                                    '<div class="media-body">' +
                                    '    <div class="media-heading">' +
                                    '        <a href="#" class="text-semibold">{{ Auth::user()->name }}</a>' +
                                    '        <span class="media-annotation dotted">' +
                                    '        @php
                                        echo date('Y-m-d  H:i:s');
                                    @endphp' +
                                    '        </span>' +
                                    '    </div>' +
                                    '' +
                                    '' + _data +
                                    '<!-- upvote, downvote, reply, edit' +
                                    '<ul class="list-inline list-inline-separate text-size-small">' +
                                    '    <li>114 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>' +
                                    '    <li><a href="#">Reply</a></li>' +
                                    '    <li><a href="#">Edit</a></li>' +
                                    '</ul>' +
                                    '-->' +
                                    '</div>' +
                                    '</li>';

                                $(elToAdd).insertBefore($('#dummyInsertPoint' + taskId));
                            }
                            else
                            {
                                console.log("Error : " + resp.message);
                            }
                        }
                    });
                });
            });

            //prevent default for change priority a's
            $('li.dropdown > ul.dropdown-menu li').each(function(i) {
                //nu a, li-uri
                $(this).on('click', function(event) {
                    event.preventDefault();
                });
            });
        });

        function assignUsers(task)
        {
            var elements = $('input.userassign' + task).filter(':checked').map(function () {
                return this.id;
            }).get();
            $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data:{elements: elements, task:task},
            url:'/tasks/assign',
            method:'POST',
            //dataType : "text/csv",
            success:function(data){
                new PNotify({
                    text: 'Task successfully assigned to users!',
                    addclass: 'alert alert-styled-left alert-styled-custom alert-arrow-left bg-success'
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            } 
                });
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function Change(task, priority)
        {
            $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data:{task:task, priority:priority},
            url:'/tasks/changePriority',
            method:'POST',
            //dataType : "text/csv",
            success:function(data){
                let prioToStyle = {
                    'low': 'primary',
                    'normal': 'info',
                    'high': 'warning',
                    'urgent': 'danger'
                };
                //find parent and previous priority
                let parent = $('a[data-target="#modal_task' + task + '"]').
                parents('div.panel').
                find('ul.dropdown-menu');
                let previousPriority = $(parent).data('priority');

                //update gui and previous priority
                $(parent).find('li.' + previousPriority + 'Priority').removeClass('active');
                $(parent).data('priority', priority);
                $(parent).find('li.' + priority + 'Priority').addClass('active');

                let parentPanel = $('a[data-target="#modal_task' + task + '"]').parents('div.panel');
                $(parentPanel).removeClass('border-left-' + prioToStyle[previousPriority]);
                $(parentPanel).addClass('border-left-' + prioToStyle[priority]);

                let a = $(parent).parent('li.dropdown').children('a.label').first();
                $(a).removeClass('label-' + prioToStyle[previousPriority]);
                $(a).addClass('label-' + prioToStyle[priority]);
                $(a).html(capitalizeFirstLetter(priority) + '<span class="caret"></span>');

                //update in the modal
                //find respective elements
                let panelBody = $('div#modal_task' + task).find('div.priority');
                let alertElement = $(panelBody).find('div.alert');

                //update bg and text content
                $(alertElement).removeClass('bg-' + prioToStyle[previousPriority]);
                $(alertElement).addClass('bg-' + prioToStyle[priority]);
                $(alertElement).html(capitalizeFirstLetter(priority));

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            } 
                });
        }
    </script>
@endpush