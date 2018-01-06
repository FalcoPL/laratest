<div class="col-md-2">	
	<!-- menu -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Menu</h3>
		</div>
		<div class="list-group panel">
			<a href="#demo3" class="list-group-item list-group-item-default" data-toggle="collapse" data-parent="#MainMenu">↓  Posty</a>
			<div class="collapse" id="demo3">
				<a href="{{ url('posts/create') }}" class="list-group-item">Dodaj</a>
				<a href="{{ url('admin/listPosts') }}" class="list-group-item">Lista</a>
				<a href="{{ url('admin/listDrafts') }}" class="list-group-item">Szkice</a>
			</div>
			<a href="#demo4" class="list-group-item list-group-item-default" data-toggle="collapse" data-parent="#MainMenu">↓  Kategorie</a>
			<div class="collapse" id="demo4">
				<a href="" class="list-group-item">Dodaj</a>
				<a href="" class="list-group-item">Lista</a>
			</div>
		</div>
	</div>
</div>