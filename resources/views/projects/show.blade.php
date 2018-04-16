@extends('layouts.app')

@section('content')

<!-- Simple lists -->
<div class="row">
    <div class="col-md-12">

        <!-- Simple list -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Project list</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <ul class="media-list">
                    <li class="media-header">Project members</li>

                    @foreach($users as $user)
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
                                    <li><a href="#" data-popup="tooltip" title="Call" data-toggle="modal" data-target="#call"><i class="icon-phone2"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" title="Chat" data-toggle="modal" data-target="#chat"><i class="icon-comment"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" title="Video" data-toggle="modal" data-target="#video"><i class="icon-video-camera"></i></a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /simple list -->

    </div>
</div>
<!-- /simple lists -->

<!-- Phone call modal -->
<div id="call" class="modal fade">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="thumbnail no-border no-margin">
                <div class="thumb thumb-rounded">
                    <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" alt="">
                    <div class="caption-overflow">
                            <span>
                                <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="btn btn-success btn-icon btn-xs"><i class="icon-plus2"></i></a>
                                <a href="user_pages_profile.html" class="btn btn-success btn-icon btn-xs"><i class="icon-link"></i></a>
                            </span>
                    </div>
                </div>

                <div class="caption text-center">
                    <h6 class="text-semibold no-margin-top content-group">Nathan Jacobson <small class="display-block">Lead UX designer</small></h6>

                    <ul class="list-inline list-inline-condensed no-margin">
                        <li><a href="#" class="btn btn-success btn-rounded btn-float"><i class="icon-phone2"></i></a></li>
                        <li><a href="#" class="btn btn-danger btn-rounded btn-float" data-dismiss="modal"><i class="icon-phone-slash"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /phone call modal -->


<!-- Chat modal -->
<div id="chat" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title"><span class="status-mark bg-success position-left"></span> James Alexander</h6>
            </div>

            <div class="modal-body">
                <ul class="media-list chat-list content-group">
                    <li class="media date-step">
                        <span>Monday, Feb 10</span>
                    </li>

                    <li class="media">
                        <div class="media-left">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-content">Below mounted advantageous spread yikes bat stubbornly crud a and a excepting</div>
                            <span class="media-annotation display-block mt-10">Mon, 9:54 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>
                    </li>

                    <li class="media reversed">
                        <div class="media-body">
                            <div class="media-content">Far squid and that hello fidgeted and when. As this oh darn but slapped casually husky sheared that cardinal hugely one and some unnecessary factiously hedgehog a feeling one rudely much but one owing sympathetic regardless more astonishing evasive tasteful much.</div>
                            <span class="media-annotation display-block mt-10">Mon, 10:24 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>

                        <div class="media-right">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-left">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-content">Darn over sour then cynically less roadrunner up some cast buoyant. Macaw krill when and upon less contrary warthog jeez some koala less since therefore minimal.</div>
                            <span class="media-annotation display-block mt-10">Mon, 10:56 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>
                    </li>

                    <li class="media reversed">
                        <div class="media-body">
                            <div class="media-content">Some upset impious a and submissive when far crane the belched coquettishly. More the puerile dove wherever</div>
                            <span class="media-annotation display-block mt-10">Mon, 11:29 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>

                        <div class="media-right">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>
                    </li>

                    <li class="media date-step">
                        <span>Yesterday</span>
                    </li>

                    <li class="media">
                        <div class="media-left">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-content">Regardless equitably hello heron glum cassowary jocosely before reliably a jeepers wholehearted shuddered more that some where far by koala.</div>
                            <span class="media-annotation display-block mt-10">Tue, 6:40 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-left">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-content">Crud reran and while much withdrew ardent much crab hugely met dizzily that more jeez gent equivalent unsafely far one hesitant so therefore.</div>
                            <span class="media-annotation display-block mt-10">Tue, 10:28 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>
                    </li>

                    <li class="media reversed">
                        <div class="media-body">
                            <div class="media-content">Thus superb the tapir the wallaby blank frog execrably much since dalmatian by in hot. Uninspiringly arose mounted stared one curt safe</div>
                            <span class="media-annotation display-block mt-10">Tue, 8:12 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>

                        <div class="media-right">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>
                    </li>

                    <li class="media date-step">
                        <span>Today</span>
                    </li>

                    <li class="media">
                        <div class="media-left">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-content">Tolerantly some understood this stubbornly after snarlingly frog far added insect into snorted more auspiciously heedless drunkenly jeez foolhardy oh.</div>
                            <span class="media-annotation display-block mt-10">Wed, 4:20 pm <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>
                    </li>

                    <li class="media reversed">
                        <div class="media-body">
                            <div class="media-content">Satisfactorily strenuously while sleazily dear frustratingly insect menially some shook far sardonic badger telepathic much jeepers immature much hey.</div>
                            <span class="media-annotation display-block mt-10">2 hours ago <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>

                        <div class="media-right">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>
                    </li>

                    <li class="media">
                        <div class="media-left">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-content">Grunted smirked and grew less but rewound much despite and impressive via alongside out and gosh easy manatee dear ineffective yikes.</div>
                            <span class="media-annotation display-block mt-10">13 minutes ago <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                        </div>
                    </li>

                    <li class="media reversed">
                        <div class="media-body">
                            <div class="media-content"><i class="icon-menu display-block"></i></div>
                        </div>

                        <div class="media-right">
                            <a href="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" class="img-circle img-md" alt="">
                            </a>
                        </div>
                    </li>
                </ul>

                <textarea name="enter-message" class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..."></textarea>

                <div class="row">
                    <div class="col-xs-6">
                        <ul class="icons-list icons-list-extended mt-10">
                            <li><a href="#" data-popup="tooltip" title="Send photo" data-container="body"><i class="icon-file-picture"></i></a></li>
                            <li><a href="#" data-popup="tooltip" title="Send video" data-container="body"><i class="icon-file-video"></i></a></li>
                            <li><a href="#" data-popup="tooltip" title="Send file" data-container="body"><i class="icon-file-plus"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-xs-6 text-right">
                        <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /chat modal -->


