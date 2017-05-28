@extends('layouts.default')

@section('content')
@if (Session::has('message'))
	<div class="alert alert-success">
	{{ Session::get('message') }}
	</div>
@endif
	
	<div class="section-header">Administration - Produkt-Details</div>
	
	<div class="block">
		<div class="row">
			<div class="col-xs-2 datatable-label">Name</div>
			<div class="col-xs-10 datatable-data">{{ $product->name }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Beschreibung</div>
			<div class="col-xs-10 datatable-data">{{ $product->description }}</div>
		</div>
		<div class="row">
			<div class="col-xs-2 datatable-label">Preis</div>
			<div class="col-xs-10 datatable-data">€ {{ number_format($product->price, 2, ',', '.') }}</div>
		</div>
	</div>
	
	<div class="block">
		<div class="row">
			<div class="col-xs-10">
				<a href="{{ URL::to('admin/categories/' . $category->id) }}" class="btn btn-default">Zurück</a>
				<a href="{{ URL::to('admin/categories/' . $category->id . '/products/' . $product->id . '/edit') }}" class="btn btn-default">Produkt bearbeiten</a>
			</div>
			<div class="col-xs-2 text-right">
				{!! Form::open(['method' => 'DELETE', 'url' => 'admin/categories/' . $category->id . '/products/' . $product->id, 'role' => 'form', 'class' => 'form-inline']) !!}
				{!! Form::submit('Produkt löschen', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop