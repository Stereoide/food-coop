@extends('layouts.default')

@section('content')
	{!! Form::model($product, ['method' => 'POST', 'route' => ['admin.categories.products.store', $category->id, $product->id], 'role' => 'form']) !!}
	
	<div class="section-header">Administration - Kategorie:{{ $category->name }} - Produkt erstellen</div>
	
	@include('pages.admin.products._form')
	
	<div class="block">
		<div class="row">
			<div class="col-xs-2">
				<input type="submit" class="btn btn-success" value="Produkt erstellen" />
			</div>
			<div class="col-xs-10 text-right">
				<a href="{{ URL::to('admin/categories/' . $category->id) }}" class="btn btn-default">Abbrechen</a>
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}
@stop