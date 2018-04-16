@extends('layouts.app')

@section('content')
<!-- Horizontal form options -->
<div class="row">
    <div class="col-md-6">

        <!-- Basic layout-->
        <form method="post" action="{{ route('projects.store') }}" id="project-create"
                enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Create project</h5>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-9">
                            <input name="name" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Group</label>
                        <div class="col-lg-9">
                            <select name="group_id" class="select">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}"> {{ $group->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Group avatar:</label>
                        <div class="col-lg-9">
                            <input name="avatar" type="file" class="file-styled">
                            <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic layout -->

    </div>
</div>
@endsection