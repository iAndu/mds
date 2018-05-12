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
                                    <ul class="icons-list">
                                        <li><a href="#" class="btn btn-icon legitRipple"
                                               data-toggle="modal" data-target="#modal_task{{ $taskInfo['task']->id }}">
                                                <i class="icon-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
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
                                                                                <span class="pull-right">
                                                                                    <button type="button" class="btn btn-@php echo $priorityToStyle[$subTask->priority] @endphp check"
                                                                                    data-style="@php echo $priorityToStyle[$subTask->priority] @endphp"
                                                                                    data-checked="{{ $subTask->finished == 1 ? "1" : "0" }}"
                                                                                    >
                                                                                        <i class="icon-circle"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </h6>
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
                    $(this).find('i').attr('class', 'icon-checkmark-circle');
                }, function() {
                    $(this).find('i').attr('class', 'icon-circle');
                });

                $(checks[i]).click(function() {
                    let style = $(this).data('style');
                    let checked = $(this).data('checked');

                    if(checked === 0)
                    {
                        $(this).closest('div.panel-heading').removeClass('bg-' + style).addClass('bg-success');
                        $(this).removeClass('btn-' + style).addClass('btn-success');
                        $(this).data('checked', 1);
                    }
                    else {
                        $(this).closest('div.panel-heading').removeClass('bg-success').addClass('bg-' + style);
                        $(this).removeClass('btn-success').addClass('btn-' + style);
                        $(this).data('checked', 0);
                    }
                });
            }
        });
    </script>
@endpush