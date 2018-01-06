<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Kategorie</h3>
		</div>
		<div class="panel-body">
			<ul>
				@foreach ($categories as $category)
					<li><a href="{{ url('posts/?category='.$category -> id) }}">{{ $category -> name }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

