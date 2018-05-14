@extends('layouts.app')

@section('content')
    @foreach($tasksByProjects as $tasksByProject)
        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title"> {{ $tasksByProject['project']->name }} <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                <div class="heading-elements">
                </div>
            </div>
        @foreach (array_chunk($tasksByProject['tasks'], 3) as $collection)
            <div class="row">
                @foreach ($collection as $taskInfo)
                    <div class="col-md-4">
                        <div class="panel animation" data-animation="fadeInDownBig">
                            <div class="panel-heading bg-@php echo $priorityToStyle[$taskInfo['task']->priority] @endphp">
                                <h6 class="panel-title">{{ $taskInfo['task']->title }}</h6>
                                <div class="heading-elements">
                                    <a href="#" class="btn btn-icon bg-@php echo $priorityToStyle[$taskInfo['task']->priority] @endphp legitRipple"
                                               data-toggle="modal" data-target="#modal_task{{ $taskInfo['task']->id }}">
                                                <i class="icon-eye"></i>
                                            </a>

                                </div>
                            </div>

                            <div class="panel-body">
                                {{ $taskInfo['task']->description }}
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

                                                <div class="media-body">
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
                                                                    <div class="panel">
                                                                        <div class="panel-heading bg-@php echo $priorityToStyle[$subTask->priority] @endphp">
                                                                            <h6 class="panel-title">
                                                                                <a data-toggle="collapse" href="#collapsible-control-group{{ $subTask->id }}"
                                                                                   aria-expanded="false" class="collapsed">{{ $subTask->title }}</a>
                                                                            </h6>
                                                                            <div class="heading-elements">
                                                                                <button type="button" class="btn btn-@php echo $priorityToStyle[$subTask->priority] @endphp check"
                                                                                        data-style="@php echo $priorityToStyle[$subTask->priority] @endphp"
                                                                                        data-checked="{{ $subTask->finished == 1 ? "1" : "0" }}"
                                                                                        data-popup="tooltip"
                                                                                        data-placement="top"
                                                                                        title="Mark as checked"
                                                                                >
                                                                                    <i class="icon-circle"></i>
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
                                                        <form method="post" action="{{ route('projects.store') }}" id="project-create"
                                                              enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                            @foreach($taskInfo['usersWithAssigned'] as $userInfo)
                                                                <div class="checkbox">
                                                                    <label for="{{ $userInfo['user']->name }}"> {{ $userInfo['user']->name }} </label>
                                                                    <input
                                                                            id="{{ $userInfo['user']->name }}"
                                                                            name="assignedUsers{{ $taskInfo['task']->id }}"
                                                                            type="checkbox"
                                                                            class="styled"
                                                                            @if($userInfo['isAssigned'] == true)
                                                                                checked
                                                                            @endif
                                                                    >
                                                                </div>
                                                            @endforeach
                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </form>
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
                                                                            <a href="#"><img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
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

                                                                            <p>{{ $comment->content }}</p>
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
        </div>
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
                    let style = $(this).data('style');
                    let checked = $(this).data('checked');

                    if(checked === 0)
                    {
                        $(this).closest('div.panel-heading').removeClass('bg-' + style).addClass('bg-success');
                        $(this).removeClass('btn-' + style).addClass('btn-success');
                        $(this).data('checked', 1).attr('title', 'Mark as unchecked');
                        $(this).find('i').attr('class', 'icon-checkmark-circle');
                    }
                    else {
                        $(this).closest('div.panel-heading').removeClass('bg-success').addClass('bg-' + style);
                        $(this).removeClass('btn-success').addClass('btn-' + style);
                        $(this).data('checked', 0).attr('title', 'Mark as checked');
                    }
                });
            }

            //CKEditor stuff
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
                    //$('#add_comment' + $(this).data('id')).text());
                    let instance_name = 'add_comment' + $(this).data('id');
                    let data = CKEDITOR.instances[instance_name].getData();
                    /* data for ajax request for comment :
                    * id of the task is $(this).data('id') ( the id of the task is attached to the button data )
                    * user_id is the id of the user currently using the application, should be easy to get that
                    * content is the 'data' variable from above
                    */

                    /*
                    $.ajax({
                        url: '/logout',
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function () {
                            window.location = '/';
                        }
                    });
                    */
                    //after request is done, add the comment in the html
                    //should enclose this in a ajaxComplete event ?
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
                        '' + data +
                        '<!-- upvote, downvote, reply, edit' +
                        '<ul class="list-inline list-inline-separate text-size-small">' +
                        '    <li>114 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>' +
                        '    <li><a href="#">Reply</a></li>' +
                        '    <li><a href="#">Edit</a></li>' +
                        '</ul>' +
                        '-->' +
                        '</div>' +
                        '</li>';

                    $(elToAdd).insertBefore($('#dummyInsertPoint' + $(this).data('id')));
                });
            });
        });
    </script>
@endpush