@extends('layouts.default')

@section('content')
@if (Session::has('message'))
	<div class="alert alert-success">
	{{ Session::get('message') }}
	</div>
@endif

    <div class="section-header">Administration - Benutzer-Übersicht</div>
	
	<div class="block">
@if (count($users) > 0)
	@foreach ($users as $user)
		<div class="row">
			<div class="col-xs-12"><a href="{{ URL::to('admin/users/' . $user->id) }}">{{ $user->name }}</a></div>
		</div>
	@endforeach
@else
		Zur Zeit sind keine Benutzer gespeichert
@endif
	</div>
	
	<div class="block">
		<a href="{{ URL::to('admin/users/create') }}" class="btn btn-default">Neuen Benutzer anlegen</a>
	</div>
@stop