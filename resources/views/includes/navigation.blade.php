<div id="navigation" class="sidebar-block">
@if (Auth::user()->is_administrator)
	<div class="navigation-group">
		<div class="navigation-item-header">
			<a href="{{ URL::to('admin') }}">Administration</a>
		</div>
		<div class="navigation-item">
			<a href="{{ URL::to('admin/categories') }}">Kategorien</a>
		</div>
		<div class="navigation-item">
			<a href="{{ URL::to('admin/users') }}">Benutzer</a>
		</div>
	</div>
@endif
@if (Auth::check())
	<div class="navigation-group">
		<div class="navigation-item">
			<a href="{{ URL::to('/logout') }}">Abmelden</a>
		</div>
	</div>
@endif
</div>