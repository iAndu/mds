@extends('layouts.app')

@section('content')

@foreach ($projects->chunk(3) as $collection)
<div class="row">
    @foreach ($collection as $project)
    <div class="col-md-4">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title"> {{ $project->name }} <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a href="#" class="animation" data-animation="rollIn"><i class="icon-play3"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <img src="storage/{{ $project->avatar }}">
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach

@endsection