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
                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" alt="">
                <div class="caption-overflow">
									<span>
                                        <a href="#" class="btn bg-success-400 btn-icon legitRipple"><i class="icon-eye"></i></a>
										<a href="#" class="btn bg-success-400 btn-icon legitRipple"><i class="icon-pencil"></i></a>
									</span>
                </div>
            </div>

            <div class="caption">

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