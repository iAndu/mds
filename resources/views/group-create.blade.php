@extends('layouts.app')

@section('content')
    <!-- <div class="row"> -->
        <form class="form-horizontal">
            <fieldset class="content-group">
                <legend class="text-bold">Group details</legend>

                <div class="form-group">
                    <label class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Avatar</label>
                    <div class="col-lg-10">
                        <div class="uploader">
                            <input type="file" name="group_avatar" class="file-styled-primary">
                            <span class="filename" style="user-select: none;">No file selected</span>
                            <span class="action btn bg-blue legitRipple" style="user-select: none;">
                                Choose File
                            </span>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="text-right">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit
                    <i class="icon-arrow-right14 position-right"></i>
                </button>
            </div>
        </form>
    <!-- </div> -->
@endsection