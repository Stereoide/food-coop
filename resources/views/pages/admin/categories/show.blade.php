@extends('layouts.default')

@section('content')
	<div class="section-header">Administration - Kategorie-Details</div>
	
	<div class="block">
		<div class="row">
			<div class="col-xs-2 datatable-label">Bezeichnung</div>
			<div class="col-xs-10 datatable-data">{{ $category->name }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Beschreibung</div>
			<div class="col-xs-10 datatable-data">{{ $category->description }}</div>
		</div>
	</div>
	
	<div class="block">
		<div class="row">
			<div class="col-xs-2 datatable-label">Produkte</div>
			<div class="col-xs-10 datatable-data">
		@if (count($category->products) > 0)
			@foreach ($category->products as $product)
				<div class="row">
					<div class="col-xs-2"><a href="{{ URL::to('admin/categories/' . $category->id . '/products/' . $product->id) }}">{{ $product->name }}</a></div>
					<div class="col-xs-8">{{ $product->description }}</div>
					<div class="col-xs-2 text-right">&euro; {{ number_format($product->price, 2, ',', '.') }}</div>
				</div>
			@endforeach
		@else
				Zur Zeit sind keine Produkte für diese Kategorie eingepflegt.
		@endif
			</div>
		</div>
	</div>
	
	<div class="block">
		<div class="row">
			<div class="col-xs-10">
				<a href="{{ URL::to('admin/categories') }}" class="btn btn-default">Zurück</a>
				<a href="{{ URL::to('admin/categories/' . $category->id . '/edit') }}" class="btn btn-default">Kategorie bearbeiten</a>
				<a href="{{ URL::to('admin/categories/' . $category->id . '/products/create') }}" class="btn btn-default">Neues Produkt anlegen</a>
			</div>
			<div class="col-xs-2 text-right">
				{!! Form::open(['method' => 'DELETE', 'url' => 'admin/categories/' . $category->id, 'role' => 'form', 'class' => 'form-inline']) !!}
				{!! Form::submit('Kategorie löschen', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop