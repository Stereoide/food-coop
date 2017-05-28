<!doctype html>
<html>
@include('includes.head')
<body>
	<div class="container">
		<div class="row">
			<div id="wrapper-sidebar" class="col-xs-2">
				@include('includes.sidebar')
			</div>
			<div id="wrapper-content" class="col-xs-10">
				<div id="content">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
</body>
</html>
