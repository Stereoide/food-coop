@extends('layouts.default')

@section('content')
	{!! Form::model($user, ['method' => 'POST', 'route' => ['admin.users.store', $user->id], 'role' => 'form']) !!}
	
	<div class="section-header">Administration - Benutzer erstellen</div>
	
	@include('pages.admin.users._form')
	
	<div class="block">
		<input type="submit" class="btn btn-default" value="Benutzer erstellen" />
		<a href="{{ URL::to('admin/users') }}" class="btn btn-default">Abbrechen</a>
	</div>
	
	{!! Form::close() !!}
@stop