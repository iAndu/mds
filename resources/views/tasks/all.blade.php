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
                @foreach ($collection as $task)
                    <div class="col-md-4">
                        <div class="panel panel-white animation" data-animation="fadeInDownBig">
                            <div class="panel-heading">
                                <h6 class="panel-title"> {{ $task->title }} <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a href="#" class="btn btn-icon legitRipple"
                                               data-toggle="modal" data-target="#modal_task{{ $task->id }}">
                                                <i class="icon-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">
                                {{ $task->description }}
                            </div>
                        </div>
                        <!-- modal for task -->
                        <div id="modal_task{{ $task->id }}" class="modal fade" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h5 class="modal-title"> {{ $task->title }}</h5>
                                    </div>

                                    <div class="modal-body">
                                        <ul class="media-list">
                                            <li class="media-header">
                                                <i class="glyphicon glyphicon-align-left"></i>Description
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <div class="col-lg-10">
                                                        <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
                                                    </div>
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                            <li class="media-header">
                                                Will be adding other details here soon.
                                            </li>
                                            <li class="media-header">
                                                Assignees
                                            </li>
                                            <form method="post" action="{{ route('projects.store') }}" id="project-create"
                                                  enctype="multipart/form-data" class="form-horizontal">
                                                @csrf
                                                @foreach($tasksByProject['project']->users as $user)
                                                    <div class="checkbox">
                                                        <label for="{{ $user->name }}"> {{ $user->name }} </label>
                                                        <input id="{{ $user->name }}" name="assignedUsers" type="checkbox" class="styled">
                                                    </div>
                                                @endforeach
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
                                                </div>
                                            </form>
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

        .panel.panel-white.animation { /* small fix for better appearance */
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
        });
    </script>
@endpush