@if (count($errors) > 0)
	<div class="block">
		<div class="panel panel-danger">
			<div class="panel-heading">Es sind Fehler aufgetreten</div>
			<div class="panel-body">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		</div>
	</div>
@endif
	
	{!! Form::hidden('id', $category->id) !!}
	<div class="block">
		<div class="form-group">
			<label for="name">Name</label>
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="description">Beschreibung</label>
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
	</div>