<!-- Video call modal -->
<div id="video" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnail no-margin">
                            <figure class="thumb">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" alt="">
                                <figcaption>
                                    <ul class="icons-list pull-left">
                                        <li><a href="#"><i class="icon-screen-full"></i></a></li>
                                    </ul>

                                    <ul class="icons-list pull-right">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-cog3"></i>
                                                <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-inbox pull-right"></i> Action</a></li>
                                                <li><a href="#"><i class="icon-googleplus5 pull-right"></i> Another action</a></li>
                                                <li><a href="#"><i class="icon-grid-alt pull-right"></i> Something else</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="icon-spinner2 spinner pull-right"></i> One more line</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </figcaption>
                            </figure>

                            <div class="caption text-center">
                                <h6 class="text-semibold no-margin">Adriana Linders <small class="display-block">Chief accountant</small></h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="thumbnail no-margin">
                            <figure class="thumb">
                                <img src="{{ URL::asset('limitless/assets/images/placeholder.jpg') }}" alt="">
                                <figcaption>
                                    <ul class="icons-list pull-left">
                                        <li><a href="#"><i class="icon-screen-full"></i></a></li>
                                    </ul>

                                    <ul class="icons-list pull-right">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-cog3"></i>
                                                <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-inbox pull-right"></i> Action</a></li>
                                                <li><a href="#"><i class="icon-googleplus5 pull-right"></i> Another action</a></li>
                                                <li><a href="#"><i class="icon-grid-alt pull-right"></i> Something else</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="icon-spinner2 spinner pull-right"></i> One more line</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </figcaption>
                            </figure>

                            <div class="caption text-center">
                                <h6 class="text-semibold no-margin">Victoria Ansley <small class="display-block">Lead UX designer</small></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="list-inline list-inline-condensed text-center">
                    <li><a href="#" class="btn bg-purple-300 btn-rounded btn-float"><i class="icon-mic2"></i></a></li>
                    <li><a href="#" class="btn bg-success-400 btn-rounded btn-float"><i class="icon-video-camera2"></i></a></li>
                    <li><a href="#" class="btn bg-blue btn-rounded btn-float"><i class="icon-comment"></i></a></li>
                    <li><a href="#" class="btn bg-danger btn-rounded btn-float" data-dismiss="modal"><i class="icon-phone-slash"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /video call modal -->

@endsection