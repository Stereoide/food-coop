@extends('layouts.default')

@section('content')
	<div class="section-header">Administration</div>
	
	<div class="row">
		<div class="col-xs-12"><a href="{{ URL::to('admin/categories') }}">Kategorien</a></div>
	</div>
	<div class="row">
		<div class="col-xs-12"><a href="{{ URL::to('admin/users') }}">Benutzer</a></div>
	</div>
@stop
