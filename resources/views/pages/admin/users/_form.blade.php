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

	<div class="block">
		<div class="form-group">
			<label for="name">Benutzername</label>
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label>Anrede</label><br />
			{!! Form::radio('salutation', 'Herr', null, ['id' => 'salutationHerr']) !!} {!! Form::label('salutationHerr', 'Herr') !!}
			{!! Form::radio('salutation', 'Frau', null, ['id' => 'salutationFrau']) !!} {!! Form::label('salutationFrau', 'Frau') !!}
		</div>
		<div class="form-group">
			<label for="firstname">Vorname</label>
			{!! Form::text('firstname', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="lastname">Nachname</label>
			{!! Form::text('lastname', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="email">eMail-Adresse</label>
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="street">Straße</label>
			{!! Form::text('street', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="zipcode">PLZ</label>
			{!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="city">Ort</label>
			{!! Form::text('city', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="phone">Telefon-Nr.</label>
			{!! Form::text('phone', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="password">Kennwort</label>
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label>Administrator</label><br />
			{!! Form::radio('is_administrator', 1, null, ['id' => 'administratorTrue']) !!} {!! Form::label('administratorTrue', 'Ja') !!}
			{!! Form::radio('is_administrator', 0, null, ['id' => 'administratorFalse']) !!} {!! Form::label('administratorFalse', 'Nein') !!}
		</div>
	</div>