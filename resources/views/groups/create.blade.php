@extends('layouts.app')

@section('content')

<!-- Horizontal form options -->
<div class="row">
    <div class="col-md-6">

        <!-- Basic layout-->
        <form method="POST" action="{{ route('groups.store', $group_id) }}" id="group-create"
                enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Create group</h5>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-9">
                            <input name="name" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Your avatar:</label>
                        <div class="col-lg-9">
                            <input name="avatar" type="file" class="file-styled">
                            <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" name="submitBtn">Submit<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic layout -->

    </div>
</div>

@endsection

@push('js')

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/pnotify.min.js') }}"></script>

    <script type="text/javascript">
        $(window).load(function(){
            // jQuery, bind an event handler or use some other way to trigger ajax call.
            $('form').submit(function( event ) {
                event.preventDefault();
                let URL = $(this).attr('action');
                $.ajax({
                    url: URL,
                    type: 'post',
                    data: $('form').serialize(), // Remember that you need to have your csrf token included
                    dataType: 'json',
                    success:function(data){
                        new PNotify({
                            text: 'Group successfully created!',
                            addclass: 'alert alert-styled-left alert-styled-custom alert-arrow-left bg-success'
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            });
        });
    </script>
@endpush