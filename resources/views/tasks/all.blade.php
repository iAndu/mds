@extends('layouts.app')

@section('content')
    @foreach($tasksByProjects as $tasksByProject)
        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title"> {{ $tasksByProject['project']->name }} <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                <div class="heading-elements">
                </div>
            </div>
        @foreach (array_chunk($tasksByProject['tasks'], 3) as $collection)
            <div class="row">
                @foreach ($collection as $taskInfo)
                    <div class="col-md-4">
                        <div class="panel animation" data-animation="fadeInDownBig">
                            <div class="panel-heading bg-@php echo $priorityToStyle[$taskInfo['task']->priority] @endphp">
                                <h6 class="panel-title">{{ $taskInfo['task']->title }}</h6>
                                <div class="heading-elements">
                                    <a href="#" class="btn btn-icon bg-@php echo $priorityToStyle[$taskInfo['task']->priority] @endphp legitRipple"
                                               data-toggle="modal" data-target="#modal_task{{ $taskInfo['task']->id }}">
                                                <i class="icon-eye"></i>
                                            </a>

                                </div>
                            </div>

                            <div class="panel-body">
                                {{ $taskInfo['task']->description }}
                            </div>
                        </div>
                        <!-- modal for task -->
                        <div id="modal_task{{ $taskInfo['task']->id }}" class="modal fade" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h3 class="modal-title"> {{ $taskInfo['task']->title }}</h3>
                                    </div>

                                    <div class="modal-body">
                                        <ul class="media-list">
                                            <li class="media-header">
                                                <i class="glyphicon glyphicon-align-left"></i> Description
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <div class="col-lg-10">
                                                        <textarea rows="3" cols="5" class="form-control" placeholder="Default textarea">
                                                            {{ $taskInfo['task']->description }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                            <li class="media-header">
                                                <i class="icon-calendar5"></i> Deadline
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <input
                                                            name="deadline"
                                                            type="text"
                                                            class="form-control pickadate picker__input"
                                                            placeholder="
                                                            @php
                                                                $date = new DateTime($taskInfo['task']->deadline);
                                                                echo $date->format('Y-m-d  H:i');
                                                            @endphp
                                                            "
                                                            readonly=""
                                                            id="P1978734162"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                            aria-readonly="false"
                                                            aria-owns="P1978734162_root"
                                                    >
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                            <li class="media-header">
                                                <i class="glyphicon glyphicon-time"></i> Priority
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <div class="alert bg-@php echo $priorityToStyle[$taskInfo['task']->priority] @endphp alert-styled-left">
                                                        @php echo ucfirst($taskInfo['task']->priority) @endphp
                                                    </div>
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                            @if(!empty($taskInfo['subTasks']))
                                                <li class="media-header">
                                                    <i class="glyphicon glyphicon-list-alt"></i> Subtasks
                                                </li>
                                                <li class="media">
                                                    <div class="media-left media-middle">
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="col-lg-12">
                                                            <div class="panel-group panel-group-control content-group-lg">
                                                                @foreach($taskInfo['subTasks'] as $subTask)
                                                                    <div class="panel">
                                                                        <div class="panel-heading bg-@php echo $priorityToStyle[$subTask->priority] @endphp">
                                                                            <h6 class="panel-title">
                                                                                <a data-toggle="collapse" href="#collapsible-control-group{{ $subTask->id }}"
                                                                                   aria-expanded="false" class="collapsed">{{ $subTask->title }}</a>
                                                                            </h6>
                                                                            <div class="heading-elements">
                                                                                <button type="button" class="btn btn-@php echo $priorityToStyle[$subTask->priority] @endphp check"
                                                                                        data-style="@php echo $priorityToStyle[$subTask->priority] @endphp"
                                                                                        data-checked="{{ $subTask->finished == 1 ? "1" : "0" }}"
                                                                                >
                                                                                    <i class="icon-circle"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div id="collapsible-control-group{{ $subTask->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                                            <div class="panel-body">
                                                                                {{ $subTask->description }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="media-right media-middle">
                                                    </div>
                                                </li>
                                            @endif
                                            <li class="media-header">
                                                <i class="glyphicon glyphicon-user"></i> Assignees
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <div class="col-lg-12">
                                                        <form method="post" action="{{ route('projects.store') }}" id="project-create"
                                                              enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                            @foreach($taskInfo['usersWithAssigned'] as $userInfo)
                                                                <div class="checkbox">
                                                                    <label for="{{ $userInfo['user']->name }}"> {{ $userInfo['user']->name }} </label>
                                                                    <input
                                                                            id="{{ $userInfo['user']->name }}"
                                                                            name="assignedUsers{{ $taskInfo['task']->id }}"
                                                                            type="checkbox"
                                                                            class="styled"
                                                                            @if($userInfo['isAssigned'] == true)
                                                                                checked
                                                                            @endif
                                                                    >
                                                                </div>
                                                            @endforeach
                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>

                                            <li class="media">
                                                <div class="media-left media-middle">
                                                </div>

                                                <div class="media-body">
                                                    <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title text-semiold"><i class="icon-bubbles4 position-left"></i> Comments<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                                                            <div class="heading-elements">
                                                                <a href="#" class="btn bg-blue btn-xs btn-icon legitRipple"><i class="icon-plus2"></i></a>
                                                            </div>
                                                        </div>

                                                        <div class="panel-body">
                                                            <ul class="media-list content-group-lg stack-media-on-mobile">
                                                                <li class="media">
                                                                    <div class="media-left">
                                                                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <div class="media-heading">
                                                                            <a href="#" class="text-semibold">William Jennings</a>
                                                                            <span class="media-annotation dotted">Just now</span>
                                                                        </div>

                                                                        <p>He moonlight difficult engrossed an it sportsmen. Interested has all devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>

                                                                        <ul class="list-inline list-inline-separate text-size-small">
                                                                            <li>114 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li><a href="#">Edit</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>

                                                                <li class="media">
                                                                    <div class="media-left">
                                                                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <div class="media-heading">
                                                                            <a href="#" class="text-semibold">Margo Baker</a>
                                                                            <span class="media-annotation dotted">5 minutes ago</span>
                                                                        </div>

                                                                        <p>Place voice no arise along to. Parlors waiting so against me no. Wishing calling are warrant settled was luckily. Express besides it present if at an opinion visitor.</p>

                                                                        <ul class="list-inline list-inline-separate text-size-small">
                                                                            <li>90 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li><a href="#">Edit</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>

                                                                <li class="media">
                                                                    <div class="media-left">
                                                                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <div class="media-heading">
                                                                            <a href="#" class="text-semibold">James Alexander</a>
                                                                            <span class="media-annotation dotted">7 minutes ago</span>
                                                                        </div>

                                                                        <p>Savings her pleased are several started females met. Short her not among being any. Thing of judge fruit charm views do. Miles mr an forty along as he.</p>

                                                                        <ul class="list-inline list-inline-separate text-size-small">
                                                                            <li>70 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li><a href="#">Edit</a></li>
                                                                        </ul>

                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                                                                            </div>

                                                                            <div class="media-body">
                                                                                <div class="media-heading">
                                                                                    <a href="#" class="text-semibold">Jack Cooper</a>
                                                                                    <span class="media-annotation dotted">10 minutes ago</span>
                                                                                </div>

                                                                                <p>She education get middleton day agreement performed preserved unwilling. Do however as pleased offence outward beloved by present. By outward neither he so covered.</p>

                                                                                <ul class="list-inline list-inline-separate text-size-small">
                                                                                    <li>67 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                                                    <li><a href="#">Reply</a></li>
                                                                                    <li><a href="#">Edit</a></li>
                                                                                </ul>

                                                                                <div class="media">
                                                                                    <div class="media-left">
                                                                                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                                                                                    </div>

                                                                                    <div class="media-body">
                                                                                        <div class="media-heading">
                                                                                            <a href="#" class="text-semibold">Natalie Wallace</a>
                                                                                            <span class="media-annotation dotted">1 hour ago</span>
                                                                                        </div>

                                                                                        <p>Juvenile proposal betrayed he an informed weddings followed. Precaution day see imprudence sympathize principles. At full leaf give quit to in they up.</p>

                                                                                        <ul class="list-inline list-inline-separate text-size-small">
                                                                                            <li>54 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                                                            <li><a href="#">Reply</a></li>
                                                                                            <li><a href="#">Edit</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="media">
                                                                                    <div class="media-left">
                                                                                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                                                                                    </div>

                                                                                    <div class="media-body">
                                                                                        <div class="media-heading">
                                                                                            <a href="#" class="text-semibold">Nicolette Grey</a>
                                                                                            <span class="media-annotation dotted">2 hours ago</span>
                                                                                        </div>

                                                                                        <p>Although moreover mistaken kindness me feelings do be marianne. Son over own nay with tell they cold upon are. Cordial village and settled she ability law herself.</p>

                                                                                        <ul class="list-inline list-inline-separate text-size-small">
                                                                                            <li>41 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                                                            <li><a href="#">Reply</a></li>
                                                                                            <li><a href="#">Edit</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <li class="media">
                                                                    <div class="media-left">
                                                                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <div class="media-heading">
                                                                            <a href="#" class="text-semibold">Victoria Johnson</a>
                                                                            <span class="media-annotation dotted">3 hours ago</span>
                                                                        </div>

                                                                        <p>Finished why bringing but sir bachelor unpacked any thoughts. Unpleasing unsatiable particular inquietude did nor sir.</p>

                                                                        <ul class="list-inline list-inline-separate text-size-small">
                                                                            <li>32 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li><a href="#">Edit</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <h6 class="text-semibold"><i class="icon-pencil7 position-left"></i> Your comment</h6>
                                                            <div class="content-group">
                                                                <div id="add-comment{{ $taskInfo['task']->id }}" style="visibility: hidden; display: none;">Get his declared appetite distance his together now families. Friends am himself at on norland it viewing. Suspected elsewhere you belonging continued commanded she...</div><div id="cke_add-comment" class="cke_1 cke cke_reset cke_chrome cke_editor_add-comment cke_ltr cke_browser_webkit" dir="ltr" lang="en" role="application" aria-labelledby="cke_add-comment_arialbl"><span id="cke_add-comment_arialbl" class="cke_voice_label">Rich Text Editor, add-comment</span><div class="cke_inner cke_reset" role="presentation"><span id="cke_1_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;"><span id="cke_8" class="cke_voice_label">Editor toolbars</span><span id="cke_1_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_8" onmousedown="return false;"><span id="cke_11" class="cke_toolbar" aria-labelledby="cke_11_label" role="toolbar"><span id="cke_11_label" class="cke_voice_label">Styles</span><span class="cke_toolbar_start"></span><span id="cke_9" class="cke_combo cke_combo__styles cke_combo_off" role="presentation"><span id="cke_9_label" class="cke_combo_label">Styles</span><a class="cke_combo_button" title="Formatting Styles" tabindex="-1" href="javascript:void('Formatting Styles')" hidefocus="true" role="button" aria-labelledby="cke_9_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(3,event,this);" onfocus="return CKEDITOR.tools.callFunction(4,event);" onclick="CKEDITOR.tools.callFunction(2,this);return false;"><span id="cke_9_text" class="cke_combo_text cke_combo_inlinelabel">Styles</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span id="cke_10" class="cke_combo cke_combo__format cke_combo_off" role="presentation"><span id="cke_10_label" class="cke_combo_label">Format</span><a class="cke_combo_button" title="Paragraph Format" tabindex="-1" href="javascript:void('Paragraph Format')" hidefocus="true" role="button" aria-labelledby="cke_10_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(6,event,this);" onfocus="return CKEDITOR.tools.callFunction(7,event);" onclick="CKEDITOR.tools.callFunction(5,this);return false;"><span id="cke_10_text" class="cke_combo_text cke_combo_inlinelabel">Format</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_12" class="cke_toolbar" aria-labelledby="cke_12_label" role="toolbar"><span id="cke_12_label" class="cke_voice_label">Forms</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_13" class="cke_button cke_button__form cke_button_off" href="javascript:void('Form')" title="Form" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_13_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(8,event);" onfocus="return CKEDITOR.tools.callFunction(9,event);" onclick="CKEDITOR.tools.callFunction(10,this);return false;"><span class="cke_button_icon cke_button__form_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1128px;background-size:auto;">&nbsp;</span><span id="cke_13_label" class="cke_button_label cke_button__form_label" aria-hidden="false">Form</span></a><a id="cke_14" class="cke_button cke_button__checkbox cke_button_off" href="javascript:void('Checkbox')" title="Checkbox" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_14_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(11,event);" onfocus="return CKEDITOR.tools.callFunction(12,event);" onclick="CKEDITOR.tools.callFunction(13,this);return false;"><span class="cke_button_icon cke_button__checkbox_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1104px;background-size:auto;">&nbsp;</span><span id="cke_14_label" class="cke_button_label cke_button__checkbox_label" aria-hidden="false">Checkbox</span></a><a id="cke_15" class="cke_button cke_button__radio cke_button_off" href="javascript:void('Radio Button')" title="Radio Button" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_15_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(14,event);" onfocus="return CKEDITOR.tools.callFunction(15,event);" onclick="CKEDITOR.tools.callFunction(16,this);return false;"><span class="cke_button_icon cke_button__radio_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1200px;background-size:auto;">&nbsp;</span><span id="cke_15_label" class="cke_button_label cke_button__radio_label" aria-hidden="false">Radio Button</span></a><a id="cke_16" class="cke_button cke_button__textfield cke_button_off" href="javascript:void('Text Field')" title="Text Field" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_16_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(17,event);" onfocus="return CKEDITOR.tools.callFunction(18,event);" onclick="CKEDITOR.tools.callFunction(19,this);return false;"><span class="cke_button_icon cke_button__textfield_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1344px;background-size:auto;">&nbsp;</span><span id="cke_16_label" class="cke_button_label cke_button__textfield_label" aria-hidden="false">Text Field</span></a><a id="cke_17" class="cke_button cke_button__textarea cke_button_off" href="javascript:void('Textarea')" title="Textarea" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_17_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(20,event);" onfocus="return CKEDITOR.tools.callFunction(21,event);" onclick="CKEDITOR.tools.callFunction(22,this);return false;"><span class="cke_button_icon cke_button__textarea_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1296px;background-size:auto;">&nbsp;</span><span id="cke_17_label" class="cke_button_label cke_button__textarea_label" aria-hidden="false">Textarea</span></a><a id="cke_18" class="cke_button cke_button__select cke_button_off" href="javascript:void('Selection Field')" title="Selection Field" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_18_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(23,event);" onfocus="return CKEDITOR.tools.callFunction(24,event);" onclick="CKEDITOR.tools.callFunction(25,this);return false;"><span class="cke_button_icon cke_button__select_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1248px;background-size:auto;">&nbsp;</span><span id="cke_18_label" class="cke_button_label cke_button__select_label" aria-hidden="false">Selection Field</span></a><a id="cke_19" class="cke_button cke_button__button cke_button_off" href="javascript:void('Button')" title="Button" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_19_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onclick="CKEDITOR.tools.callFunction(28,this);return false;"><span class="cke_button_icon cke_button__button_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1080px;background-size:auto;">&nbsp;</span><span id="cke_19_label" class="cke_button_label cke_button__button_label" aria-hidden="false">Button</span></a><a id="cke_20" class="cke_button cke_button__imagebutton cke_button_off" href="javascript:void('Image Button')" title="Image Button" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_20_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(29,event);" onfocus="return CKEDITOR.tools.callFunction(30,event);" onclick="CKEDITOR.tools.callFunction(31,this);return false;"><span class="cke_button_icon cke_button__imagebutton_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1176px;background-size:auto;">&nbsp;</span><span id="cke_20_label" class="cke_button_label cke_button__imagebutton_label" aria-hidden="false">Image Button</span></a><a id="cke_21" class="cke_button cke_button__hiddenfield cke_button_off" href="javascript:void('Hidden Field')" title="Hidden Field" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_21_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(32,event);" onfocus="return CKEDITOR.tools.callFunction(33,event);" onclick="CKEDITOR.tools.callFunction(34,this);return false;"><span class="cke_button_icon cke_button__hiddenfield_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -1152px;background-size:auto;">&nbsp;</span><span id="cke_21_label" class="cke_button_label cke_button__hiddenfield_label" aria-hidden="false">Hidden Field</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_22" class="cke_toolbar" aria-labelledby="cke_22_label" role="toolbar"><span id="cke_22_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_23" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Bold')" title="Bold" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_23_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(35,event);" onfocus="return CKEDITOR.tools.callFunction(36,event);" onclick="CKEDITOR.tools.callFunction(37,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_23_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Bold</span></a><a id="cke_24" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Italic')" title="Italic" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_24_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(38,event);" onfocus="return CKEDITOR.tools.callFunction(39,event);" onclick="CKEDITOR.tools.callFunction(40,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_24_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Italic</span></a><a id="cke_25" class="cke_button cke_button__underline cke_button_off" href="javascript:void('Underline')" title="Underline" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_25_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(41,event);" onfocus="return CKEDITOR.tools.callFunction(42,event);" onclick="CKEDITOR.tools.callFunction(43,this);return false;"><span class="cke_button_icon cke_button__underline_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -144px;background-size:auto;">&nbsp;</span><span id="cke_25_label" class="cke_button_label cke_button__underline_label" aria-hidden="false">Underline</span></a><a id="cke_26" class="cke_button cke_button__strike cke_button_off" href="javascript:void('Strikethrough')" title="Strikethrough" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_26_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(44,event);" onfocus="return CKEDITOR.tools.callFunction(45,event);" onclick="CKEDITOR.tools.callFunction(46,this);return false;"><span class="cke_button_icon cke_button__strike_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -72px;background-size:auto;">&nbsp;</span><span id="cke_26_label" class="cke_button_label cke_button__strike_label" aria-hidden="false">Strikethrough</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_27" class="cke_toolbar" aria-labelledby="cke_27_label" role="toolbar"><span id="cke_27_label" class="cke_voice_label">Paragraph</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_28" class="cke_button cke_button__numberedlist cke_button_off" href="javascript:void('Insert/Remove Numbered List')" title="Insert/Remove Numbered List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_28_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(47,event);" onfocus="return CKEDITOR.tools.callFunction(48,event);" onclick="CKEDITOR.tools.callFunction(49,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -648px;background-size:auto;">&nbsp;</span><span id="cke_28_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Insert/Remove Numbered List</span></a><a id="cke_29" class="cke_button cke_button__bulletedlist cke_button_off" href="javascript:void('Insert/Remove Bulleted List')" title="Insert/Remove Bulleted List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_29_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(50,event);" onfocus="return CKEDITOR.tools.callFunction(51,event);" onclick="CKEDITOR.tools.callFunction(52,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -600px;background-size:auto;">&nbsp;</span><span id="cke_29_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Insert/Remove Bulleted List</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_30" class="cke_button cke_button__blockquote cke_button_off" href="javascript:void('Block Quote')" title="Block Quote" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_30_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(53,event);" onfocus="return CKEDITOR.tools.callFunction(54,event);" onclick="CKEDITOR.tools.callFunction(55,this);return false;"><span class="cke_button_icon cke_button__blockquote_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -168px;background-size:auto;">&nbsp;</span><span id="cke_30_label" class="cke_button_label cke_button__blockquote_label" aria-hidden="false">Block Quote</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_31" class="cke_toolbar" aria-labelledby="cke_31_label" role="toolbar"><span id="cke_31_label" class="cke_voice_label">Links</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_32" class="cke_button cke_button__link cke_button_off" href="javascript:void('Link')" title="Link" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_32_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(56,event);" onfocus="return CKEDITOR.tools.callFunction(57,event);" onclick="CKEDITOR.tools.callFunction(58,this);return false;"><span class="cke_button_icon cke_button__link_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -528px;background-size:auto;">&nbsp;</span><span id="cke_32_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Link</span></a><a id="cke_33" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('Unlink')" title="Unlink" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_33_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(59,event);" onfocus="return CKEDITOR.tools.callFunction(60,event);" onclick="CKEDITOR.tools.callFunction(61,this);return false;"><span class="cke_button_icon cke_button__unlink_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -552px;background-size:auto;">&nbsp;</span><span id="cke_33_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">Unlink</span></a><a id="cke_34" class="cke_button cke_button__anchor cke_button_off" href="javascript:void('Anchor')" title="Anchor" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_34_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(62,event);" onfocus="return CKEDITOR.tools.callFunction(63,event);" onclick="CKEDITOR.tools.callFunction(64,this);return false;"><span class="cke_button_icon cke_button__anchor_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -504px;background-size:auto;">&nbsp;</span><span id="cke_34_label" class="cke_button_label cke_button__anchor_label" aria-hidden="false">Anchor</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_35" class="cke_toolbar" aria-labelledby="cke_35_label" role="toolbar"><span id="cke_35_label" class="cke_voice_label">Insert</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_36" class="cke_button cke_button__image cke_button_off" href="javascript:void('Image')" title="Image" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_36_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(65,event);" onfocus="return CKEDITOR.tools.callFunction(66,event);" onclick="CKEDITOR.tools.callFunction(67,this);return false;"><span class="cke_button_icon cke_button__image_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -360px;background-size:auto;">&nbsp;</span><span id="cke_36_label" class="cke_button_label cke_button__image_label" aria-hidden="false">Image</span></a><a id="cke_37" class="cke_button cke_button__table cke_button_off" href="javascript:void('Table')" title="Table" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_37_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(68,event);" onfocus="return CKEDITOR.tools.callFunction(69,event);" onclick="CKEDITOR.tools.callFunction(70,this);return false;"><span class="cke_button_icon cke_button__table_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -912px;background-size:auto;">&nbsp;</span><span id="cke_37_label" class="cke_button_label cke_button__table_label" aria-hidden="false">Table</span></a><a id="cke_38" class="cke_button cke_button__horizontalrule cke_button_off" href="javascript:void('Insert Horizontal Line')" title="Insert Horizontal Line" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_38_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(71,event);" onfocus="return CKEDITOR.tools.callFunction(72,event);" onclick="CKEDITOR.tools.callFunction(73,this);return false;"><span class="cke_button_icon cke_button__horizontalrule_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -336px;background-size:auto;">&nbsp;</span><span id="cke_38_label" class="cke_button_label cke_button__horizontalrule_label" aria-hidden="false">Insert Horizontal Line</span></a><a id="cke_39" class="cke_button cke_button__specialchar cke_button_off" href="javascript:void('Insert Special Character')" title="Insert Special Character" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_39_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(74,event);" onfocus="return CKEDITOR.tools.callFunction(75,event);" onclick="CKEDITOR.tools.callFunction(76,this);return false;"><span class="cke_button_icon cke_button__specialchar_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -864px;background-size:auto;">&nbsp;</span><span id="cke_39_label" class="cke_button_label cke_button__specialchar_label" aria-hidden="false">Insert Special Character</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_40" class="cke_toolbar" aria-labelledby="cke_40_label" role="toolbar"><span id="cke_40_label" class="cke_voice_label">Tools</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_41" class="cke_button cke_button__maximize cke_button_off" href="javascript:void('Maximize')" title="Maximize" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_41_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(77,event);" onfocus="return CKEDITOR.tools.callFunction(78,event);" onclick="CKEDITOR.tools.callFunction(79,this);return false;"><span class="cke_button_icon cke_button__maximize_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -672px;background-size:auto;">&nbsp;</span><span id="cke_41_label" class="cke_button_label cke_button__maximize_label" aria-hidden="false">Maximize</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_42" class="cke_toolbar" aria-labelledby="cke_42_label" role="toolbar"><span id="cke_42_label" class="cke_voice_label">Document</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_43" class="cke_button cke_button__source cke_button_off" href="javascript:void('Source')" title="Source" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_43_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(80,event);" onfocus="return CKEDITOR.tools.callFunction(81,event);" onclick="CKEDITOR.tools.callFunction(82,this);return false;"><span class="cke_button_icon cke_button__source_icon" style="background-image:url(file:///D:/limitless-layout-code/ckeditor/plugins/icons.png?t=F969);background-position:0 -840px;background-size:auto;">&nbsp;</span><span id="cke_43_label" class="cke_button_label cke_button__source_label" aria-hidden="false">Source</span></a></span><span class="cke_toolbar_end"></span></span></span></span><div id="cke_1_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;"><span id="cke_47" class="cke_voice_label">Press ALT 0 for help</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" title="Rich Text Editor, add-comment" aria-describedby="cke_47" tabindex="0" allowtransparency="true" style="width: 100%; height: 100%;"></iframe></div><span id="cke_1_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_1_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Resize" onmousedown="CKEDITOR.tools.callFunction(0, event)">◢</span><span id="cke_1_path_label" class="cke_voice_label">Elements path</span><span id="cke_1_path" class="cke_path" role="group" aria-labelledby="cke_1_path_label"><span class="cke_path_empty">&nbsp;</span></span></span></div></div>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="button" class="btn bg-blue legitRipple"><i class="icon-plus22"></i> Add comment</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="media-right media-middle">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close<span class="legitRipple-ripple" style="left: 60.6506%; top: 46.3158%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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

        .panel.animation { /* small fix for better appearance */
            margin: 5px 5px 5px 5px;
        }
    </style>
@endpush

@push('js')

    {{-- <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/animations_css3.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/jquery_ui/touch.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/pages/components_navs.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/core/libraries/jquery_ui/widgets.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('limitless/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>

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

            let checks = $('.check');
            for(let i = 0 ; i < checks.length ; i++)
            {
                $(checks[i]).hover(function() {
                    let checked = $(this).data('checked');
                    if(checked === 0)
                    {
                        $(this).find('i').attr('class', 'icon-checkmark-circle');
                    }
                }, function() {
                    let checked = $(this).data('checked');
                    if(checked === 0)
                    {
                        $(this).find('i').attr('class', 'icon-circle');
                    }
                });

                //need to make an ajax request here, to mark subtasks as checked
                $(checks[i]).click(function() {
                    let style = $(this).data('style');
                    let checked = $(this).data('checked');

                    if(checked === 0)
                    {
                        $(this).closest('div.panel-heading').removeClass('bg-' + style).addClass('bg-success');
                        $(this).removeClass('btn-' + style).addClass('btn-success');
                        $(this).data('checked', 1);
                        $(this).find('i').attr('class', 'icon-checkmark-circle');
                    }
                    else {
                        $(this).closest('div.panel-heading').removeClass('bg-success').addClass('bg-' + style);
                        $(this).removeClass('btn-success').addClass('btn-' + style);
                        $(this).data('checked', 0);
                    }
                });
            }

            //CKEditor stuff
            @foreach($tasksByProjects as $tasksByProject)
                @foreach ($tasksByProject['tasks'] as $taskInfo)
                    CKEDITOR.replace( 'add-comment{{ $taskInfo['task']->id }}', {
                        height: '200px',
                        removeButtons: 'Subscript,Superscript',
                        toolbarGroups: [
                            { name: 'styles' },
                            { name: 'editing',     groups: [ 'find', 'selection' ] },
                            { name: 'forms' },
                            { name: 'basicstyles', groups: [ 'basicstyles' ] },
                            { name: 'paragraph',   groups: [ 'list', 'blocks', 'align' ] },
                            { name: 'links' },
                            { name: 'insert' },
                            { name: 'colors' },
                            { name: 'tools' },
                            { name: 'others' },
                            { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] }
                        ]
                    });
                @endforeach
            @endforeach

            //remove useless cke_add-comment that appear ( those who do not have an associated task)
            var toDelete = document.querySelectorAll('#cke_add-comment');
            for(let i = 0 ; i < toDelete.length ; i++) {
                $(toDelete[i]).css('display', 'none');
            }
        });
    </script>
@endpush