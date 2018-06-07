@extends('layouts.app')

@section('content')

<!-- Horizontal form options -->
<div class="row">
    <div class="col-md-6">

        <!-- Basic layout-->
        <form method="post" action="{{ route('tasks.store') }}" id="task-create"
                enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Create task</h5>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Title</label>
                        <div class="col-lg-9">
                            <input name="name" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Description</label>
                        <div class="col-lg-9">
                            <input name="description" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Deadline</label>
                        <div class="col-lg-9">
                            <div class="content-group-lg">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                                    <input name="deadline" type="text" class="form-control pickadate picker__input" placeholder="Pick a date" readonly="" id="P1978734162" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="P1978734162_root">
                                    <div class="picker" id="P1978734162_root" aria-hidden="true">
                                        <div class="picker__holder" tabindex="-1">
                                            <div class="picker__frame">
                                                <div class="picker__wrap">
                                                    <div class="picker__box">
                                                        <div class="picker__header">
                                                            <div class="picker__month">June</div>
                                                            <div class="picker__year">2018</div>
                                                            <div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="P1978734162_table" title="Previous month"> </div>
                                                            <div class="picker__nav--next" data-nav="1" role="button" aria-controls="P1978734162_table" title="Next month"> </div>
                                                        </div>
                                                        <table class="picker__table" id="P1978734162_table" role="grid" aria-controls="P1978734162" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="Sunday">Sun</th><th class="picker__weekday" scope="col" title="Monday">Mon</th><th class="picker__weekday" scope="col" title="Tuesday">Tue</th><th class="picker__weekday" scope="col" title="Wednesday">Wed</th><th class="picker__weekday" scope="col" title="Thursday">Thu</th><th class="picker__weekday" scope="col" title="Friday">Fri</th><th class="picker__weekday" scope="col" title="Saturday">Sat</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527368400000" role="gridcell" aria-label="27 May, 2018">27</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527454800000" role="gridcell" aria-label="28 May, 2018">28</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527541200000" role="gridcell" aria-label="29 May, 2018">29</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527627600000" role="gridcell" aria-label="30 May, 2018">30</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1527714000000" role="gridcell" aria-label="31 May, 2018">31</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1527800400000" role="gridcell" aria-label="1 June, 2018">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1527886800000" role="gridcell" aria-label="2 June, 2018">2</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1527973200000" role="gridcell" aria-label="3 June, 2018">3</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528059600000" role="gridcell" aria-label="4 June, 2018">4</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528146000000" role="gridcell" aria-label="5 June, 2018">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528232400000" role="gridcell" aria-label="6 June, 2018">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528318800000" role="gridcell" aria-label="7 June, 2018">7</div></td><td role="presentation"><div class="picker__day picker__day--infocus picker__day--selected picker__day--highlighted" data-pick="1528405200000" role="gridcell" aria-label="8 June, 2018" aria-selected="true" aria-activedescendant="true">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528491600000" role="gridcell" aria-label="9 June, 2018">9</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528578000000" role="gridcell" aria-label="10 June, 2018">10</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528664400000" role="gridcell" aria-label="11 June, 2018">11</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528750800000" role="gridcell" aria-label="12 June, 2018">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528837200000" role="gridcell" aria-label="13 June, 2018">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1528923600000" role="gridcell" aria-label="14 June, 2018">14</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529010000000" role="gridcell" aria-label="15 June, 2018">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529096400000" role="gridcell" aria-label="16 June, 2018">16</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529182800000" role="gridcell" aria-label="17 June, 2018">17</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529269200000" role="gridcell" aria-label="18 June, 2018">18</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529355600000" role="gridcell" aria-label="19 June, 2018">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529442000000" role="gridcell" aria-label="20 June, 2018">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529528400000" role="gridcell" aria-label="21 June, 2018">21</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529614800000" role="gridcell" aria-label="22 June, 2018">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529701200000" role="gridcell" aria-label="23 June, 2018">23</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529787600000" role="gridcell" aria-label="24 June, 2018">24</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529874000000" role="gridcell" aria-label="25 June, 2018">25</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1529960400000" role="gridcell" aria-label="26 June, 2018">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1530046800000" role="gridcell" aria-label="27 June, 2018">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1530133200000" role="gridcell" aria-label="28 June, 2018">28</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1530219600000" role="gridcell" aria-label="29 June, 2018">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1530306000000" role="gridcell" aria-label="30 June, 2018">30</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530392400000" role="gridcell" aria-label="1 July, 2018">1</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530478800000" role="gridcell" aria-label="2 July, 2018">2</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530565200000" role="gridcell" aria-label="3 July, 2018">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530651600000" role="gridcell" aria-label="4 July, 2018">4</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530738000000" role="gridcell" aria-label="5 July, 2018">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530824400000" role="gridcell" aria-label="6 July, 2018">6</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1530910800000" role="gridcell" aria-label="7 July, 2018">7</div></td></tr></tbody></table>
                                                        <div class="picker__footer">
                                                            <button class="picker__button--today" type="button" data-pick="1523826000000" aria-controls="P1978734162" disabled="disabled">
                                                                Today
                                                            </button>
                                                            <button class="picker__button--clear" type="button" data-clear="1" aria-controls="P1978734162" disabled="disabled">
                                                                Clear
                                                            </button>
                                                            <button class="picker__button--close" type="button" data-close="true" aria-controls="P1978734162" disabled="disabled">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Project</label>
                        <div class="col-lg-9">
                            <select name="project_id" class="select">
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}"> {{ $project->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Priority</label>
                        <div class="col-lg-9">
                            <select name="priority" class="select">
                                <option value="1">Low</option>
                                <option value="2">Normal</option>
                                <option value="3">High</option>
                                <option value="4">Urgent</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Subtasks</label>
                        <div class="col-lg-9">
                            <button id="addSubTask" type="button" class="btn btn-success">
                                <i class="glyphicon glyphicon-plus"></i> Add
                            </button>
                        </div>
                    </div>
                    @foreach(range(1, 20) as $item)
                        <div id="subTask{{ $item }}" class="panel panel-flat hidden">
                            <div class="panel-heading">
                                <button type="button" class="btn btn-danger btnRemove" data-id="{{ $item }}">
                                    <i class="glyphicon glyphicon-minus"></i> Remove
                                </button>
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="subtask[{{ $item  }}][title]">Title</label>
                                    <div class="col-lg-9">
                                        <input id="subTaskTitle{{ $item }}" name="subtask[{{ $item  }}][title]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="subtask[{{ $item }}][description]">Description</label>
                                    <div class="col-lg-9">
                                        <input id="subTaskDescription{{ $item }}" name="subtask[{{ $item }}][description]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="subtask[{{ $item }}][priority]">Priority</label>
                                    <div class="col-lg-9">
                                        <select id="subTaskPriority{{ $item }}" name="subtask[{{ $item }}][priority]" class="select">
                                            <option value="1">Low</option>
                                            <option value="2">Normal</option>
                                            <option value="3">High</option>
                                            <option value="4">Urgent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="text-right">
                        <button id="taskCreateSubmit" type="button" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
                    </div> <!-- submit action is overriden below -->
                </div>
            </div>
        </form>
        <!-- /basic layout -->

    </div>
</div>

@endsection

@push('js')

    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/anytime.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/picker_date.js') }}"></script>

    <script type="text/javascript">
        $(window).load(function(){
            id = 1;

            $('#addSubTask').on('click', function(e) {
                if(id <= 20)
                {
                    $('#subTask' + id).removeClass('hidden');
                    id++;
                }
            });

            let btnRemoves = $('.btnRemove');
            for(let i = 0 ; i < btnRemoves.length ; i++)
            {
                $(btnRemoves[i]).on('click', function(e) {
                   let subTaskId = $(this).data('id');
                   $('#subTask' + subTaskId).addClass('hidden');
                });
            }

            $('#taskCreateSubmit').on('click', function(e) {
                $('.hidden').remove();
                $('#task-create').submit();
            });
        });
    </script>
@endpush
