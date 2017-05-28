@extends('layouts.default')

@section('content')
	{!! Form::model($user, ['method' => 'PATCH', 'route' => ['admin.users.update', $user->id], 'role' => 'form']) !!}
	
	<div class="section-header">Administration - Benutzer bearbeiten</div>
	
	@include('pages.admin.users._form')
	
	<div class="block">
		<input type="submit" class="btn btn-default" value="Benutzer aktualisieren" />
		<a href="{{ URL::to('admin/users') }}" class="btn btn-default">Abbrechen</a>
	</div>
	
	{!! Form::close() !!}
@stop