@extends('layouts.app')

@section('content')

@foreach ($projects->chunk(3) as $collection)
<div class="row">
    @foreach ($collection as $project)
    <div class="col-md-4">
        <div class="thumbnail">
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

@push('js')

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/components_thumbnails.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/animations_css3.js') }}"></script>

@endpush