<div class="group-item">

	@if(!$user->isTeacher())
		<button>
			<a href="{{ route('createsolution', $task->id) }}">Create solution</a>
		</button>
	@endif

	<h2>
		Title:
		<a href="{{ route('task', $task->id) }}">
			<u>{{ $task->title }}</u>
		</a>
	</h2>
	
	<hr>

	<h3>
		Description: {{ $task->description }}
	</h3>

	<p class="group-meta">
		<strong>Teacher: {{ $task->teacher->user->name }}</strong>
	</p>

</div>