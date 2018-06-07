The following tasks are due tomorrow, hurry up!
<br/>
<br/>

<ul>
@foreach ($tasks as $task)
	<li>{{ $task->title }}</li>
@endforeach
</ul>
