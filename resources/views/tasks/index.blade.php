@extends('layouts.app')

@section('content')

@foreach ($tasks->chunk(3) as $collection)
<div class="row">
    @foreach ($collection as $task)
    <div class="col-md-4">
        <div class="panel panel-white animation" data-animation="
                {{ $loop->index == 0 ? 'zoomInLeft' : ($loop->index == 1 ? 'zoomIn' : ($loop->index == 2 ? 'zoomInRight' : 'flip')) }}
                ">
            <div class="panel-heading">
                <h6 class="panel-title"> {{ $task->title }} <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                <div class="heading-elements">
                </div>
            </div>

            <div class="panel-body">
                {{ $task->description }}
                <br />
                Subtasks :
                <div class="panel-group panel-group-control content-group-lg">
                    <div class="panel">
                        <div class="panel-heading bg-info">
                            <h6 class="panel-title">
                                <a data-toggle="collapse" href="#collapsible-control-group{{ $loop->parent->index . $loop->index . '0' }}" aria-expanded="false" class="collapsed">Collapsible Item #1</a>
                            </h6>
                        </div>
                        <div id="collapsible-control-group{{ $loop->parent->index . $loop->index . '0'}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading bg-slate">
                            <h6 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" href="#collapsible-control-group{{ $loop->parent->index . $loop->index . '1' }}">Collapsible Item #2</a>
                            </h6>
                        </div>
                        <div id="collapsible-control-group{{ $loop->parent->index . $loop->index . '1' }}" class="panel-collapse collapse">
                            <div class="panel-body">
                                Тon cupidatat skateboard dolor brunch. Тesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda.
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading bg-purple">
                            <h6 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" href="#collapsible-control-group{{ $loop->parent->index . $loop->index . '2' }}">Collapsible Item #3</a>
                            </h6>
                        </div>
                        <div id="collapsible-control-group{{ $loop->parent->index . $loop->index . '2' }}" class="panel-collapse collapse">
                            <div class="panel-body">
                                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it.
                            </div>
                        </div>
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
        .panel.animation {
            visibility: hidden; /* set to hidden until all is loaded, so we have smooth animation */
        }
    </style>
@endpush

@push('js')

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/animations_css3.js') }}"></script>
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