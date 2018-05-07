@extends('layouts.app')

@section('content')

@foreach ($projects->chunk(3) as $collection)
<div class="row">
    @foreach ($collection as $project)
    <div class="col-md-4">
        <div class="thumbnail animation"
             data-animation="
                {{ $loop->index == 0 ? 'zoomInLeft' : ($loop->index == 1 ? 'zoomIn' : ($loop->index == 2 ? 'zoomInRight' : 'flip')) }}
            ">
            <div class="panel-heading">
                <h6 class="panel-title">{{ $project->name }}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a href="#"><i class="icon-google-drive"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="thumb">
                <img src="{{ asset($project->avatar) }}" alt="">
                <div class="caption-overflow">
									<span>
                                        <a href="#" class="btn bg-success-400 btn-icon legitRipple"
                                           data-toggle="modal" data-target="#modal_project{{ $project->id }}"><i class="icon-eye"></i></a>
										<a href="#" class="btn bg-success-400 btn-icon legitRipple"><i class="icon-pencil"></i></a>
									</span>
                </div>
            </div>

            <div class="caption">

            </div>
        </div>
        <!-- modal for project -->
        <div id="modal_project{{ $project->id }}" class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h5 class="modal-title">Project members</h5>
                    </div>

                    <div class="modal-body">
                        <ul class="media-list">
                            <li class="media-header">Project members</li>

                            @foreach($project->users as $user)
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
                                            <li><a href="#" data-popup="tooltip" title="Chat" data-toggle="modal" data-target="#chat"><i class="icon-comment"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
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

@endsection

@push('css')
    <link href="{{ URL::asset('limitless/assets/css/extras/animate.min.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .thumbnail.animation {
            visibility: hidden; /* set to hidden until all is loaded, so we have smooth animation */
        }
    </style>
@endpush

@push('js')

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/components_thumbnails.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/animations_css3.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/components_modals.js') }}"></script>

    <script type="text/javascript">
        $(window).load(function(){
            //animation handling
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