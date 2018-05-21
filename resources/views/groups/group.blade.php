<div class="group-item">
		@if(Auth::check())
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

			@endif
		@endif
		
	<h2 class="group-discipline">
		<a href="/groups/{{ $group->id }}">
		Discipline: {{ $group->discipline }}
		</a>
	</h2>
	
	<h3>
		{{ $group->description }}
	</h3>

	<p class="group-meta">
		<strong>Teacher: {{ $group->teacher->user->name }}</strong>
	</p>

	<p class="group-meta">
		<strong>Students: {{ $group->students->count() }}</strong>
	</p>
</div>
