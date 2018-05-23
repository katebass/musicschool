<div class="group-item">

	<h2>
		Task: {{ $solution->id }}
	</h2>
	
	<hr>

	<h3>
		Author: {{ $solution->student->user->name }}
	</h3>

	<h5>
		Description: {{ $solution->description }}
	</h5>

	<h5>
		Audio: {{ $solution->audiofile }}
	</h5>

	<h5>
		Sending date: {{ $solution->handover_date }}
	</h5>

	
	@if($user->isTeacher())

		<form action="">
			<div class="form-group">
				<label>Mark: </label>
				<input type="text" name="mark" value="{{ $solution->mark }}">
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