<form method="POST" action="{{ url('categories') }}">
	{{ csrf_field() }}
    {{ method_field('POST') }}
	<div class="form-group">
		<label>Nazwa kategorii</label>
		<input type="text" name="name" placeholder="Nazwij swoją nową kategorię!" class="form-control">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success form-control">Dodaj kategorię</button>
	</div>
</form>
<hr>