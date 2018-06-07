@extends('layouts.app')

@section('content')

@foreach ($groups->chunk(3) as $collection)
<div class="row">
    @foreach ($collection as $group)
    <div class="col-md-4">
        <div class="thumbnail animation"
             data-animation="
                {{ $loop->index == 0 ? 'zoomInLeft' : ($loop->index == 1 ? 'zoomIn' : ($loop->index == 2 ? 'zoomInRight' : 'flip')) }}
            ">
            <div class="panel-heading">
                <h6 class="panel-title">{{ $group->name }}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
            </div>

            <div class="thumb">
                <img src="{{ asset($group->group_avatar) }}" alt="">
                <div class="caption-overflow">
									{{--<span>
                                        <a href="#" class="btn bg-success-400 btn-icon legitRipple"
                                           data-toggle="modal" data-target="#modal_project{{ $project->id }}"><i class="icon-eye"></i></a>
										<a href="#" class="btn bg-success-400 btn-icon legitRipple"
                                            data-toggle="modal" data-target="#modal_assign{{ $project->id }}"><i class="icon-users"></i></a>
									</span>--}}
                </div>
            </div>

            <div class="caption">

            </div>
        </div>
        <!-- modal for project -->
        {{--
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
                                            <img src="{{ asset($user->avatar) }}" class="img-circle img-md" alt="">
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
        <!-- modal for assign -->
        <div id="modal_assign{{ $project->id }}" class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="modal-title">Assign users to project {{ $project->name }}</h3>
                    </div>

                    <div class="modal-body">
                        <div class="content-group-lg">
                            <select
                                    class="select-multiple-tokenization select2-hidden-accessible"
                                    multiple=""
                                    tabindex="-1"
                                    aria-hidden="true"
                                    id="selectUserAssign{{ $project->id }}"
                            >
                                @foreach($users as $user)
                                    <option
                                            value="{{ $user->id }}"
                                            @php
                                                $selected = false;
                                                foreach($user->projects as $userProject)
                                                {
                                                    if($userProject->id == $project->id)
                                                    {
                                                        $selected = true;
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            @if($selected == true) selected="selected" @endif
                                    >{{ $user->name }}</option>
                                @endforeach
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                        <button type="submit" class="btn btn-primary" onClick = "assignUsers( {{ $project->id }} )">Submit<i class="icon-arrow-right14 position-right" ></i></button>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close<span class="legitRipple-ripple" style="left: 60.6506%; top: 46.3158%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                    </div>
                </div>
            </div>
        </div>
        --}}
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

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/components_thumbnails.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/animations_css3.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/pnotify.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/components_modals.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/form_select2.js') }}"></script>

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

        function assignUsers(project)
        {
            console.log(project);
            var sel = document.getElementById('selectUserAssign' + project);
            console.log('Select : ' + sel);
            console.log('Options : ' + sel.options);
            var userIds = [];
            for(var i = 0 ; i < sel.options.length ; i++)
                if(sel.options[i].selected)
                    userIds.push(sel.options[i].value);


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{elements: userIds, project:project},
                url:'/' + '{{ $group_id }}' + '/projects/assign',
                method:'POST',
                //dataType : "text/csv",
                success:function(data){
                    new PNotify({
                        text: 'Users successfully assigned to project!',
                        addclass: 'alert alert-styled-left alert-styled-custom alert-arrow-left bg-success'
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
        }
    </script>
@endpush