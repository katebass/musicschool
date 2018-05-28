<div class="group-item">

	<h2>
		Task: <a href="{{ route('task', $solution->assignment->task->id) }}">
			<u>{{ $solution->assignment->task->title }} </u>
		</a>
	</h2>
	<hr>
	<h3>
		Author: {{ $solution->student->user->name }}
	</h3>

	<h5>
		Description: {{ $solution->description }}
	</h5>

	<h5> Audio:	</h5>

	<form action="{{ route('getSolutionFile', $solution->id) }}" method="POST">
		{{ csrf_field() }}
		<input type="submit" value="download audio">
	</form>
	<br>
	<h5>
		Sending date: {{ $solution->handover_date }}
	</h5>

	
	@if($user->isTeacher())

		<form action="{{ route('updatemark', $solution->id) }}" method="POST">
			{{ csrf_field() }}
			
			<div class="form-group">
				<label>Mark: </label>
				<input type="text" name="mark" value="{{ $solution->mark }}">
				<button type="submit">Put a mark</button>
			</div>

		</form>

	@else

		@if( empty($solution->mark) )
			<h3>Mark: not estimated yet</h3>
		@else
			<h3>Mark: <strong>{{ $solution->mark }}</strong></h3>
		@endif

	@endif

	<p class="group-meta">
		<strong>Teacher: {{ $solution->student->user->name }}</strong>
	</p>

</div>