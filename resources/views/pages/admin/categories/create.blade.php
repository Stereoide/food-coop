@extends('layouts.default')

@section('content')
	{!! Form::model($category, ['method' => 'POST', 'route' => ['admin.categories.store', $category->id], 'role' => 'form']) !!}
	
	<div class="section-header">Administration - Kategorie erstellen</div>
	
	@include('pages.admin.categories._form')
	
	<div class="block">
		<div class="row">
			<div class="col-xs-2">
				<input type="submit" class="btn btn-success" value="Kategorie erstellen" />
			</div>
			<div class="col-xs-10 text-right">
				<a href="{{ URL::to('admin/categories') }}" class="btn btn-default">Abbrechen</a>
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}
@stop