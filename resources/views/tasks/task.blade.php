<div class="group-item">

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