@extends('layouts.app')

@section('content')

@php
    $new_group = $group_id;
@endphp

<!-- Horizontal form options -->
<div class="row">
    <div class="col-md-6">

        <!-- Basic layout-->
        <form method="post" action="{{ route('groups.changed', $group_id) }}" id="project-create"
                enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <input type="text" style="display:none" id="new_group" />
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Change group</h5>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Group:</label>
                        <div class="col-lg-9">
                            <select id="groupChangeSelect" name="new_group" class="select">
                                @foreach($groups as $group)
                                    <option
                                            value="{{ $group->id }}"
                                            @if($group->id == $group_id)
                                                selected="selected"
                                            @endif
                                    > {{ $group->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" name="submitBtn">Change <i class="icon-arrow-right14 position-right"></i></button>
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
                new PNotify({
                    text: 'Group successfully changed!',
                    addclass: 'alert alert-styled-left alert-styled-custom alert-arrow-left bg-success'
                });
                var handlerId = setTimeout(function() {
                    let groupId = document.getElementById('groupChangeSelect').value;
                    window.location.replace('/' + groupId + '/groups/change');
                }, 1500);
            });
        });
    </script>
@endpush