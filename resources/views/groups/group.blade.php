<div class="group-item">
		@auth
			@if(!$user->isTeacher())

				@if($group->containsStudent())
					<button type="button" class="btn btn-primary button-join">
						<a href="{{ route('leavegroup', $group->id) }}">
							Leave group
						</a>
					</button>
				@else
					<button type="button" class="btn btn-primary button-join">
						<a href="{{ route('joingroup', $group->id) }}">
							Join group
						</a>
					</button>
				@endif
			@else
				@if($group->belongsToTeacher())
					<button type="button" class="btn btn-danger button-join">
						<a href="{{ route('deletegroup', $group->id) }}">
							Remove group
						</a>
					</button>
				@endif
			@endif
		@endauth
		
	<h2>
		Discipline:
		<a href="/groups/{{ $group->id }}">
			<u>{{ $group->discipline }}</u>
		</a>
	</h2>
	
	<hr>

	<h3>
		{{ $group->description }}
	</h3>

	<p class="group-meta">
		<strong>Teacher: {{ $group->teacher->user->name }}</strong>
	</p>

	<p class="group-meta">
		<strong>Students in group: {{ $group->students->count() }}</strong>
	</p>

	<p class="group-meta">
		<strong>Tasks in group: {{ $group->assignments->count() }}</strong>
	</p>

	@if($user->isTeacher() && $group->belongsToTeacher())
		<button type="button" class="btn btn-primary button-join">
			<a href="{{ route('addtask', $group->id) }}">
				Add task
			</a>
		</button>
	@endif
</div>