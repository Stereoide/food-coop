@extends('layouts.default')

@section('content')
	<div class="text-center">
		<img src="img/logo.jpg" alt="" border="0" />
	</div>
	
@foreach ($categories as $category)
	<div class="section-header">{{ $category->name }}</div>
	
	<div class="block">
	@foreach ($category->products as $product)
		<div class="row">
			<div class="col-xs-1">
				<input type="text" id="product{{ $product->id }}" name="amount[{{ $product->id }}]" value="0" size="2" />
			</div>
			<div class="col-xs-11">
				<label for="product{{ $product->id }}">{{ $product->name }}</label>
			</div>
		</div>
	@endforeach
	</div>
@endforeach

@stop