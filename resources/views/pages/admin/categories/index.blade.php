@extends('layouts.default')

@section('content')
@if (Session::has('message'))
	<div class="alert alert-success">
	{{ Session::get('message') }}
	</div>
@endif
	
	<div class="section-header">Administration - Kategorien-Übersicht</div>
	
	<div class="block">
@if (count($categories) > 0)
	@foreach ($categories as $category)
		<div class="row">
			<div class="col-xs-1">
				<a href="{{ URL::to('admin/categories/' . $category->id) }}">{{ $category->name }}</a>
			</div>
			<div class="col-xs-11">
				{{ $category->description }}
			</div>
		</div>
	@endforeach
@else
		Zur Zeit sind keine Kategorien angelegt
@endif
	</div>
	
	<div class="block">
		<a href="{{ URL::to('admin/categories/create') }}" class="btn btn-default">Neue Kategorie erstellen</a>
	</div>
@stop