@extends('layouts.default')

@section('content')
	{!! Form::model($category, ['method' => 'PATCH', 'route' => ['admin.categories.update', $category->id], 'role' => 'form']) !!}
	
	<div class="section-header">Administration - Kategorie bearbeiten</div>
	
	@include('pages.admin.categories._form')
	
	<div class="block">
		<div class="row">
			<div class="col-xs-2">
				<input type="submit" class="btn btn-success" value="Kategorie bearbeiten" />
			</div>
			<div class="col-xs-10 text-right">
				<a href="{{ URL::to('admin/categories/' . $category->id) }}" class="btn btn-default">Abbrechen</a>
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}
@stop