@extends('layouts.default')

@section('content')
	<div class="section-header">Administration - Benutzer-Details</div>
	
	<div class="block">
		<div class="row">
			<div class="col-xs-2 datatable-label">Benutzername</div>
			<div class="col-xs-10 datatable-data">{{ $user->name }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Anrede</div>
			<div class="col-xs-10 datatable-data">{{ $user->salutation }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Vorname</div>
			<div class="col-xs-10 datatable-data">{{ $user->firstname }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Nachname</div>
			<div class="col-xs-10 datatable-data">{{ $user->lastname }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">eMail-Adresse</div>
			<div class="col-xs-10 datatable-data">{{ $user->email }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Straße</div>
			<div class="col-xs-10 datatable-data">{{ $user->street }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">PLZ</div>
			<div class="col-xs-10 datatable-data">{{ $user->zipcode }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Ort</div>
			<div class="col-xs-10 datatable-data">{{ $user->city }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Telefon-Nr.</div>
			<div class="col-xs-10 datatable-data">{{ $user->phone }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Administrator</div>
			<div class="col-xs-10 datatable-data">{{ ($user->is_administrator ? 'Ja' : 'Nein') }}</div>
		</div>
	</div>
	
	<div class="block">
		<div class="row">
			<div class="col-xs-2">
				<a href="{{ URL::to('admin/users') }}" class="btn btn-default">Zurück</a>
			</div>
			<div class="col-xs-10 text-right">
				<a href="{{ URL::to('admin/users/' . $user->id . '/edit') }}" class="btn btn-default">Bearbeiten</a>
				
				{!! Form::open(['method' => 'DELETE', 'url' => 'admin/users/' . $user->id, 'role' => 'form', 'class' => 'form-inline']) !!}
				{!! Form::submit('Löschen', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop